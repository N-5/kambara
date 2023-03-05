<?php get_header(); ?>

<main id="error">
  <section class="error-notpage" data-color="dark">
    <div class="l-container">
      <div class="l-container_side">
        <h2 class="m-h2">
          <span class="en">404 Not found</span><br>
          <span class="jp">エラー</span>
        </h2>
      </div>

      <div class="l-container_content">
        <p class="m-text">
          大変申し訳ありませんが、<br class="u-md_max">該当ページがございません。<br>
          このページをブックマーク登録されていた方は、<br>お手数ですがブックマークの変更をお願いいたします。
        </p>

        <div class="m-top_readmore">
          <a href="<?php echo home_url(); ?>">Back top</a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
