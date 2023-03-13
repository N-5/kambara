<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
  <head prefix="og: http://ogp.me/ns#">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/app.css<?php echo '?ver=' . filemtime( get_stylesheet_directory() . '/assets/css/app.css'); ?>" rel="stylesheet">
    
    <title><?php bloginfo('name'); wp_title('|', true, 'left'); ?></title>
    <?php get_template_part('lib/favicons'); ?>
    <?php wp_head() ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- end gtag -->
  </head>

  <body>
    <!-- <div class="c-loader <?php if ( !is_home() && !is_front_page() ) : ?>is-onloading<?php endif; ?>"> -->
    <div id="app">
      <div class="c-loader is-onloading">
        <div class="c-loader__in">
          <div class="c-loader_content">
            <div class="c-loader_content_logo">
              <span>
                <svg>
                  <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/symbol-defs.svg#logo"></use>
                </svg>
              </span>
            </div>
          </div>
        </div>

        <div class="c-loader__out">
          <div class="c-loader_content">
            <div class="c-loader_content_logo">
              <span>
                <svg>
                  <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/symbol-defs.svg#logo"></use>
                </svg>
              </span>
            </div>
          </div>
        </div>
      </div>
      
      <header id="header" class="header js-floatingMenu is-view">
        <div class="header_inner">
          <h1 class="header_logo">
            <a href="<?php echo home_url(); ?>">
              <span class="header_logo_kamon">
                <svg>
                  <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/symbol-defs.svg#logo_kamon"></use>
                </svg>
              </span>
              <span class="header_logo_text">
                <svg>
                  <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/symbol-defs.svg#logo_text"></use>
                </svg>
              </span>
            </a>
          </h1>

          <div class="header_gnav">
            <ul class="header_nav">
              <li class="header_nav_item js-accordion c-accordion">
                <span class="js-accordion-parent is-active">お知らせ</span>
                <ul class="js-accordion-child is-active">
                  <li>
                    <a href="<?php echo home_url(); ?>/news/">
                      ― ニュース
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo home_url(); ?>/media/">
                      ― メディア掲載情報
                    </a>
                  </li>
                </ul>
              </li>
              <li class="header_nav_item js-accordion c-accordion">
                <span class="js-accordion-parent is-active">ファミリー</span>
                <ul class="js-accordion-child is-active">
                  <li>
                    <a href="<?php echo home_url(); ?>/member/">
                      ― メンバー
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo home_url(); ?>/family-tree/">
                      ― 家系図
                    </a>
                  </li>
                </ul>
              </li>
              <li class="header_nav_item">
                <a href="<?php echo home_url(); ?>/schedule/event/on/<?php echo wp_date( 'Y' ); ?>/<?php echo wp_date( 'm' ); ?>/">
                  年間<br>
                  スケジュール
                </a>
              </li>
              <li class="header_nav_item">
                <a href="<?php echo home_url(); ?>/chat/">
                  ファミリー<br>
                  チャット
                </a>
              </li>
              <li class="header_nav_item">
                <a href="<?php echo home_url(); ?>/interview/">
                  みんなの<br>
                  インタビュー
                </a>
              </li>
            </ul>

            <div class="header_humberger js-gnav-trigger">
              <button aria-controls="header_menu" role="button">
                <span></span>
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
      </header>

      <div class="header_menu js-gnav">
        <div class="header_menu_inner">
          <div class="header_menu_links">
            <div class="header_menu_links_wrap">
              <ul>
                <li class="js-accordion c-accordion">
                  <span class="js-accordion-parent is-active">お知らせ</span>
                  <ul class="js-accordion-child is-active">
                    <li>
                      <a href="<?php echo home_url(); ?>/news/">
                        ― ニュース
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo home_url(); ?>/media/">
                        ― メディア掲載情報
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>

              <ul>
                <li class="js-accordion c-accordion">
                  <span class="js-accordion-parent is-active">ファミリー</span>
                  <ul class="js-accordion-child is-active">
                    <li>
                      <a href="<?php echo home_url(); ?>/member/">
                        ― メンバー
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo home_url(); ?>/family-tree/">
                        ― 家系図
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>

              <ul>
                <li>
                  <a href="<?php echo home_url(); ?>/schedule/event/on/<?php echo wp_date( 'Y' ); ?>/<?php echo wp_date( 'm' ); ?>">
                    年間スケジュール
                  </a>
                </li>
                <li>
                  <a href="<?php echo home_url(); ?>/chat/">
                    ファミリーチャット
                  </a>
                </li>
                <li>
                  <a href="<?php echo home_url(); ?>/interview/">
                    みんなのインタビュー
                  </a>
                </li>
              </ul>
            </div>

            <div class="header_menu_links_wrap">
              <ul>
                <li>
                  <a href="<?php echo home_url(); ?>/motto/">
                    家訓
                  </a>
                </li>
                <li>
                  <a href="<?php echo home_url(); ?>/company-profile/">
                    会社情報
                  </a>
                </li>
                <li>
                  <a href="<?php echo home_url(); ?>/company/">
                    会社紹介
                  </a>
                </li>
              </ul>

              <ul>
                <li>
                  <a href="<?php echo home_url(); ?>/groupmagazine/">
                    グループ報『つねいし』
                  </a>
                </li>
                <li>
                  <a href="<?php echo home_url(); ?>/familymagazine/">
                    ファミリー会報誌『みろく』
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <div class="header_menu_search">
            <?php get_template_part('lib/m-searchform'); ?>
          </div>

          <div class="header_menu_mail">
            <a href="mailto:family-info@kambara-f.com">
              問い合わせ先  |  family-info@kambara-f.com
            </a>
          </div>
        </div>
      </div>