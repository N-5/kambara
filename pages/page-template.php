<?php
/*
Template Name: sample
*/
?>

<?php get_header(); ?>

<main id="sample">
  <section data-color="dark" data-fade>
    <div class="l-container">
      <div class="l-container_side">
        <h2 class="m-h2">
          <span class="en"><?php the_title() ?></span><br>
          <span class="jp">サンプル</span>
        </h2>
      </div>

      <div class="l-container_content">
        <div class="c-postarea">
          <?php the_content() ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
