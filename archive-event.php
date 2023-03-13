<?php get_header(); ?>

<?php
	$year_jp = eo_get_event_archive_date( 'Y' );
	$month_jp = eo_get_event_archive_date( 'F' );
	$month = rtrim($month_jp, '月');
	$next_month = eo_get_event_archive_date( 'm' );
	$shortcode = '[eo_fullcalendar titleformatweek="Y年Mj日" responsive="false" defaultView="month" month="'.$month.'"]';
	$year = wp_date( 'Y' );
	$yearNext = $year_jp;
	$yearPrev = $year_jp;
	
	//イベントカレンダーの取得月によって変数を変える
	switch ($month) {
		case '1':
			$monthNext = '02';
			$monthPrev = '12';
			$monthEn = 'January';
			$yearPrev = $year_jp - 1;
			break;
		case '2':
			$monthNext = '03';
			$monthPrev = '01';
			$monthEn = 'February';
			break;
		case '3':
			$monthNext = '04';
			$monthPrev = '02';
			$monthEn = 'March';
			break;
		case '4':
			$monthNext = '05';
			$monthPrev = '04';
			$monthEn = 'April';
				break;
		case '5':
			$monthNext = '06';
			$monthPrev = '04';
			$monthEn = 'May';
			break;
		case '6':
			$monthNext = '07';
			$monthPrev = '05';
			$monthEn = 'June';
				break;
		case '7':
			$monthNext = '08';
			$monthPrev = '06';
			$monthEn = 'July';
			break;
		case '8':
			$monthNext = '09';
			$monthPrev = '07';
			$monthEn = 'August';
				break;
		case '9':
			$monthNext = '10';
			$monthPrev = '08';
			$monthEn = 'September';
			break;
		case '10':
			$monthNext = '11';
			$monthPrev = '09';
			$monthEn = 'October';
				break;
		case '11':
			$monthNext = '12';
			$monthPrev = '10';
			$monthEn = 'November';
			break;
		case '12':
			$monthNext = '01';
			$monthPrev = '11';
			$monthEn = 'December';
			$yearNext= $year_jp + 1;
			break;
		default:
			$monthNext = 'N/A';
			$monthPrev = 'N/A';
			$monthEn = 'N/A';
			$yearNext = 'N/A';
		}
?>

<main id="schedule">
  <section data-color="dark">
		<div class="l-container l-container_mgt">
			<div class="l-container_side" data-fade>
				<h2 class="m-h2">
					<span class="en">Annual Schedule</span><br>
					<span class="jp">年間スケジュール</span>
				</h2>

				<h2 class="m-h2">
					<span class="en"><?php echo $monthEn ?> <?php echo $year_jp ?></span><br>
					<span class="jp"><?php echo $month_jp ?></span>
				</h2>
			</div>

			<div class="l-container_content">
				<div class="c-schedule c-schedule__archive" data-fade>
					<?php echo do_shortcode($shortcode) ?>
				</div>

				<div class="schedule_pager" data-fade>
					<a href="<?php echo home_url(); ?>/schedule/event/on/<?php echo $yearPrev ?>/<?php echo $monthPrev ?>/">前の月</a>
					<a href="<?php echo home_url(); ?>/schedule/event/on/<?php echo $yearNext ?>/<?php echo $monthNext ?>/">次の月</a>
				</div>

				<div class="schedule_postarea">
					<?php if ( have_posts() ):  ?>
						<?php while ( have_posts() ) : the_post() ?>
						<div class="schedule_postarea_item" data-fade>
							<div class="schedule_postarea_date">
								<?php echo eo_get_the_start( 'm/d' ); ?><?php if(eo_get_the_end('m/d') !== eo_get_the_start('m/d') ): ?> - <?php echo eo_get_the_end( 'm/d' ); ?><?php endif; ?>

								<!-- <?php if ( get_the_terms( get_the_ID(), 'event-category' ) && ! is_wp_error( get_the_terms( get_the_ID(), 'event-category' ) ) ) { ?>
								<div class="c-searchformResult_post u-ml_10">
									<?php echo get_the_term_list( get_the_ID(),'event-category', '', ', ', '' ); ?>
								</div>
								<?php } ?> -->
							</div>
							<h2 class="schedule_postarea_title">
								<?php the_title() ?>
							</h2>

							<div class="schedule_postarea-content">
								<div class="c-postarea">
									<?php the_content(); ?>
								</div>
							</div>
							</div>
						<?php endwhile; ?>
							<div class="schedule_pager" data-fade>
								<a href="<?php echo home_url(); ?>/schedule/event/on/<?php echo $yearPrev ?>/<?php echo $monthPrev ?>/">前の月</a>
								<a href="<?php echo home_url(); ?>/schedule/event/on/<?php echo $yearNext ?>/<?php echo $monthNext ?>/">次の月</a>
							</div>
						<?php else: ?>
							<p class="u-ta_c u-mt_100" data-fade><?php echo $year_jp ?>年<?php echo $month_jp ?>のスケジュールは登録されていません。</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
</main>


<?php get_footer();
