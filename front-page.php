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
            <div class="c-newslist_item">
              <a href="">
                <time class="c-newslist_time" datetime="">2022.06.16</time>
                <div class="c-newslist_title">【8/13開催予定】本年度 神原家ファミリー総会・先祖供養のご案内</div>
              </a>
            </div>

            <div class="c-newslist_item">
              <a href="">
                <time class="c-newslist_time" datetime="">2022.06.16</time>
                <div class="c-newslist_title">【8/13開催予定】本年度 神原家ファミリー総会・先祖供養のご案内</div>
              </a>
            </div>
            
            <div class="c-newslist_item">
              <a href="">
                <time class="c-newslist_time" datetime="">2022.06.16</time>
                <div class="c-newslist_title">【8/13開催予定】本年度 神原家ファミリー総会・先祖供養のご案内</div>
              </a>
            </div>
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
            <div class="c-newslist_item">
              <a href="">
                <time class="c-newslist_time" datetime="">2022.06.16</time>
                <div class="c-newslist_title">【8/13開催予定】本年度 神原家ファミリー総会・先祖供養のご案内</div>
              </a>
            </div>

            <div class="c-newslist_item">
              <a href="">
                <time class="c-newslist_time" datetime="">2022.06.16</time>
                <div class="c-newslist_title">【8/13開催予定】本年度 神原家ファミリー総会・先祖供養のご案内</div>
              </a>
            </div>
            
            <div class="c-newslist_item">
              <a href="">
                <time class="c-newslist_time" datetime="">2022.06.16</time>
                <div class="c-newslist_title">【8/13開催予定】本年度 神原家ファミリー総会・先祖供養のご案内</div>
              </a>
            </div>
          </div>

          <div class="m-top_readmore">
            <a href="<?php echo home_url(); ?>/press/">Read more</a>
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
          <div class="">
            <?php
          $args = array(
            'post_type' => 'schedule',
            'posts_per_page' => -1,
            'date_query' => array(
            'year' => current_time( 'Y' ),
            'month' => current_time( 'm' ),
            ),
          );
          $the_query = new WP_Query($args); if($the_query->have_posts()):
            // var_dump($the_query);
          ?>
          <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
          <article class="top-news-list__item" data-inview>
            <a href="<?php the_permalink() ?>">
              <div class="detail">
                <time class="time"><?php the_time('Y.m.d') ?></time>
                <div class="categogy">
                  <?php $custom_post_tag = 'news-category';
                    $custom_post_tag_terms = wp_get_object_terms($post->ID, $custom_post_tag);
                    if(!empty($custom_post_tag_terms)){
                      if(!is_wp_error( $custom_post_tag_terms )){
                        foreach($custom_post_tag_terms as $term){
                          $tag_term_link = get_term_link($term->slug, $custom_post_tag);
                          $tag_term_name = $term->name;
                          echo $tag_term_name;
                        }
                      }
                    }
                  ?>
                </div>
              </div>
              <h3 class="title"><?php the_title() ?></h3>
            </a>
          </article>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          <?php else: ?>
          <p>今月のスケジュールはありません。</p>
          <?php endif; ?>

          
            <?php
              // 今日の日付を取得
              date_default_timezone_set('Asia/Tokyo'); // タイムゾーンの指定（必要なければ削除）
              $this_date = date('Y-m-1'); // 今日の日付を元に今月の月初めを取得
              $this_year = date('Y', strtotime($this_date)); // 年を取得
              $this_month = date('m', strtotime($this_date)); // 月を取得
              ?>
            <?php
              $year = get_query_var( 'year' );
              $monthnum = get_query_var( 'monthnum' );
              $args = array(
                'date_query' => array(
                  array(
                    'after' => array(
                      'year' => $this_year, // 今年
                      'month' => $this_month, // 今月
                      'day' => 1,
                    ),
                    'before' => array(
                      'year' => $this_year, // 今年
                      'month' => $this_month, // 今月
                      'day' => 31,
                    ),
                    'inclusive' => true,
                  ),
                ),
                
                'post_type' => 'schedule',
                'order' => 'date',
                'order' => 'ASC',
                'posts_per_page' => -1
              );
				?>

				<?php $my_query = new WP_Query( $args ); ?>
				<?php if ( $my_query->have_posts() ) : ?>
				<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark">
							<time datetime="<?php the_time('Y-m-d'); ?>">
								<?php the_time('Y.m.d'); ?>
							</time>
			<?php the_title_attribute(); ?>/* 記事タイトル*/
			<?php echo wp_trim_words( get_the_content(), 200, '…' ); ?>/* 記事本文200文字だけ取得の例*/
				
				</a>

				<?php endwhile; ?>
				<?php else : //記事が無い場合の文章表示 ?>
				<p>該当する記事がありません。</p>

				<?php endif; ?>
            <?php get_template_part('lib/calender'); ?>
          </div>
          <div class="m-top_readmore">
            <a href="<?php echo home_url(); ?>/schedule/">Read more</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>