<?php get_header(); ?>
<main id="news">
  <div class="news-single">
    <article>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <header data-inview>
        <div class="l-container__small">
          <div class="single-news__function">
            <div class="single-news__time"><time><?php the_date("Y.n.j"); ?></time></div>
            <div class="single-news-category">
              <?php $custom_post_tag = 'news-category';
              $custom_post_tag_terms = wp_get_object_terms($post->ID, $custom_post_tag);
              if(!empty($custom_post_tag_terms)){
                if(!is_wp_error( $custom_post_tag_terms )){
                  foreach($custom_post_tag_terms as $term){
                    $tag_term_link = get_term_link($term->slug, $custom_post_tag);
                    $tag_term_name = $term->name;
                    echo '<div class="single-news-category__item"><a href="'.$tag_term_link.'">'.$tag_term_name.'</a></div>';
                  }
                }
              }
              ?>
            </div>
          </div>
          <h1 class="single-news__heading"><?php the_title() ?></h1>
        </div>
      </header>
      <div class="c-postarea" data-inview>
        <div class="l-container__small">
          <?php the_content() ?>
        </div>
      </div>
      <?php endwhile; ?>
    </article>
    
    <?php
      $prev_post = get_previous_post();
      $next_post = get_next_post();
      if( $prev_post || $next_post ):
    ?>
    <div class="paging">
      <div class="l-container">
        <div class="paging-prev">
          <?php if( $prev_post ): ?>
          <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="prev-link">
            <h5 class="paging-heading">PREV</h5>
            <p class="paging-text clamp"><?php echo mb_strimwidth(get_the_title($prev_post->ID), 0, 17, "...", "UTF-8"); ?></p>
          </a>
          <?php endif; ?>
        </div>
        
        <div class="paging-home">
          <a href="<?php echo home_url(); ?>/news/">
            <h5 class="paging-heading">LIST</h5>
            <p class="paging-text">一覧に戻る</p>
          </a>
        </div>
        
        <div class="paging-next">
          <?php if( $next_post ): ?>
          <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="next-link">
            <h5 class="paging-heading">NEXT</h5>
            <p class="paging-text clamp"><?php echo mb_strimwidth(get_the_title($next_post->ID), 0, 17, "...", "UTF-8"); ?></p>
          </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
