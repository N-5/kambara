<?php get_header(); ?>

<main id="groupmagazine">
  <section data-color="dark">
    <div class="l-container">
      <div class="l-container_side" data-fade>
        <h2 class="m-h2">
          <span class="en">Tsuneishi</span><br>
          <span class="jp">グループ報〈つねいし〉</span>
        </h2>
      </div>

      <div class="l-container_content">
        <div class="c-groupmagazine c-groupmagazine_archive">
          <?php 
            if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            $count++;
          ?>
          <div class="c-groupmagazine_item" data-fade data-fade-delay="<?php echo($count); ?>">
            <a href="<?php the_field('tsuneishi_pdf'); ?>" target="_blank">
              <div class="c-groupmagazine_image">
                <?php echo wp_get_attachment_image( get_field('tsuneishi_thumbnail'), 'tsuneishi_image' ); ?>
              </div>
              <div class="c-groupmagazine_title"><?php the_title() ?></div>
            </a>
          </div>
        <?php endwhile; ?>
        <?php else: ?>
          <p>グループ報〈つねいし〉はまだ掲載されていません。</p>
        <?php endif; ?>
        </div>

        <div class="c-pagination" data-fade>
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
  </section>
</main>

<?php get_footer(); ?>
