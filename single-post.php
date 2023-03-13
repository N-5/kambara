<?php get_header(); ?>

<main id="chat" data-color="dark">
  <section data-color="dark">
    <div class="l-container l-container_mgt">
      <div class="l-container_side" data-fade>
        <h2 class="m-h2">
          <span class="en">Family Chat</span><br>
          <span class="jp">ファミリーチャット</span>
        </h2>
      </div>

      <div class="l-container_content" data-fade>
        <div class="c-chatlist__time"><time datatime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time></div>
          <?php
            $posttags = get_the_tags();
            if( $posttags ){
              echo '<div class="c-chatlist__tag">';
              foreach ( $posttags as $tag ) {
                echo '<div class="c-chatlist_tag_item">#' . $tag->name . '</div>';
              }
              echo '</div>';
            }
          ?>
          <?php
            $categories = get_the_category();
            if( $categories ){
              echo '<div class="c-chatlist_category">';
              foreach( $categories as $category ){
                echo '<div class="c-chatlist_category_item">' . $category->name . '</div>';
              }
              echo '</div>';
            }
          ?>
          <h1 class="c-chatlist__title"><?php the_title() ?></h1>
          <div class="c-chatlist__image">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('index_thumbnail'); ?>
            <?php endif; ?>
          </div>
          <div class="c-postarea">
            <?php the_content() ?>
          </div>
          <div class="c-chatlist__box">
            <div class="c-chatlist__author">
              投稿者：<?php the_author(); ?>
            </div>
            <!-- <div class="c-chatlist__email">
              メールアドレス：<?php 
                $user_id = get_post_field( 'post_author', 100 );
                echo get_the_author_meta( 'user_email', $user_id );
              ?>
            </div> -->
          </div>
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
          <a href="<?php echo home_url(); ?>/chat/">
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
