  <footer id="footer" class="footer">
    <div class="l-container">
      <div class="footer_logo">
        <a href="<?php echo home_url(); ?>">
          <svg>
            <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/symbol-defs.svg#logo"></use>
          </svg>
        </a>
      </div>

      <div class="footer_links">
        <ul>
          <li>
            <a href="<?php echo home_url(); ?>/news/">
              お知らせ
            </a>
          </li>
          <li>
            <a href="<?php echo home_url(); ?>/news/">
              インタビュー
            </a>
          </li>
          <li>
            <a href="<?php echo home_url(); ?>/news/">
              年間スケジュール
            </a>
          </li>
          <li>
            <a href="<?php echo home_url(); ?>/news/">
              ファミリーチャット
            </a>
          </li>
          <li>
            <a href="<?php echo home_url(); ?>/news/">
              ファミリーメンバー
            </a>
          </li>
        </ul>

        <ul>
          <li>
            <a href="<?php echo home_url(); ?>/news/">
              家訓
            </a>
          </li>
          <li>
            <a href="<?php echo home_url(); ?>/news/">
              家系図
            </a>
          </li>
          <li>
            <a href="<?php echo home_url(); ?>/news/">
              会社情報
            </a>
          </li>
        </ul>

        <ul>
          <li>
            <a href="<?php echo home_url(); ?>/news/">
              グループ報『つねいし』
            </a>
          </li>
          <li>
            <a href="<?php echo home_url(); ?>/news/">
              ファミリー会報誌『みろく』
            </a>
          </li>
        </ul>
      </div>

      <div class="footer_contact">
        <div class="footer_contact_search">
          <input type="text" placeholder="Search">
        </div>
        
        <div class="footer_contact_mail">
          <a href="mailto:family-info@kambara-f.com">
            問い合わせ先  |  family-info@kambara-f.com
          </a>
        </div>
      </div>
    </div>
  </footer>
</div>
<!-- end #app -->

  <?php wp_footer(); ?>
  <script defer type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/assets/js/app.js'></script>
</body>
</html>
