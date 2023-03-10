<?php
/*
Template Name: family-Tree
*/
?>

<?php get_header(); ?>

<main id="familytree">
  <section class="familytree" data-color="dark" data-fade>
    <div class="l-container">
      <h2 class="m-h2">
        <span class="en">Family Tree</span><br>
        <span class="jp">家系図</span>
      </h2>

      <div class="familytree_image js-scrollable">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/familytree/familytree.svg" alt="">
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
