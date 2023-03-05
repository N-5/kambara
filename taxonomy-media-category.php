<?php get_header(); ?>

<main id="media">
  <section data-color="dark">
    <div class="l-container">
      <div class="l-container_side">
        <h2 class="m-h2">
          <span class="en">Media</span><br>
          <span class="jp">メディア掲載情報</span>
        </h2>
      </div>
    </div>
    
    <div class="l-container l-container_mgt">
      <div class="l-container_side">
        

        <h2 class="m-h2 u-md">
          <span class="en">Category</span><br>
          <span class="jp">カテゴリー</span>
        </h2>

        <ul class="c-category u-md">
          <?php
            wp_list_categories (
              array(
                'post-type' => 'media',
                'taxonomy' => 'media-category',
                'title_li' => '',
                'hide_empty' => '0'//投稿されていないもの表示
              )
            );
          ?>
        </ul>
      </div>

      <div class="l-container_content">
        <div class="c-newslist c-newslist_archive">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div class="c-newslist_item">
            <a href="<?php the_permalink() ?>">
              <time class="c-newslist_time" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time>
              <div class="c-newslist_category">
                <?php $custom_post_tag = 'media-category';
                $custom_post_tag_terms = wp_get_object_terms($post->ID, $custom_post_tag);
                if(!empty($custom_post_tag_terms)){
                  if(!is_wp_error( $custom_post_tag_terms )){
                    foreach($custom_post_tag_terms as $term){
                      $tag_term_link = get_term_link($term->slug, $custom_post_tag);
                      $tag_term_name = $term->name;
                      echo '<div class="c-newslist_category_item">'.$tag_term_name.'</div>';
                    }
                  }
                }
                ?>
              </div>
              <div class="c-newslist_title"><?php the_title() ?></div>
            </a>
          </div>
        <?php endwhile; ?>
        <?php else: ?>
        <p>メディアはまだ掲載されていません。</p>
        <?php endif; ?>
      </div>

        <div class="c-pagination">
          <div class="c-pagination-outer">
            <div class="c-pagination-inner">
              <?php global $wp_rewrite;
              $paginate_base = get_pagenum_link(1);
              if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
                $paginate_format = '';
                $paginate_base = add_query_arg('paged','%#%');
              }
              else{
                $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
                  user_trailingslashit('page/%#%/','paged');;
                $paginate_base .= '%_%';
              }
              echo paginate_links(array(
                'base' => $paginate_base,
                'format' => $paginate_format,
                'total' => $wp_query->max_num_pages,
                'mid_size' => 4,
                'current' => ($paged ? $paged : 1),
                'prev_text' => '〈',
                'next_text' => '〉',
              )); ?>
            </div>
          </div>
        </div>

        <div class="u-md_max">
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
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
