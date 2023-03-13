<?php get_header(); ?>

<main id="interview">
  <section data-color="dark">
    <div class="l-container">
      <h2 class="m-h2 u-md_max">
        <span class="en">Company</span><br>
        <span class="jp">会社紹介</span>
      </h2>

      <article>
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="c-interview c-interview_single">
          <div class="c-interview_image" data-fade>
            <?php echo wp_get_attachment_image( get_field('interview_image'), 'interview_image' ); ?>
          </div>

          <div class="c-interview_text" data-fade>
            <h2 class="m-h2 u-md">
              <span class="en">Company</span><br>
              <span class="jp">会社紹介</span>
            </h2>

            <div class="c-interview_number" data-fade>
              <?php the_title() ?>
            </div>
            <div class="c-interview_title" data-fade>
              <?php if( get_field('interview_title') ):?>
                <?php the_field('interview_title'); ?>
              <?php endif; ?>
            </div>
            <div class="c-interview_role" data-fade>
              <?php if( get_field('interview_role') ):?>
                <?php the_field('interview_role'); ?>
              <?php endif; ?>
            </div>
            <div class="c-interview_sentence" data-fade>
              <p>
                <?php if( get_field('interview_text') ):?>
                  <?php the_field('interview_text'); ?>
                <?php endif; ?>
              </p>
            </div>
          </div>
        </div>

          <?php if(have_rows('interview_contents')): ?>
          <div class="c-interviewFaq c-interviewFaq_company" data-fade>
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
          <div class="c-postarea_interview" data-fade>
            <div class="c-postarea">
              <?php the_content() ?>
            </div>
          </div>
        <?php endif; ?>
        

        <?php endwhile; ?>
      </article>
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
          <a href="<?php echo home_url(); ?>/company/">
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
