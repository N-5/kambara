<?php

//remove wp_head
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');

// remove emoji
function disable_emoji() {
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emoji');

//remove update
function update_nag_hide() {
  remove_action( 'admin_notices', 'update_nag', 3 );
}
add_action( 'admin_init', 'update_nag_hide' );

//remove jquery
// function my_delete_local_jquery() {
//   wp_deregister_script('jquery');
// }
// add_action( 'wp_enqueue_scripts', 'my_delete_local_jquery' );

// 管理バー(ヘッダー)の項目を非表示
function remove_admin_bar_menu($wp_admin_bar) {
	$wp_admin_bar->remove_menu('wp-logo');// WordPressロゴ
	//$wp_admin_bar->remove_menu( 'site-name' );サイト名
	$wp_admin_bar->remove_menu( 'view-site' );//サイト名-サイトを表示
	$wp_admin_bar->remove_menu( 'updates' );//更新
	$wp_admin_bar->remove_menu('comments');// コメント
	//$wp_admin_bar->remove_menu('new-content');// 新規
	$wp_admin_bar->remove_menu( 'new-post' );//新規-投稿
	$wp_admin_bar->remove_menu( 'new-media' );//新規-メディア
	$wp_admin_bar->remove_menu( 'new-link' );//新規-リンク
	$wp_admin_bar->remove_menu( 'new-page' );//新規-固定ページ
	$wp_admin_bar->remove_menu( 'new-user' );//新規-ユーザー
	//$wp_admin_bar->remove_menu( 'my-account' );//アカウント
	$wp_admin_bar->remove_menu('user-info');// アカウント-プロフィール
	$wp_admin_bar->remove_menu('edit-profile');// アカウント-プロフィール編集
	//$wp_admin_bar->remove_menu( 'logout' ); //アカウント-ログアウト
}
add_action('admin_bar_menu', 'remove_admin_bar_menu', 201);

// 管理バーのタブメニューを非表示にする
function my_admin_head(){
	//echo '<style type="text/css">#screen-options-link-wrap{display:none;}</style>';//表示オプション
	echo '<style type="text/css">#contextual-help-link-wrap{display:none;}</style>';//ペルプ
}
add_action('admin_head', 'my_admin_head');

// Hide useless admin menu
function remove_admin_menu() {
  remove_menu_page('index.php' );
  // remove_menu_page('edit.php');
  remove_menu_page('upload.php');
  remove_menu_page('edit-comments.php');
  remove_menu_page('themes.php');
}
add_action('admin_menu', 'remove_admin_menu');

//ダッシュボード
remove_action( 'welcome_panel', 'wp_welcome_panel' ); // 「WordPress へようこそ !」を削除
function remove_dashboard_widget() {
	remove_meta_box('dashboard_right_now', 'dashboard', 'normal');//概要
	remove_meta_box('dashboard_activity', 'dashboard', 'normal');//アクティビティ
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side');//クイックドラフト
	remove_meta_box('dashboard_primary', 'dashboard', 'side');//WordPressニュース

}
add_action('wp_dashboard_setup', 'remove_dashboard_widget');


//eyecatch img
// add_theme_support('post-thumbnails');
// set_post_thumbnail_size(432, 520, true);


//not auth redirect
function my_require_login() {
  global $pagenow;
  if ( ! is_user_logged_in() &&
    $pagenow !== 'wp-login.php' &&
    ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) &&
    ! ( defined( 'DOING_CRON' ) && DOING_CRON ) ) {
  auth_redirect();
  }
}
add_action( 'init', 'my_require_login' );

//after login, redirect
function custom_login_redirect() {
  $logo_url = get_bloginfo( 'url' );
  
  return $logo_url;
}
add_filter('login_redirect', 'custom_login_redirect');

//login logo
function custom_login_logo() {
	echo '<style type="text/css">.login h1 a { width: 242px !important; height: 54px !important; background: url('.get_bloginfo('template_directory').'/src/images/login/login-logo.png) no-repeat center center !important; margin-bottom: 30px !important; background-size: cover !important;}</style>';
}
add_action( 'login_enqueue_scripts', 'custom_login_logo' );

function custom_login_logo_url() {
	//サイトURLを取得
	$logo_url = get_bloginfo( 'url' );
	return $logo_url;
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );

//a要素のtitle属性を変更
function custom_login_logo_url_title() {
	return 'Kambara Family Community';
}
add_filter( 'login_headertitle', 'custom_login_logo_url_title' );

//custom img size
if ( function_exists('add_image_size')) {
  add_image_size('interview_image', 800, 1080, true);
  add_image_size('interview_image_2x', 1600, 2160, true);
  add_image_size('tsuneishi_image', 520, 372, true);
  add_image_size('tsuneishi_image_2x', 1040, 744, true);
  add_image_size('miroku_image', 272, 372, true);
  add_image_size('miroku_image_2x', 544, 744, true);
  add_image_size('member_image', 270, 376, true);
  add_image_size('member_image_2x', 540, 752, true);

  // add_image_size('custom_medium', 600, 360, true);
}

