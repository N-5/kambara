<?php 

date_default_timezone_set('Asia/Tokyo');

//前月と次月を表示する際は、GETで値を受け取る
if (isset($_GET['ym'])) {
	$page_ym = $_GET['ym'];

}else{
	$page_ym = date('Ym');
}


//形式チェック
$timestamp = strtotime($page_ym . "01"); // yyyymmddの書式にする


if ($timestamp === false) {
	$timestamp = time();
}


//今日の日付
$today = date('Ymd',time());
$thismonth = date('n', $timestamp);
$thisyear = date('Y', $timestamp);


//HTML表示用の日付
$html_title = date('Y年 n月',$timestamp);

//前月と次月を取得  mktime(hour, minute, second, month, day, year)
$prev = date('Ym', mktime(0, 0, 0, date('m', $timestamp)-1, 1 , date("Y", $timestamp)));
$next = date('Ym', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date("Y", $timestamp)));

//対象月は何日あるか
$day_count = date('t', $timestamp);

//１日は何曜日か　0:日 1:月 .... 6:土
$youbi = date('w', mktime(0, 0, 0,date('m', $timestamp), 1, date("Y", $timestamp)));

//曜日を月曜始まりに変更　
$youbi = ($youbi == 0) ? 6 : $youbi - 1;

//エラー
$countid = 0;

function mycalendar_fillevents($databuf, $startday, $endday, $countid, $url) {
	$curday = $startday;

	for ($i = 0; $i < (int)$endday - (int)$startday + 1; $i++) {
		$curday = $startday + $i; // カレンダーの日付
		// 同日に複数イベントが入った場合のID
		// $databuf = [0];

		if (is_array($databuf[$curday])) {
			$countid = count($databuf[$curday]);
			
		}else{
			$countid = 0;
		}
			$databuf[$curday][$countid]["url"] = $url;
		}
		return $databuf;
}

//
// extract event list
//
$args = array(
	'post_type'  => 'schedule',
	'meta_key'   => 'day',
	'orderby'    => 'meta_value',
	'order'      => 'ASC',
	'posts_per_page' => -1
);

// The Query
$the_query = new WP_Query( $args );

// this buffer will be 3dim array
$databuf = array();

// The Loop
if ( $the_query->have_posts() ) {
	
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$url = get_the_ID();

		global $post, $id;

		$day_meta = (post_custom('day'));
		$datearray = explode('/', $day_meta);
		
		$startymd = explode('-', $datearray[0]);
		$startyear = $startymd[0];
		$startmonth = $startymd[1];
		$startday = $startymd[2];
		$theday = new DateTime();
		$theday->setDate((int)$startyear, (int)$startmonth, (int)$startday);
		$startym = $theday->format('Ym');
		
		// $startymが現在の表示年月より大きい場合は、残りのイベントも全て同条件で
		// 現在のカレンダーの表示範囲外なのでloopを出る
		if ($startym > $page_ym) {
			break;
		}
			
		if (count($datearray) == 1 && $startym == $page_ym) {
			// 1日のみのイベントなので、現在のカレンダーの年月に合致した場合のみデータベースにFILLする
			// single day event. yyyy/mm/dd
			// year and month matched. fill the event to the buffer.
			
			$databuf = mycalendar_fillevents($databuf, $startday, $startday, $countid, $url);

			
			
		} else if (count($datearray) > 1) {
			// 複数日イベント
			// multiple days event.
			// date format is yyyy/mm/dd-dd or yyyy/mm/dd-mm/dd or yyyy/mm/dd-yyyy/mm/dd
			// $dataarray[0] = yyyy/mm/dd
			// $dataarray[1] could be dd, mm/dd, yyyy/mm/dd
			//☆'-'で年月日を分割。
			$endymd = explode('-', $datearray[1]);
			$endymdcounts = count($endymd);
			
			// try simple case first.
			if ($endymdcounts == 1) {
				// イベント開始日と終了日が同じ月。現在の表示カレンダーの年月のものだけFILLする
				// the event will be held within a month.
				// date format is yyyy/mm/dd-dd.
				if ($page_ym != $startym) {
					// month doesn't match through event period. go to next post.
					continue;
				}
				$endday = $endymd[0];
				$databuf = mycalendar_fillevents($databuf, $startday, $endday, $countid, $url);
				
			} else {
				// イベント終了日が開始日と同じ年月にない場合は、イベント期間中のうち表示中のカレンダーの年月のみFILLする
				// the event will be held through at least two different months.
				// date format is yyyy/mm/dd-mm/dd or yyyy/mm/dd-yyyy/mm/dd.
				$endyear = $startyear;
				$endmonth = $startmonth;
				$endday = $startday;
				if ($endymdcounts == 2) {
					$endmonth = $endymd[0];
					$endday = $endymd[1];
				} else if ($endymdcounts == 3) {
					$endyear = $endymd[0];
					$endmonth = $endymd[1];
					$endday = $endymd[2];	
				}
								
				$theday->setDate((int)$endyear, (int)$endmonth, (int)$endday);
				$endym =  $theday->format('Ym');
				
				if ($page_ym > $endym) {
					// イベント終了日が現在の表示年月より前の場合はこのイベントをスキップ（妥協）
					// current calendar is out of bound of this event. go to next post.
					continue;
				} 
				
				$curym = $startym;
				$curyear = $startyear;
				$curmonth = $startmonth;
				// 開始日付は１日かイベント開始日のどちらか
				$curday = ($page_ym == $startym) ? $startday : 1;
				
				// 開始年月から終了年月までループ
				while ($curym <= $page_ym) {
					
					if ($page_ym == $curym) {
						// OK, fill calendar for this month.
						// update start day and end day.
						$startday = $curday;
						$last_day = $day_count;
						// 開始日付は月の最後の日かイベント終了日のどちらか
						$endday = ($curym == $endym) ? $endday : $last_day;
						$databuf = mycalendar_fillevents($databuf, $startday, $endday, $countid, $url);
					} 
					
					//次月を取得
					if ($curmonth == 12) {
						//次の月は翌年１月
						$curyear += 1;
						$curmonth = 1;
					} else {
						$curmonth += 1;
					}
					$theday->setDate((int)$curyear, (int)$curmonth, (int)$curday);
					$curym = $theday->format('Ym');
				}
			}
		}
	}
}

