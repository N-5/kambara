<?php get_header(); ?>

<main id="news">
  <div class="l-container">
    <div class="l-container_side">
      <h2 class="m-top_h2">
        <span class="en">Media</span><br>
        <span class="jp">メディア掲載情報</span>
      </h2>

      <h2 class="m-top_h2">
        <span class="en">Category</span><br>
        <span class="jp">カテゴリー</span>
      </h2>

      <ul class="page-navigation-list news-navigation">
        <li class="cat-item"><a href="<?php echo home_url(); ?>/news/"><span>ALL</span></a></li>
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

    <div class="l-container_content">
      <div class="c-newslist c-newslist_archive">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="c-newslist_item">
          <a href="<?php the_permalink() ?>">
            <time class="c-newslist_time" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time>
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
    </div>
  </div>
  </main>
<?php get_footer(); ?>
