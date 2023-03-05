<?php get_header(); ?>

<main id="groupmagazine">
  <div class="l-container">
    <div class="l-container_side">
      <h2 class="m-h2">
        <span class="en">Miroku</span><br>
        <span class="jp">ファミリー誌〈みろく〉</span>
      </h2>
    </div>

    <div class="l-container_content">
      <div class="c-groupmagazine c-groupmagazine_archive">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="c-groupmagazine_item">
          <a href="<?php the_field('miroku_pdf'); ?>" target="_blank">
            <div class="c-groupmagazine_image">
              <?php echo wp_get_attachment_image( get_field('miroku_thumbnail'), 'miroku_image' ); ?>
            </div>
            <div class="c-groupmagazine_title"><?php the_title() ?></div>
          </a>
        </div>
      <?php endwhile; ?>
      <?php else: ?>
        <p>ファミリー誌〈みろく〉はまだ掲載されていません。</p>
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
