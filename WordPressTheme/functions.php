<?php
function enqueue_custom_assets()
{
	// Swiper CSS
	wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');

	// テーマのCSS
	wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.css');

	// Google Fonts
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Gotu&family=Lato&family=Noto+Sans+JP:wght@300;400;500;700&family=Noto+Serif+JP:wght@300;400;500;700&display=swap', array(), null);

	// jQuery
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.js', array(), null, true);

	// jQuery Inview
	wp_enqueue_script('jquery-inview', get_template_directory_uri() . '/assets/js/jquery.inview.min.js', array('jquery'), null, true);

	// Swiper JS
	wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), null, true);

	// カスタムスクリプト
	wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_assets', 10);

function add_fonts_preconnect()
{
	// Google Fonts Preconnect
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}
add_action('wp_head', 'add_fonts_preconnect', 5);

function my_setup()
{
	add_theme_support('post-thumbnails'); /* アイキャッチ */
	add_theme_support('automatic-feed-links'); /* RSSフィード */
	add_theme_support('title-tag'); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action('after_setup_theme', 'my_setup');

//アーカイブの表示件数設定
function change_posts_per_page($query)
{
  // 管理画面ではなく、メインクエリであることを確認
  if (is_admin() || !$query->is_main_query())
    return;

  // 'campaign' カスタム投稿タイプのアーカイブページの場合
  if ($query->is_post_type_archive('campaign')) {
    $query->set('posts_per_page', 4); // 表示件数を4に設定
  }

  // 'voice' カスタム投稿タイプのアーカイブページの場合
  if ($query->is_post_type_archive('voice')) {
    $query->set('posts_per_page', 6); // 表示件数を6に設定
  }
}
add_action('pre_get_posts', 'change_posts_per_page');

