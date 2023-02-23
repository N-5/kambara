<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
  <head prefix="og: http://ogp.me/ns#">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name=”viewport” content=”width=device-width,initial-scale=1″>
    <title><?php wp_title(); ?></title>
    <?php get_template_part('lib/favicons'); ?>
    <?php wp_head() ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- end gtag -->
  </head>

  <body>
    <div class="loader">
			<div id="loader_content"></div>
		</div>

    <div id="app">
      <header id="header" class="header">
        <div class="inner">
          
        </div>
      </header>