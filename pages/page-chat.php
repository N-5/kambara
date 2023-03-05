<?php
/*
Template Name: chat
*/
?>

<?php get_header(); ?>

<main id="chat">
  <section data-color="dark">
    <div class="l-container">
      <div class="l-container_side">
        <h2 class="m-h2">
          <span class="en">Family Chat</span><br>
          <span class="jp">ファミリーチャット</span>
        </h2>

        <div class="chat_lead u-md">
          なんでもつぶやこう<br>
          つぶやきメンバーになる
        </div>
        
        <div class="c_chatpost u-md">
          <?php if (function_exists('user_submitted_posts')) user_submitted_posts(); ?>
        </div>

        <div class="chat_anchor u-md_max">
          <a href="#postarea">
            自由につぶやいてください。
          </a>
        </div>
      </div>

      <div class="l-container_content">
        <div class="c-chatlist">
          <?php
            $wp_query = new WP_Query();
            $args = array(
              'post_type' => 'post',
              'posts_per_page'=> -1,
            );
            $wp_query->query($args);
            if( $wp_query->have_posts() ): while( $wp_query->have_posts() ) : $wp_query->the_post();
            $user_id = get_post_field( 'post_author', 100 );
          ?>
            <div class="c-chatlist_item">
              <a href="<?php the_permalink() ?>">
                <div class="c-chatlist_image">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('index_thumbnail'); ?>
                  <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/chat/noimage.jpg" alt="">
                  <?php endif; ?>
                </div>
                <div class="c-chatlist_title">
                  <?php the_title() ?>
                </div>
                <?php
                  $posttags = get_the_tags();
                  if( $posttags ){
                    echo '<div class="c-chatlist_tag">';
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
                <div class="c-chatlist_author">
                  <?php the_author(); ?>
                </div>
                <div class="c-chatlist_email">
                  <?php echo get_the_author_meta( 'user_email', $user_id ); ?>
                </div>
              </a>
            </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
