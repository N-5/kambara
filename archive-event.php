<?php get_header(); ?>

<?php
	$year_jp = eo_get_event_archive_date( 'Y' );
	$month_jp = eo_get_event_archive_date( 'F' );
	$month = rtrim($month_jp, '月');
	$next_month = eo_get_event_archive_date( 'm' );
	$shortcode = '[eo_fullcalendar titleformatweek="Y年Mj日" defaultView="month" month="'.$month.'"]';

	function monthFunc ($month) {
		switch ($month) {
		case '1':
			$monthNext = '02';
			$monthPrev = '12';
			break;
		case '2':
			$monthNext = '03';
			$monthPrev = '01';
			break;
		case '3':
			$monthNext = '04';
			$monthPrev = '02';
			break;
		case '4':
			$monthNext = '05';
			$monthPrev = '04';
				break;
		case '5':
			$monthNext = '06';
			$monthPrev = '04';
			break;
		case '6':
			$monthNext = '07';
			$monthPrev = '05';
				break;
		case '7':
			$monthNext = '08';
			$monthPrev = '06';
			break;
		case '8':
			$monthNext = '09';
			$monthPrev = '07';
				break;
		case '9':
			$monthNext = '10';
			$monthPrev = '08';
			break;
		case '10':
			$monthNext = '11';
			$monthPrev = '09';
				break;
		case '11':
			$monthNext = '12';
			$monthPrev = '10';
			break;
		case '12':
			$monthNext = '01';
			$monthPrev = '11';
			break;
		default:
			$monthNext = wp_date( 'm' );
			$monthPrev = wp_date( 'm' );
		}
		return $monthPrev;
	}

	monthFunc($month);
	echo $monthNext;
	echo $monthPrev;
?>

<main id="schedule">
  <section data-color="dark">
		<div class="l-container">
			<div class="l-container_side">
				<h2 class="m-h2">
					<span class="en">Annual Schedule</span><br>
					<span class="jp">年間スケジュール</span>
				</h2>
			</div>

			<div class="l-container_content">
				<h2 class="m-h2">
					<span class="en"><?php echo $year_jp ?><small>年</small></span><br>
					<span class="jp"><?php echo $month_jp ?></span>
				</h2>

				<div class="c-demoSchedule">
					<?php echo do_shortcode($shortcode) ?>
				</div>

				<div>
					<div>
						<a href="<?php echo home_url(); ?>/schedule/event/on/<?php echo wp_date( 'Y' ); ?>/<?php echo $monthNext ?>/">前の月</a>
						<a href="<?php echo home_url(); ?>/schedule/event/on/<?php echo wp_date( 'Y' ); ?>/<?php echo $monthPrev ?>/">次の月</a>
					</div>
				</div>


				<!-- Page header-->
				<header class="page-header">
					<!-- <h1 class="page-title">
					<?php
					if ( eo_is_event_archive( 'day' ) ) {
						//Viewing date archive
						echo __( 'Events: ','eventorganiser' ) . ' ' . eo_get_event_archive_date( 'jS F Y' );
					} elseif ( eo_is_event_archive( 'month' ) ) {
						//Viewing month archive
						echo __( 'Events: ','eventorganiser' ) . ' ' . eo_get_event_archive_date( 'F Y' );
					} elseif ( eo_is_event_archive( 'year' ) ) {
						//Viewing year archive
						echo __( 'Events: ','eventorganiser' ) . ' ' . eo_get_event_archive_date( 'Y' );
					} else {
						_e( 'Events', 'eventorganiser' );
					}
					?>
					</h1> -->
				</header>

				<div class="c-postarea">
				<!-- http://docs.wp-event-organiser.com/shortcodes/events-list/ -->
				<?php eo_get_template_part( 'eo-loop-events' ); //Lists the events ?>
				</div>
			</div>
		</div>
	</section>
</main>


<?php get_footer();
