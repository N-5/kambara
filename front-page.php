<?php get_header(); ?>

<main id="top">
  <section class="visual" data-color="light">
    <div class="visual_slider js-visual_slider">
      <div class="visual_slider_item"></div>
      <div class="visual_slider_item"></div>
      <div class="visual_slider_item"></div>
      <div class="visual_slider_item"></div>
      <div class="visual_slider_item"></div>
    </div>

    <div class="visual_scroller">
      <div class="visual_scroller_border">
        <span></span>
      </div>
    </div>
  </section>

  <section class="news" data-color="dark">
    <div class="l-container">
      <div class="wrapper">
        <div class="wrapper_side">
          <h2 class="m-top_h2">
            <span class="en">News</span><br>
            <span class="jp">お知らせ</span>
          </h2>
        </div>

        <div class="wrapper_content">
          <div class="c-newslist">
          <?php
            $args = array(
              'post_type' => 'news',
              'posts_per_page' => 5
            );
            $the_query = new WP_Query($args); if($the_query->have_posts()):
          ?>
          <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
            <div class="c-newslist_item">
              <a href="<?php the_permalink() ?>">
                <time class="c-newslist_time" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time>
                <div class="c-newslist_title"><?php the_title() ?></div>
              </a>
            </div>
            <?php endwhile; ?>
            
            <?php wp_reset_postdata(); ?>
            <?php else: ?>
            <p>ニュースはまだ掲載されていません。</p>
            <?php endif; ?>
          </div>

          <div class="m-top_readmore">
            <a href="<?php echo home_url(); ?>/news/">Read more</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="press" data-color="dark">
    <div class="l-container">
      <div class="wrapper">
        <div class="wrapper_side">
          <h2 class="m-top_h2">
            <span class="en">Press</span><br>
            <span class="jp">メディア掲載情報</span>
          </h2>
        </div>

        <div class="wrapper_content">
          <div class="c-newslist">
            <?php
              $args = array(
                'post_type' => 'media',
                'posts_per_page' => 5
              );
              $the_query = new WP_Query($args); if($the_query->have_posts()):
            ?>
            <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
            <div class="c-newslist_item">
              <a href="<?php the_permalink() ?>">
                <time class="c-newslist_time" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time>
                <div class="c-newslist_title"><?php the_title() ?></div>
              </a>
            </div>
            <?php endwhile; ?>
            
            <?php wp_reset_postdata(); ?>
            <?php else: ?>
            <p>メディアはまだ掲載されていません。</p>
            <?php endif; ?>
          </div>

          <div class="m-top_readmore">
            <a href="<?php echo home_url(); ?>/media/">Read more</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="interview" data-color="dark">
    <div class="l-container">
      <div class="wrapper">
        <div class="wrapper_side">
          <h2 class="m-top_h2">
            <span class="en">Interview</span><br>
            <span class="jp">みんなのインタビュー</span>
          </h2>
        </div>

        <div class="wrapper_content">
          <div class="c-interview">
            <div class="c-interview_image">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/top/interview_image.jpg" alt="">
            </div>

            <div class="c-interview_text">
              <div class="c-interview_number">
                第一回
              </div>
              <div class="c-interview_title">
                必ず到来する変化に備え、<br>
                人も企業も学び、変わり続けよう
              </div>
              <div class="c-interview_role">
                ○○株式会社　代表取締役社長　○○ ○○
              </div>
              <div class="c-interview_sentence">
                <p>
                  求人サービスで躍進するビズリーチが、グループ経営体制に移行し、Visionalとして新たなスタートをきったのが、2020年2月。その後、2021年4月には、東証マザーズ(当時)へ「ユニコーン上場」を果たし、世の注目を集めた。コロナ禍をむしろ追い風とするかのように、時流を捉えて成長を続ける同社だが、代表の南氏は、「我々が志してきたのは、事業を通じて新しい時代のムーブメントをつくること」とし、「まだ緒に就いたばかり」と語る。いまもっとも勢いのあるベンチャー企業のひとつである同社が見据える、「新しい時代」とはいかなるものか。同氏に聞いた。
                </p>
              </div>
            </div>
          </div>

          <div class="m-top_readmore">
            <a href="<?php echo home_url(); ?>/interview/">Read more</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="schedule" data-color="dark">
    <div class="l-container">
      <div class="wrapper">
        <div class="wrapper_side">
          <h2 class="m-top_h2">
            <span class="en">Annual Schedule</span><br>
            <span class="jp">年間スケジュール</span>
          </h2>
        </div>

        <div class="wrapper_content">
          <div class="schedule_calender">
            <?php get_template_part('lib/calender'); ?>
            
            <div class="schedule_month">
              <h4>
                <span class="en">February 2023</span><br>
                <span class="jp">2月</span>
              </h4>

              <div class="schedule_month_archive">
                <div class="schedule_month_archive_post">
                  <a href="">
                    <time>2/24</time>
                    <div>神原誠之様命日</div>
                  </a>
                </div>

                <div class="schedule_month_archive_post">
                  <a href="">
                    <time>2/24</time>
                    <div>神原誠之様命日</div>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="m-top_readmore">
            <a href="<?php echo home_url(); ?>/schedule/">Read more</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="links" data-color="light">
    <div class="l-container">
      <div class="companyGrid l-column2">
        <div class="l-column2_item">
          <div class="companyGrid_profile js-expandlink">
            <div class="inner">
              <h2 class="m-top_h2">
                <span class="en">Company Profile</span><br>
                <span class="jp">会社情報</span>
              </h2>
              <div class="m-top_readmore">
                <a href="<?php echo home_url(); ?>/company-profile/">
                  Read more
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="companyGrid_family l-column2_item">
          <div class="companyGrid_chat js-expandlink">
            <div class="inner">
              <h2 class="m-top_h2">
                <span class="en">Family Chat</span><br>
                <span class="jp">ファミリーチャット</span>
              </h2>
              <div class="m-top_readmore">
                <a href="<?php echo home_url(); ?>/chat/">
                  Read more
                </a>
              </div>
            </div>
          </div>

          <div class="l-column2">
            <div class="companyGrid_motto l-column2_item js-expandlink">
              <div class="inner">
                <h2 class="m-top_h2">
                  <span class="en">Family Motto</span><br>
                  <span class="jp">家訓</span>
                </h2>
                <div class="m-top_readmore">
                  <a href="<?php echo home_url(); ?>/motto/">
                    Read more
                  </a>
                </div>
              </div>
            </div>

            <div class="companyGrid_tree l-column2_item js-expandlink">
              <div class="inner">
                <h2 class="m-top_h2">
                  <span class="en">Family Tree</span><br>
                  <span class="jp">家系図</span>
                </h2>
                <div class="m-top_readmore">
                  <a href="<?php echo home_url(); ?>/chat/">
                    Read more
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="groupGrid">
        <div class="l-column2">
          <div class="companyGrid_groupmagazine l-column2_item js-expandlink">
            <div class="inner">
              <h2 class="m-top_h2">
                <span class="en">Tsuneishi</span><br>
                <span class="jp">グループ報『つねいし』</span>
              </h2>
              <div class="m-top_readmore">
                <a href="<?php echo home_url(); ?>/groupmagazine/">
                  Read more
                </a>
              </div>
            </div>
          </div>

          <div class="companyGrid_familymagazine l-column2_item js-expandlink">
            <div class="inner">
              <h2 class="m-top_h2">
                <span class="en">Miroku</span><br>
                <span class="jp">ファミリー会報誌『みろく』</span>
              </h2>
              <div class="m-top_readmore">
                <a href="<?php echo home_url(); ?>/familymagazine/">
                  Read more
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>