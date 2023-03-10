<?php get_header(); ?>

<main id="member">
  <section data-color="dark" data-fade>
    <div class="l-container l-container_mgt">
      <div class="l-container_side">
        <h2 class="m-h2">
          <span class="en">Family Member</span><br>
          <span class="jp">メンバー</span>
        </h2>
      </div>

      <div class="l-container_content">
        <div class="member_detail">
          <div class="member_detail_wrapper">
            <div class="member_detail_image">
              <?php if(wp_get_attachment_image( get_field('member_image'), 'member_image_2x' )): ?>
              <?php echo wp_get_attachment_image( get_field('member_image'), 'member_image_2x' ); ?>
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/member/noimage.jpg" alt="">
              <?php endif; ?>
            </div>
            <div class="member_detail_profile">
              <dl>
                <dt>名前</dt>
                <dd><?php the_title() ?> （<?php the_field('member_kana'); ?>）</dd>
                <dt>生年月日</dt>
                <dd><?php the_field('member_birth'); ?></dd>
                <dt>血液型</dt>
                <dd><?php the_field('member_blood'); ?></dd>
                <dt>趣味</dt>
                <dd><?php the_field('member_hobby'); ?></dd>
                <dt>特技</dt>
                <dd><?php the_field('member_skill'); ?></dd>
                <dt>会社名(学校名)</dt>
                <dd><?php the_field('member_bio'); ?></dd>
                <dt>連絡先</dt>
                <dd><?php if( get_field('member_to_check') ): ?><a href="mailto:<?php the_field('member_to'); ?>"><?php endif; ?><?php the_field('member_to'); ?><?php if( get_field('member_to_check') ): ?></a><?php endif; ?></dd>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

	<?php
    $prev_post = get_previous_post();
    $next_post = get_next_post();
    if( $prev_post || $next_post ):
  ?>
  <div class="l-container" data-color="dark" data-fade>
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
          <a href="<?php echo home_url(); ?>/member/">
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


<?php get_footer();
