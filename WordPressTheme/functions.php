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
    add_theme_support('post-thumbnails'); //アイキャッチ 
    add_theme_support('automatic-feed-links'); // RSSフィード 
    add_theme_support('title-tag'); //タイトルタグ自動生成 
    add_theme_support(
        'html5',
        array( //HTML5のタグで出力 
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );
}
add_action('after_setup_theme', 'my_setup');


/* ---------- アーカイブの表示件数設定---------- */
function change_posts_per_page($query)
{
    // 管理画面ではなく、メインクエリであることを確認
    if (!is_admin() && $query->is_main_query()) {
        // 'campaign' カスタム投稿タイプのアーカイブページの場合
        if ($query->is_post_type_archive('campaign')) {
            $query->set('posts_per_page', 4); // 表示件数を4に設定
        }
        // 'voice' カスタム投稿タイプのアーカイブページの場合
        if ($query->is_post_type_archive('voice')) {
            $query->set('posts_per_page', 6); // 表示件数を6に設定
        }
    }
}
add_action('pre_get_posts', 'change_posts_per_page');

/* ---------- タクソノミーでの絞り込み ---------- */
// function filter_by_taxonomy($query)
// {
//     if (!is_admin() && $query->is_main_query()) {
//         // 'campaign' カスタム投稿タイプのアーカイブページでのフィルタリング
//         if ($query->is_post_type_archive('campaign') || $query->is_post_type_archive('voice')) {
//             // 'campaign_category' または 'voice_category' タクソノミーでフィルタリング
//             $taxonomy = $query->is_post_type_archive('campaign') ? 'campaign_category' : 'voice_category';
//             if (isset($_GET[$taxonomy]) && $_GET[$taxonomy] != '') {
//                 $query->set('tax_query', array(
//                     array(
//                         'taxonomy' => $taxonomy,
//                         'field'    => 'slug',
//                         'terms'    => $_GET[$taxonomy],
//                     ),
//                 ));
//             }
//         }
//     }
// }
// add_action('pre_get_posts', 'filter_by_taxonomy');



/* ---------- 「投稿」の表記変更 ---------- */
function Change_menulabel()
{
    global $menu;
    global $submenu;
    $name = 'ブログ';
    $menu[5][0] = $name;
    $submenu['edit.php'][5][0] = $name . '一覧';
    $submenu['edit.php'][10][0] = '新規' . $name . '投稿';
}
function Change_objectlabel()
{
    global $wp_post_types;
    $name = 'ブログ';
    $labels = &$wp_post_types['post']->labels;
    $labels->name = $name;
    $labels->singular_name = $name;
    $labels->add_new = _x('追加', $name);
    $labels->add_new_item = $name . 'の新規追加';
    $labels->edit_item = $name . 'の編集';
    $labels->new_item = '新規' . $name;
    $labels->view_item = $name . 'を表示';
    $labels->search_items = $name . 'を検索';
    $labels->not_found = $name . 'が見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
}
add_action('init', 'Change_objectlabel');
add_action('admin_menu', 'Change_menulabel');


/* ---------- 人気記事 ---------- */
// 閲覧数を増加させる関数
function set_post_views($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// 閲覧数を表示する関数
function get_post_views($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count . ' Views';
}

// 投稿が表示されるたびに閲覧数を増加させる
function track_post_views($post_id)
{
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    set_post_views($post_id);
}
add_action('wp_head', 'track_post_views');


/* ---------- 特定の固定ページのエディタ非表示 ---------- */
add_filter('use_block_editor_for_post', function ($use_block_editor, $post) {
    if ($post->post_type === 'page') {
        if (in_array($post->post_name, ['about-us', 'faq', 'information', 'price', 'contact', 'contact_thanks', 'top', 'blog', '404-2', 'sitemap'])) { //ページスラッグ名
            remove_post_type_support('page', 'editor');
            return false;
        }
    }
    return $use_block_editor;
}, 10, 2);


/* ---------- アーカイブページ ---------- */
function custom_archives() {
    global $wpdb;

    // 月名を日本語で配列に格納
    $months_japanese = array(
        1 => '1月', 2 => '2月', 3 => '3月', 4 => '4月', 
        5 => '5月', 6 => '6月', 7 => '7月', 8 => '8月', 
        9 => '9月', 10 => '10月', 11 => '11月', 12 => '12月'
    );

    // 年ごとと月ごとに投稿をグループ化して取得
    $years = $wpdb->get_results("SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, COUNT(ID) as post_count FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' GROUP BY year, month ORDER BY post_date DESC");

    $output = '<ul class="blog-aside__archive aside-archive">';

    $current_year = null;
    foreach($years as $year) {
        if ($current_year != $year->year) {
            if ($current_year != null) {
                $output .= '</div></li>';
            }
            $current_year = $year->year;
            $output .= '<li class="aside-archive__item">';
            $output .= '<p class="aside-archive__item-year js-archive archive-arrow">' . $year->year . '</p>';
            $output .= '<div class="aside-archive__item-mouths js-mouths">';
        }
        $month_name = $months_japanese[$year->month]; // 日本語の月名を使用
        $month_url = get_month_link($year->year, $year->month);
        $output .= '<a href="' . $month_url . '" class="aside-archive__item-mouth archive-arrow"><p>' . $month_name . '</p></a>';
    }
    if ($current_year != null) {
        $output .= '</div></li>';
    }
    $output .= '</ul>';

    return $output;
}

/* -------Contact Form 7で自動挿入されるPタグ、brタグを削除 -------*/
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
    return false;
}

/* ---------- お問い合わせページ キャンペーンタイトルの取得 ---------- */
function campaign_titles_select_menu() {
    $args = array(
        'post_type' => 'campaign', // カスタム投稿タイプに変更
        'posts_per_page' => -1 // すべてのキャンペーンを取得
    );
    $campaigns = new WP_Query($args);
    $output = '';

    if ($campaigns->have_posts()) {
        $output .= '<select name="campaign" class="form__select">';
        $output .= '<option value="">キャンペーン内容を選択</option>'; // 空のオプション
        while ($campaigns->have_posts()) {
            $campaigns->the_post();
            $output .= '<option value="' . get_the_title() . '">' . get_the_title() . '</option>';
        }
        $output .= '</select>';
        wp_reset_postdata();
    }

    return $output;
}
add_shortcode('campaign_titles_select', 'campaign_titles_select_menu');

// Contact Form 7内でショートコードを処理するためのフィルター
add_filter('wpcf7_form_elements', 'do_shortcode');


/* ---------- サンクスページに移る ---------- */
function redirect_to_thank_you_page() {
    echo "<script>location.href='" . esc_url(home_url('/contact_thanks/')) . "';</script>";
}

add_action('wpcf7_mail_sent', 'redirect_to_thank_you_page');
