<?php get_header(); ?>

<main id="news">
  <section>
    <div class="l-container l-container_mgt">
      <div class="l-container_side">
        <h2 class="m-h2">
          <span class="en">Family Chat</span><br>
          <span class="jp">ファミリーチャット</span>
        </h2>
      </div>

      <div class="l-container_content">
        <article>
          <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          <header>
            <div class="singleNews_function">
              <div class="singleNews_time"><time datatime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time></div>
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

  <?php
    $prev_post = get_previous_post();
    $next_post = get_next_post();
    if( $prev_post || $next_post ):
  ?>
  <div class="l-container">
    <div class="c-paging">
      <div class="c-paging_inner">
        <?php if( $prev_post ): ?>
        <div class="c-paging_prev">
          <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="prev-link">
            <span class="paging-heading">Prev</span>
          </a>
        </div>
        <?php endif; ?>
        
        <div class="c-paging_home">
          <a href="<?php echo home_url(); ?>/news/">
            <span class="paging-heading">All</span>
          </a>
        </div>
        
        <?php if( $next_post ): ?>
        <div class="c-paging_next">
          <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="next-link">
            <span class="paging-heading">Next</span>
          </a>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
