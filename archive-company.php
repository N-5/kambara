<?php get_header(); ?>

<main id="interview">
  <div class="l-container">
    <h2 class="m-h2">
      <span class="en">Company</span><br>
      <span class="jp">会社紹介</span>
    </h2>

    <div class="c-inteviewlist c-inteviewlist_archive">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="c-inteviewlist_item">
          <a href="<?php the_permalink() ?>">
            <div class="c-inteviewlist_image">
              <?php echo wp_get_attachment_image( get_field('interview_image'), 'interview_image' ); ?>
            </div>
            <div class="c-inteviewlist_title">
              <?php the_title() ?>
            </div>
            <div class="c-inteviewlist_role">
              <?php the_field('interview_role'); ?>
            </div>
          </a>
        </div>
      <?php endwhile; ?>
      <?php else: ?>
      <p>会社紹介はまだ掲載されていません。</p>
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

    <div class="c-backlink">
      <a href="<?php echo home_url(); ?>">
        Back
      </a>
    </div>
  </div>
</main>

<?php get_footer(); ?>
