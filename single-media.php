<?php get_header(); ?>

<main id="media">
  <section data-color="dark" data-fade>
    <div class="l-container l-container_mgt">
      <div class="l-container_side">
        <h2 class="m-h2">
          <span class="en">Media</span><br>
          <span class="jp">メディア掲載情報</span>
        </h2>
      </div>

      <div class="l-container_content">
        <article>
          <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          <header>
            <div class="singleNews_function">
              <div class="singleNews_time"><time datatime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time></div>
              <div class="singleNews_category">
                <?php $custom_post_tag = 'media-category';
                $custom_post_tag_terms = wp_get_object_terms($post->ID, $custom_post_tag);
                if(!empty($custom_post_tag_terms)){
                  if(!is_wp_error( $custom_post_tag_terms )){
                    foreach($custom_post_tag_terms as $term){
                      $tag_term_link = get_term_link($term->slug, $custom_post_tag);
                      $tag_term_name = $term->name;
                      echo '<div class="singleNews_category_item"><a href="'.$tag_term_link.'">'.$tag_term_name.'</a></div>';
                    }
                  }
                }
                ?>
              </div>
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
  <div class="l-container" data-fade>
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
          <a href="<?php echo home_url(); ?>/media/">
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
  
  <div class="l-container u-md_max">
    <h2 class="m-h2">
      <span class="en">Category</span><br>
      <span class="jp">カテゴリー</span>
    </h2>

    <ul class="c-category">
      <?php
        wp_list_categories (
          array(
            'post-type' => 'media',
            'taxonomy' => 'media-category',
            'title_li' => ''
          )
        );
      ?>
    </ul>
  </div>
</main>

<?php get_footer(); ?>
