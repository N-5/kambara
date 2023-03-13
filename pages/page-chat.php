<?php
/*
Template Name: chat
*/
?>

<?php get_header(); ?>

<main id="chat">
  <section data-color="dark">
    <div class="l-container">
      <div class="l-container_side" data-fade>
        <h2 class="m-h2">
          <span class="en">Family Chat</span><br>
          <span class="jp">ファミリーチャット</span>
        </h2>

        <div class="chat_lead u-md">
          なんでもつぶやこう
        </div>
        
        <div class="chat_anchor js-accordion js-accordion_toggle">
          <div class="chat_anchor_ js-accordion-parent">
            自由につぶやいてください。
          </div>
          <div class="c_chatpost js-accordion-child">
            <?php if (function_exists('user_submitted_posts')) user_submitted_posts(); ?>
          </div>
        </div>

        <div class="chat_archive u-md">
          <h2 class="m-h2">
            <span class="en">Archive</span><br>
            <span class="jp">過去の投稿</span>
          </h2>
          
          <ul class="c-category">
            <?php wp_get_archives('type=yearly&post_type=post'); ?>
          </ul>
        </div>
      </div>

      <div class="l-container_content">
        <div class="c-chatlist">
          <?php
          $halfMonthago = date("Y/m/d", strtotime("-6 month"));
          
          $wp_query = new WP_Query();
            $args = array(
              'post_type' => 'post',
              'posts_per_page'=> -1,
              'date_query' => array(
              array(
                'inclusive' => true,
                'after'=> $halfMonthago
              ),
            ),
            );
            $wp_query->query($args);
            if( $wp_query->have_posts() ): while( $wp_query->have_posts() ) : $wp_query->the_post();
            $user_id = get_post_field( 'post_author', 100 );
            $count++;
          ?>
            <div class="c-chatlist_item" data-fade data-fade-delay="<?php echo($count); ?>">
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
                  投稿者：<?php the_author(); ?>
                </div>
                <!-- <div class="c-chatlist_email">
                  <?php echo get_the_author_meta( 'user_email', $user_id ); ?>
                </div> -->
              </a>
            </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>

      <div class="chat_archive u-mt_50 u-md_max" data-fade>
        <h2 class="m-h2 u-mb_30">
          <span class="en">Archive</span><br>
          <span class="jp">過去の投稿</span>
        </h2>
        
        <ul class="c-category">
          <?php wp_get_archives('type=yearly&post_type=post'); ?>
        </ul>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
