<?php get_header(); ?>

<main id="search">
  <section data-color="dark">
    <div class="l-container l-container_mgt">
      <div class="l-container_side">
        <h2 class="m-h2">
          <span class="en">Search</span><br>
          <span class="jp">検索結果</span>
        </h2>
      </div>

      <div class="l-container_content">
        <?php if (have_posts()): ?>
        <div class="c-searchformResult_keyword">
          <?php
          if (isset($_GET['s']) && empty($_GET['s'])) {
            echo '検索キーワード未入力';
          } else {
            echo '“'.$_GET['s'] .'”の検索結果：'.$wp_query->found_posts .'件';
          }
        ?>
        </div>
        <div class="c-searchformResult">
        <?php while(have_posts()): the_post(); ?>
        <div class="c-searchformResult_item">
          <a href="<?php the_permalink(); ?>">
              <div class="c-searchformResult_post">
                <?php
                $postType = get_post_type_object(get_post_type());
                  if ($postType) {
                      echo esc_html($postType->labels->name);
                  }
                ?>
              </div>
              <time class="c-searchformResult_time" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time>
              <div class="c-searchformResult_title"><?php the_title() ?></div>
              <div class="c-searchformResult_url">
                <?php
                  if(mb_strlen(get_the_permalink(), 'UTF-8')>80){
                      $excerpt= mb_substr(get_the_permalink(), 0, 80);
                      echo $excerpt.'...';
                  } else{
                      echo get_the_permalink();
                  }
                ?>
              </div>
          </a>
        </div>
        <?php endwhile; ?>
        </div>
        <?php else: ?>
        検索されたキーワード「<?php echo $_GET['s'] ?>」に該当する記事はありませんでした。
        <?php endif; ?>
      </div>
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
  </section>
</main>

<?php get_footer(); ?>
