  <footer id="footer" class="footer">
    <div class="footer-container">
      <div class="footer_logo">
        <a href="<?php echo home_url(); ?>">
          <svg>
            <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/symbol-defs.svg#logo"></use>
          </svg>
        </a>
      </div>

      <div class="footer_links">
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
            <a href="<?php echo home_url(); ?>/schedule/event/on/<?php echo wp_date( 'Y' ); ?>/<?php echo wp_date( 'm' ); ?>/">
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

      <div class="footer_contact">
        <div class="footer_contact_search">
          <?php get_template_part('lib/m-searchform'); ?>
        </div>
        
        <div class="footer_contact_mail">
          <a href="mailto:family-info@kambara-f.com" target="_blank">
            問い合わせ先  |  family-info@kambara-f.com
          </a>
        </div>
      </div>
    </div>
  </footer>
</div>
<!-- end #app -->

  <?php wp_footer(); ?>
  
  <script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/assets/js/splash.js'></script>
  <script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/assets/js/app.js<?php echo '?ver=' . filemtime( get_stylesheet_directory() . '/assets/js/app.js'); ?>'></script>
</body>
</html>
