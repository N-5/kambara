<?php get_header(); ?>

<main id="news">
  <section data-color="dark" data-fade>
    <div class="l-container l-container_mgt">
      <div class="l-container_side">
        <h2 class="m-h2">
          <span class="en">Annual Schedule</span><br>
          <span class="jp">年間スケジュール</span>
        </h2>
      </div>

      <div class="l-container_content">
        <article>
          <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          <header>
            <div class="singleNews_function">
              <div class="singleNews_time"><time datatime="<?php the_time('Y-m-d') ?>"><?php echo eo_format_event_occurrence(); ?></time></div>
            </div>
            <h1 class="singleNews_title"><?php the_title() ?></h1>
          </header>
          <div class="c-postarea">
            <?php the_content() ?>
          </div>
          <?php endwhile; ?>
        </article>
      </div>
    </div>
  </section>
</main>

<?php get_footer();