/* Restore original Post Data */
wp_reset_postdata();

//カレンダー作成準備
$weeks = array();
$week = '';
$lists = array();
$list = '';

//空白を追加
//例） 1日が水曜日だった場合、カレンダーの月曜日から火曜日に空白を入れる
$week .= str_repeat('<td></td>', $youbi);

//カレンダーへの出力
for ($day=1; $day <= $day_count; $day++, $youbi++){
	
	if (array_key_exists($day, $databuf)) {
		$week .= '<td class="is-on js-expandlink"><a href=/schedule/category/event?list=';
		$total_event = count($databuf[$day]);
		for ($i = 0; $i < $total_event; $i++) { 
			$list = $databuf[$day][$i]['url'] . ','; //日別アーカイブ用
			
			$lists[] = $list; //月別アーカイブ用
	        $arr_list = array_unique($lists, SORT_REGULAR);
			$event_list = implode('',$arr_list);

			$week .= $list;
		}   $week .= '&calendar='. $page_ym . str_pad($day, 2, '0', STR_PAD_LEFT) . '>' . $day . '</a>'; //イベント件数表示
		
	} else {
		$week .= '<td>'. $day ;
	}
	$week .= '</td>';

	//曜日が日曜日、または全ての日付のtdの作成が終わったら
	if($youbi % 7 == 6 OR $day == $day_count){

		//全ての日付のtdの作成が終わったら、残りに空白を追加
		if($day == $day_count){
			$week .= str_repeat('<td></td>', 6 - ($youbi % 7));
		}

		//1週間分のtdをまとめた$weekを$weeks配列に入れる。
		$weeks[] = '<tr>'.$week.'</tr>';
		
		//新しい週を作成するために$weekを空にする。
		$week = '';

	}

}

?>
<div class="c-scheduleCalendar">
	<h4>
		<a href="?ym=<?php echo $prev;?>#calendar" class="prev">≪</a>
		&nbsp;&nbsp;
		<a href="/archives/category/event?list=<?php echo $event_list ;?>&calendar=<?php echo $page_ym ;?>">
			<?php echo $html_title;?>
		</a>&nbsp;&nbsp;
		<a href="?ym=<?php echo $next;?>#calendar" class="next">≫</a>
	</h4>

	<table class="c-scheduleCalendar_table">
		<thead>
			<tr>
				<th>月</th>
				<th>火</th>
				<th>水</th>
				<th>木</th>
				<th>金</th>
				<th>土</th>
				<th>日</th>
			</tr>
		</thead>
		<tbody>
			<?php
		 	//カレンダー表示
			foreach ($weeks as $week){
				echo $week;
			}
		?>
		</tbody>
	</table>
</div>