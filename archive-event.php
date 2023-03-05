<?php get_header(); ?>


<main id="schedule">
  <div class="l-container">
    <div class="l-container_side">
      <h2 class="m-h2">
        <span class="en">Annual Schedule</span><br>
        <span class="jp">年間スケジュール</span>
      </h2>

			<h2 class="m-h2">
        <span class="en"><?php echo eo_get_event_archive_date( 'Y' ) ?><small>年</small></span><br>
        <span class="jp"><?php echo eo_get_event_archive_date( 'F' ) ?></span>
      </h2>
    </div>

    <div class="l-container_content">

			<div class="c-scheduleCalendar_table">
				<?php echo do_shortcode( '[eo_calendar defaultView="basicWeek" titleformatweek="Y年Mj日" columnformatweek="D n/j"]' ) ?>
			</div>

			<!-- 前の月<?php echo eo_get_event_archive_date( 'F' ) ?><br>
			次の月<?php echo eo_get_event_archive_date( 'F' ) ?> -->
			

			<hr>


      <!-- Page header-->
			<header class="page-header">
				<h1 class="page-title">
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
				</h1>
			</header>

			<?php eo_get_template_part( 'eo-loop-events' ); //Lists the events ?>
    </div>
  </div>
</main>


<?php get_footer();
