<?php
/*
Template Name: family-Tree
*/
?>

<?php get_header(); ?>

<main id="vv">
  <section class="tree" data-color="dark">
    <div class="l-container">
      <h2 class="m-h2">
        <span class="en">Family Tree</span><br>
        <span class="jp">家系図</span>
      </h2>

      <div class="tree_image">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/familytree/familytree.svg" alt="">
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
