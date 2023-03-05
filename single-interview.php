<?php get_header(); ?>

<main id="interview">
  <div class="l-container">
    <h2 class="m-h2 u-md_max">
      <span class="en">Interview</span><br>
      <span class="jp">みんなのインタビュー</span>
    </h2>

    <article>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <div class="c-interview c-interview_single">
        <div class="c-interview_image">
          <?php echo wp_get_attachment_image( get_field('interview_image'), 'interview_image' ); ?>
        </div>

        <div class="c-interview_text">
          <h2 class="m-h2 u-md">
            <span class="en">Interview</span><br>
            <span class="jp">みんなのインタビュー</span>
          </h2>

          <div class="c-interview_number">
            <?php the_title() ?>
          </div>
          <div class="c-interview_title">
            <?php the_field('interview_title'); ?>
          </div>
          <div class="c-interview_role">
            <?php the_field('interview_role'); ?>
          </div>
          <div class="c-interview_sentence">
            <p>
              <?php the_field('interview_text'); ?>
            </p>
          </div>
        </div>
      </div>

      <?php if(have_rows('interview_contents')): ?>
        <div class="c-interviewFaq">
          <?php 
            while(have_rows('interview_contents')): the_row();
            $imgAbs = get_sub_field('interview_answer_thumb');
          ?>

        <div class="c-interviewFaq_item">
          <div class="c-interviewFaq_q">
            <p>
              <?php the_sub_field('interview_question'); ?>
            </p>
          </div>
          <div class="c-interviewFaq_a">
            <p>
              <?php the_sub_field('interview_answer'); ?>
            </p>
          </div>
          <?php if(!empty($imgAbs)): ?>
          <div class="c-interviewFaq_image">
            <img src="<?php the_sub_field('interview_answer_thumb'); ?>" alt="">
          </div>
          <?php endif; ?>
        </div>

        <?php endwhile; ?>
        </div>
      <?php endif; ?>

      <?php if(!empty($post->post_content)): ?>
        <div class="c-postarea_interview">
          <div class="c-postarea">
            <?php the_content() ?>
          </div>
        </div>
      <?php endif; ?>
      

      <?php endwhile; ?>
    </article>
  </div>

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
          <a href="<?php echo home_url(); ?>/interview/">
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
