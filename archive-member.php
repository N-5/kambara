<?php get_header(); ?>

<main id="member">
  <section>
    <div class="l-container l-container_mgt">
      <div class="l-container_side">
        <h2 class="m-h2">
          <span class="en">Family Member</span><br>
          <span class="jp">メンバー</span>
        </h2>
      </div>

      <div class="l-container_content">
        <ul class="c-category_inteview">
          <li class="c-category_inteview_item">
            <a href="#first" class="js-anchor">
              第一世代
            </a>
          </li>
          <li class="c-category_inteview_item">
            <a href="#second" class="js-anchor">
              第二世代
            </a>
          </li>
          <li class="c-category_inteview_item">
            <a href="#third" class="js-anchor">
              第三世代
            </a>
          </li>
          <li class="c-category_inteview_item">
            <a href="#fourth" class="js-anchor">
              第四世代
            </a>
          </li>
          <li class="c-category_inteview_item">
            <a href="#fourth" class="js-anchor">
              第五世代
            </a>
          </li>
          <li class="c-category_inteview_item">
            <a href="#deceased" class="js-anchor">
              故人一覧
            </a>
          </li>
          <!-- <?php
            wp_list_categories (
              array(
                'post-type' => 'member',
                'taxonomy' => 'member-category',
                'title_li' => '',
                'hide_empty' => '0',
              )
            );
          ?> -->
        </ul>
      </div>
    </div>
  </section>

  <section id="first" class="member_section">
    <div class="l-container l-container_mgt">
      <div class="l-container_side">
        <h2 class="m-h3">
          <span class="jp">第一世代</span>
          <span class="en">First</span>
        </h2>
      </div>

      <div class="l-container_content">
        <div class="c-member c-member_archive">
          <?php
            $args = array(
              'tax_query' => array( 
              array(
                'taxonomy' => 'member-category',
                'field' => 'slug',
                'terms' => array( 'first' )
              ),
            ),
            'post_type' => 'member',
            'posts_per_page'=> -1
            );
            $the_query = new WP_Query($args);
            if($the_query->have_posts()):
          ?>
          <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
          <div class="c-member_item">
            <a href="" target="_blank">
              <div class="c-member_image">
                <?php 
                  $sex = get_field_object('member_sex');
                  $value = $sex['value'];
                  $ptnAbs = get_field('member_pattern'); 
                  if($value == 'men'):
                ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/member/user_thumbnail_men.svg" alt="男性">
              <?php else: ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/member/user_thumbnail_woman.svg" alt="女性">
              <?php endif; ?>
              </div>
              <?php if(!empty($ptnAbs)): ?>
              <div class="c-member_pattern"><?php the_field('member_pattern'); ?></div>
              <?php endif; ?>
              <div class="c-member_name"><?php the_title() ?></div>
            </a>
          </div>
        <?php endwhile; ?>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <section id="second" class="member_section">
    <div class="l-container l-container_mgt">
      <div class="l-container_side">
        <h2 class="m-h3">
          <span class="jp">第二世代</span>
          <span class="en">Second</span>
        </h2>
      </div>

      <div class="l-container_content">
        <div class="c-member c-member_archive">
          <?php
            $args = array(
              'tax_query' => array( 
              array(
                'taxonomy' => 'member-category',
                'field' => 'slug',
                'terms' => array( 'second' )
              ),
            ),
            'post_type' => 'member',
            'posts_per_page'=> -1
            );
            $the_query = new WP_Query($args);
            if($the_query->have_posts()):
          ?>
          <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
          <div class="c-member_item">
            <a href="" target="_blank">
              <div class="c-member_image">
                <?php 
                  $sex = get_field_object('member_sex');
                  $value = $sex['value'];
                  $ptnAbs = get_field('member_pattern'); 
                  if($value == 'men'):
                ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/member/user_thumbnail_men.svg" alt="男性">
              <?php else: ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/member/user_thumbnail_woman.svg" alt="女性">
              <?php endif; ?>
              </div>
              <?php if(!empty($ptnAbs)): ?>
              <div class="c-member_pattern"><?php the_field('member_pattern'); ?></div>
              <?php endif; ?>
              <div class="c-member_name"><?php the_title() ?></div>
            </a>
          </div>
        <?php endwhile; ?>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <section id="third" class="member_section">
    <div class="l-container l-container_mgt">
      <div class="l-container_side">
        <h2 class="m-h3">
          <span class="jp">第三世代</span>
          <span class="en">third</span>
        </h2>
      </div>

      <div class="l-container_content">
        <div class="c-member c-member_archive">
          <?php
            $args = array(
              'tax_query' => array( 
              array(
                'taxonomy' => 'member-category',
                'field' => 'slug',
                'terms' => array( 'third' )
              ),
            ),
            'post_type' => 'member',
            'posts_per_page'=> -1
            );
            $the_query = new WP_Query($args);
            if($the_query->have_posts()):
          ?>
          <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
          <div class="c-member_item">
            <a href="" target="_blank">
              <div class="c-member_image">
                <?php 
                  $sex = get_field_object('member_sex');
                  $value = $sex['value'];
                  $ptnAbs = get_field('member_pattern'); 
                  if($value == 'men'):
                ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/member/user_thumbnail_men.svg" alt="男性">
              <?php else: ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/member/user_thumbnail_woman.svg" alt="女性">
              <?php endif; ?>
              </div>
              <?php if(!empty($ptnAbs)): ?>
              <div class="c-member_pattern"><?php the_field('member_pattern'); ?></div>
              <?php endif; ?>
              <div class="c-member_name"><?php the_title() ?></div>
            </a>
          </div>
        <?php endwhile; ?>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <section id="fourth" class="member_section">
    <div class="l-container l-container_mgt">
      <div class="l-container_side">
        <h2 class="m-h3">
          <span class="jp">第四世代</span>
          <span class="en">fourth</span>
        </h2>
      </div>

      <div class="l-container_content">
        <div class="c-member c-member_archive">
          <?php
            $args = array(
              'tax_query' => array( 
              array(
                'taxonomy' => 'member-category',
                'field' => 'slug',
                'terms' => array( 'fourth' )
              ),
            ),
            'post_type' => 'member',
            'posts_per_page'=> -1
            );
            $the_query = new WP_Query($args);
            if($the_query->have_posts()):
          ?>
          <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
          <div class="c-member_item">
            <a href="" target="_blank">
              <div class="c-member_image">
                <?php 
                  $sex = get_field_object('member_sex');
                  $value = $sex['value'];
                  $ptnAbs = get_field('member_pattern'); 
                  if($value == 'men'):
                ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/member/user_thumbnail_men.svg" alt="男性">
              <?php else: ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/member/user_thumbnail_woman.svg" alt="女性">
              <?php endif; ?>
              </div>
              <?php if(!empty($ptnAbs)): ?>
              <div class="c-member_pattern"><?php the_field('member_pattern'); ?></div>
              <?php endif; ?>
              <div class="c-member_name"><?php the_title() ?></div>
            </a>
          </div>
        <?php endwhile; ?>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <section id="deceased" class="member_section">
    <div class="l-container l-container_mgt">
      <div class="l-container_side">
        <h2 class="m-h3">
          <span class="jp">故人一覧</span>
          <span class="en">List of Deceased</span>
        </h2>
      </div>

      <div class="l-container_content">
        <div class="c-member c-member_archive">
          <?php
            $args = array(
              'tax_query' => array( 
              array(
                'taxonomy' => 'member-category',
                'field' => 'slug',
                'terms' => array( 'deceased' )
              ),
            ),
            'post_type' => 'member',
            'posts_per_page'=> -1
            );
            $the_query = new WP_Query($args);
            if($the_query->have_posts()):
          ?>
          <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
          <div class="c-member_item">
            <a href="" target="_blank">
              <div class="c-member_image">
                <?php 
                  $sex = get_field_object('member_sex');
                  $value = $sex['value'];
                  $ptnAbs = get_field('member_pattern'); 
                  if($value == 'men'):
                ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/member/user_thumbnail_men.svg" alt="男性">
              <?php else: ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/member/user_thumbnail_woman.svg" alt="女性">
              <?php endif; ?>
              </div>
              <?php if(!empty($ptnAbs)): ?>
              <div class="c-member_pattern"><?php the_field('member_pattern'); ?></div>
              <?php endif; ?>
              <div class="c-member_name"><?php the_title() ?></div>
            </a>
          </div>
        <?php endwhile; ?>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
