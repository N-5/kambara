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
          <h2 class="m-h2">
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
              <p>お知らせはまだ掲載されていません。</p>
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
          <h2 class="m-h2">
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
          <h2 class="m-h2">
            <span class="en">Interview</span><br>
            <span class="jp">みんなのインタビュー</span>
          </h2>
        </div>

        <div class="wrapper_content">
          <?php
						$args = array(
							'post_type' => 'interview',
							'posts_per_page' => 1
						);
						$the_query = new WP_Query($args);
						if($the_query->have_posts()):
						?>
					<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
          <div class="c-interview">
            <div class="c-interview_image">
              <?php echo wp_get_attachment_image( get_field('interview_image'), 'interview_image' ); ?>
            </div>

            <div class="c-interview_text">
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

          <div class="m-top_readmore">
            <a href="<?php the_permalink() ?>">Read more</a>
          </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="schedule" data-color="dark">
    <div class="l-container">
      <div class="wrapper">
        <div class="wrapper_side">
          <h2 class="m-h2">
            <span class="en">Annual Schedule</span><br>
            <span class="jp">年間スケジュール</span>
          </h2>
        </div>

        <div class="wrapper_content">
          <div class="schedule_calender">
            <div class="c-demoSchedule">
              <?php echo do_shortcode( '[eo_fullcalendar responsive="false"]' ) ?>
            </div>
              <!-- <div class="c-demoSchedule">
                <?php echo do_shortcode( '[eo_fullcalendar defaultView="month" titleformatweek="Y年Mj日"]' ) ?>
              </div> -->
            
            <div class="schedule_month">
              <h4>
                <span class="en"><?php echo get_post_time('F'); ?> <?php echo wp_date( 'Y' ); ?></span><br>
                <span class="jp"><?php echo wp_date( 'F' ); ?></span>
              </h4>
              <div class="schedule_month_archive">
                <?php
                  $events = eo_get_events(array(
                    'event_start_before'=>'last day of this month',
                    'event_end_after'=>'first day of this month',
                    'showpastevents'=>'true'
                  ));
                    if($events):
                    foreach ($events as $event):
                        // var_dump($event);
                        $time = $event->post_modified_gmt;
                        $time_format = date('Y-m-d',  strtotime($time));
                        $format = ( eo_is_all_day($event->ID) ? get_option('date_format') : get_option('date_format').' '.get_option('time_format') );
                        
                        echo '<div class="schedule_month_archive_post">';
                        echo '<time>'.$time_format.'</time>';
                        echo '<div>'.$event->post_title.'</div>';
                        echo '</div>';
                        // printf(
                        //     '<li><a href="%s"><time></time> %s </a></li>',
                        //     get_permalink($event->ID),
                        //     get_the_title($event->ID),
                        //     eo_get_the_start( $format, $event->ID, $event->occurrence_id )
                        // );
                    endforeach;
                endif;
                ?>
              </div>
            </div>
          </div>

          <div class="m-top_readmore">
            <a href="<?php echo home_url(); ?>/schedule/event/on/<?php echo wp_date( 'Y' ); ?>/<?php echo wp_date( 'm' ); ?>/">Read more</a>
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
              <h2 class="m-h2">
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
              <h2 class="m-h2">
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
                <h2 class="m-h2">
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
                <h2 class="m-h2">
                  <span class="en">Family Tree</span><br>
                  <span class="jp">家系図</span>
                </h2>
                <div class="m-top_readmore">
                  <a href="<?php echo home_url(); ?>/family-tree/">
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
              <h2 class="m-h2">
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
              <h2 class="m-h2">
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