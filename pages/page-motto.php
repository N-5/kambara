<?php
/*
Template Name: motto
*/
?>

<?php get_header(); ?>

<main id="motto">
  <section class="motto" data-color="dark" data-fade>
    <div class="l-container">
      <h2 class="m-h2">
        <span class="en">Family Motto</span><br>
        <span class="jp">家訓</span>
      </h2>

      <div class="motto_concept">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/motto/motto1.png" alt="">
      </div>
    </div>
  </section>

  <section class="index" data-color="dark">
    <div class="l-container">
      <h2 class="m-h2" data-fade>
        <span class="en">Contents</span><br>
        <span class="jp">目次</span>
      </h2>

      <div class="index_anchor" data-fade>
        <ul>
          <li>
            <a href="#motto4" class="js-anchor js-outlink">
              地域社会における心がまえ ｜ <small>読む</small>
            </a>
          </li>
          <li>
            <a href="#motto3" class="js-anchor js-outlink">
              事業家としての心がまえ ｜ <small>読む</small>
            </a>
          </li>
          <li>
            <a href="#motto2" class="js-anchor js-outlink">
              家族としての心がまえ ｜ <small>読む</small>
            </a>
          </li>
          <li>
            <a href="#motto1" class="js-anchor js-outlink">
              人としての心がまえ ｜ <small>読む</small>
            </a>
          </li>
        </ul>
      </div>

      <div id="motto1" class="index_content" data-fade>
        <picture>
          <source media="(max-width:769px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/motto/motto_1_sp.svg">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/motto/motto_1.svg" alt="">
        <picture>
      </div>

      <div id="motto2" class="index_content" data-fade>
        <picture>
          <source media="(max-width:769px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/motto/motto_2_sp.svg">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/motto/motto_2.svg" alt="">
        <picture>
      </div>

      <div id="motto3" class="index_content" data-fade>
        <picture>
          <source media="(max-width:769px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/motto/motto_3_sp.svg">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/motto/motto_3.svg" alt="">
        <picture>
      </div>

      <div id="motto4" class="index_content" data-fade>
        <picture>
          <source media="(max-width:769px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/motto/motto_4_sp.svg">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/motto/motto_4.svg" alt="">
        <picture>
      </div>
    </div>
  </section>

  <div class="l-container" data-fade>
    <div class="c-backlink">
      <a href="<?php echo home_url(); ?>">
        Back
      </a>
    </div>
  </div>
</main>

<?php get_footer(); ?>