// Using SVG files in Wordpress
function add_svg_to_upload_mimes($upload_mimes) {
  $upload_mimes['svg']  = 'image/svg+xml';
  $upload_mimes['svgz'] = 'image/svg+xml';
  return $upload_mimes;
}
add_filter('upload_mimes', 'add_svg_to_upload_mimes', 10, 1);

// Hide admin bar
add_filter( 'show_admin_bar', '__return_false' );

//管理画面フッター表示カスタム
function custom_admin_footer() {
    echo '不具合・ご相談がありましたら <a href="mailto:yfe63590@gmail.com">お問い合わせ</a>（担当中井まで）';
}
add_filter('admin_footer_text', 'custom_admin_footer');

// wp_titleの半角除去
function my_title_fix($title, $sep, $seplocation) {
  if(!$sep || $sep == "｜"){
    $title = str_replace(' '.$sep.' ', $sep, $title);
  }
  return $title;
}
add_filter('wp_title', 'my_title_fix', 10, 3);

//custom-post-type
function implement_custom_posts($value='') {
  $news = (object) array(
    "slug" => "news",
    "name" => "ニュース",
    "has_archive" => true,
  );
  $member = (object) array(
    "slug" => "member",
    "name" => "メンバー",
    "has_archive" => true,
  );
  $media = (object) array(
    "slug" => "media",
    "name" => "メディア",
    "has_archive" => true,
  );
  // $schedule = (object) array(
  //   "slug" => "schedule",
  //   "name" => "年間スケジュール",
  //   "has_archive" => false,
  // );
  $interview = (object) array(
    "slug" => "interview",
    "name" => "インタビュー",
    "has_archive" => true,
  );
  $groupmagazine = (object) array(
    "slug" => "groupmagazine",
    "name" => "つねいし",
    "has_archive" => true,
  );
  $familymagazine = (object) array(
    "slug" => "familymagazine",
    "name" => "みろく",
    "has_archive" => true,
  );
  $contents_array = [
    $news,
    $member,
    $media,
    // $schedule,
    $interview,
    $groupmagazine,
    $familymagazine
  ];
  foreach ($contents_array as $key => $value) {
    add_custom($value);
    implement_custom_posts_category($value);
    implement_custom_posts_category($value);
  }
}

//custom-post-type category
function implement_custom_posts_category($value) {
  $labels = array(
    "name" => _x( $value -> name . "カテゴリ", "" ),
  );
  $args = array(
    "hierarchical"      => true,
    "labels"            => $labels,
    "show_ui"           => true,
    "show_in_rest"      => true,
    "show_admin_column" => true,
    "query_var"         => true,
  );
  register_taxonomy(
    $value -> slug . "-category",
    array( $value -> slug ),
    $args
  );
}

//投稿をチャット投稿に変更
function Change_menulabel() {
	global $menu;
	global $submenu;
	$name = 'チャット投稿';
	$menu[5][0] = $name;
	$submenu['edit.php'][5][0] = $name.'一覧';
	$submenu['edit.php'][10][0] = '新しい'.$name;
}
function Change_objectlabel() {
	global $wp_post_types;
	$name = 'チャット投稿';
	$labels = &$wp_post_types['post']->labels;
	$labels->name = $name;
	$labels->singular_name = $name;
}
add_action( 'init', 'Change_objectlabel' );
add_action( 'admin_menu', 'Change_menulabel' );

//サイドバーメニューからカテゴリー、タグを削除（カスタム投稿とカスタムタクソノミー）
function remove_menu() {
    // remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
    remove_submenu_page('edit.php?post_type=news', 'edit-tags.php?taxonomy=news-category&amp;post_type=news');
    // remove_submenu_page('edit.php?post_type=member', 'edit-tags.php?taxonomy=member-category&amp;post_type=member');
    remove_submenu_page('edit.php?post_type=interview', 'edit-tags.php?taxonomy=interview-category&amp;post_type=interview');
    remove_submenu_page('edit.php?post_type=schedule', 'edit-tags.php?taxonomy=schedule-category&amp;post_type=schedule');
    remove_submenu_page('edit.php?post_type=groupmagazine', 'edit-tags.php?taxonomy=groupmagazine-category&amp;post_type=groupmagazine');
    remove_submenu_page('edit.php?post_type=familymagazine', 'edit-tags.php?taxonomy=familymagazine-category&amp;post_type=familymagazine');
}
add_action('admin_menu', 'remove_menu');

//post type setting
function add_custom($value) {
  register_post_type($value -> slug, array(
    'label' => $value -> name,
    'menu_position' => 5,
    'hierarchical' => true,
    'public' => true,
    'supports' => array(
      'title',
      'editor',
      'thumbnail'
    ),
    'has_archive' => $value -> has_archive,
    'rewrite' => array(
      'slug' => $value -> slug,
      'with_front' => false
    )
  ));
}
add_action( "init", "implement_custom_posts", 0 );



//プレビューを押したときのリンク先を変更
// add_filter( 'preview_post_link', function($link) {
// 	global $post_type;
//   $pdf_url = the_field('tsuneishi_pdf');
//   $hoge = $pdf_url.'?preview=true';
  
// 	if($post_type == 'groupmagazine'){
// 		$link=home_url($hoge);//preview=trueがないとpreview判定にならない
// 	};
// 	return $link;
// });