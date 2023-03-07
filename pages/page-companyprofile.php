<?php
/*
Template Name: company-profile
*/
?>

<?php get_header(); ?>

<main id="company">
  <section class="profile" data-color="dark">
    <div class="l-container">
      <h2 class="m-h2">
        <span class="en">Company Profile</span><br>
        <span class="jp">会社情報</span>
      </h2>

      <h3 class="profile_h3">
        常石グループ企業理念
      </h3>
      <p class="profile_catch">
        社員の幸せのために<br>
        事業の安定と発展を<br class="u-md_max">追求する
      </p>
    </div>
  </section>

  <section class="chart" data-color="dark">
    <div class="l-container">
      <h2 class="m-h2">
        <span class="en">Organization Chart</span><br>
        <span class="jp">会社組織図</span>
      </h2>

      <p class="chart_lead">
        9か国に展開する合計65の企業や<br class="u-md_max">財団が、社会活動に貢献します。
      </p>
      
      <div class="chart_image">
        <div class="chart_image_scroller js-scrollable">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/company/company_tree.svg" alt="">
        </div>
      </div>
    </div>
  </section>

  <div class="l-container">
    <div class="c-backlink">
      <a href="<?php echo home_url(); ?>">
        Back
      </a>
    </div>
  </div>
</main>

<?php get_footer(); ?>
