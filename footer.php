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
        <?php get_template_part('lib/c-links'); ?>
      </div>

      <div class="footer_contact">
        <div class="footer_contact_search">
          <?php get_template_part('lib/c-searchform'); ?>
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
