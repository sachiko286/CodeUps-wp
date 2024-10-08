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

/*=============================================================
    アーカイブの表示件数設定
================================================================*/
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

/*================================================================
    カスタム投稿の記事知覧で並び順を日付降順に変更
================================================================*/
function change_post_types_admin_order($wp_query)
{
    if (is_admin()) {
        $post_type_array = array('campaign', 'voice'); // カスタム投稿のスラッグ（post_type）
        $post_type = $wp_query->query['post_type'];
        $get_orderby = get_query_var('orderby');
        if ($post_type && $get_orderby) {
            if (in_array($post_type, $post_type_array) && $get_orderby === 'menu_order title') {
                $wp_query->set('orderby', 'date'); // data = 日付
                $wp_query->set('order', 'DESC'); // DESC = 降順
            }
        }
    }
}
add_filter('pre_get_posts', 'change_post_types_admin_order');

/*================================================================
    「投稿」の表記変更
================================================================*/
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

/*=============================================
    人気記事 
=============================================*/
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

/*================================================================
    カスタム投稿で投稿ページのタイトル入力や本文入力を非表示
================================================================*/
function remove_title_support_from_voice_and_campaign()
{
    // カスタム投稿タイプ「voice」のタイトルと本文エディタを非表示にする
    remove_post_type_support('voice', 'title');
    remove_post_type_support('voice', 'editor');
    
    // カスタム投稿タイプ「campaign」のタイトルと本文エディタを非表示にする
    remove_post_type_support('campaign', 'title');
    remove_post_type_support('campaign', 'editor');
}
add_action('init', 'remove_title_support_from_voice_and_campaign');



/*================================================================
    特定の固定ページのエディタ非表示
================================================================*/
add_filter('use_block_editor_for_post', function ($use_block_editor, $post) {
    if ($post->post_type === 'page') {
        if (in_array($post->post_name, ['about-us', 'faq', 'information', 'price', 'contact', 'contact_thanks', 'top', 'blog', '404-2', 'sitemap'])) { //ページスラッグ名
            remove_post_type_support('page', 'editor');
            return false;
        }
    }
    return $use_block_editor;
}, 10, 2);

/*================================================================
    アーカイブページ 
================================================================*/
function custom_archives()
{
    global $wpdb;

    // 月名を日本語で配列に格納
    $months_japanese = array(
        1 => '1月',
        2 => '2月',
        3 => '3月',
        4 => '4月',
        5 => '5月',
        6 => '6月',
        7 => '7月',
        8 => '8月',
        9 => '9月',
        10 => '10月',
        11 => '11月',
        12 => '12月'
    );

    // 年ごとと月ごとに投稿をグループ化して取得
    $years = $wpdb->get_results("SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, COUNT(ID) as post_count FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' GROUP BY year, month ORDER BY post_date DESC");

    $output = '<ul class="blog-aside__archive aside-archive">';

    $current_year = null;
    foreach ($years as $year) {
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

/*================================================================
    the_archive_title 余計な文字を削除
================================================================*/
add_filter('get_the_archive_title', function ($title) {
    if (is_year()) {
        // 年別アーカイブの場合、年を取得
        $title = get_the_time('Y年');
    } elseif (is_month()) {
        // 月別アーカイブの場合、年と月を取得
        $title = get_the_time('Y年n月');
    }
    return $title;
});

/*================================================================
    Contact Form 7で自動挿入されるPタグ、brタグを削除
================================================================*/
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
    return false;
}

/*================================================================
    お問い合わせページ キャンペーンタイトルの取得
================================================================*/
function campaign_titles_select_menu()
{
    $args = array(
        'post_type' => 'campaign', // カスタム投稿タイプ
        'posts_per_page' => -1 // すべてのキャンペーンを取得
    );
    $campaigns = new WP_Query($args);
    $output = '';

    // セレクトボックスの開始タグと空のオプションを出力
    $output .= '<select name="campaign" class="form__select">';
    $output .= '<option value="">キャンペーン内容を選択</option>'; // 空のオプション

    // 投稿がある場合のみオプションを追加
    if ($campaigns->have_posts()) {
        while ($campaigns->have_posts()) {
            $campaigns->the_post();
            $output .= '<option value="' . get_the_title() . '">' . get_the_title() . '</option>';
        }
        wp_reset_postdata();
    }

    // セレクトボックスの終了タグ
    $output .= '</select>';

    return $output;
}
add_shortcode('campaign_titles_select', 'campaign_titles_select_menu');


// Contact Form 7内でショートコードを処理するためのフィルター
add_filter('wpcf7_form_elements', 'do_shortcode');

/*================================================================
    サンクスページに移る
================================================================*/
function redirect_to_thank_you_page()
{
    echo "<script>location.href='" . esc_url(home_url('/contact_thanks/')) . "';</script>";
}

add_action('wpcf7_mail_sent', 'redirect_to_thank_you_page');

/*================================================================
    【管理画面】サイドメニュー並び順を変更
================================================================*/
function my_custom_menu_order($menu_order)
{
    if (!$menu_order) return true;
    return array(
        "index.php", // ダッシュボード
        "edit.php", // ブログ
        "edit.php?post_type=campaign", // キャンペーン
        "edit.php?post_type=voice", // お客様の声
        "edit.php?post_type=page", // 固定ページ
        "separator1", // 区切り線1
        "upload.php", // メディア
        "edit-comments.php", // コメント
        "separator2", // 区切り線2
        "options-general.php", // 設定
        "themes.php", // 外観
        "users.php", // ユーザー
        "tools.php", // ツール
        "plugins.php", // プラグイン
        "separator-last" // 区切り線（最後）
    );
}
add_filter('custom_menu_order', 'my_custom_menu_order');
add_filter('menu_order', 'my_custom_menu_order');

/*================================================================
    「外観＞メニュー」を表示させる
================================================================*/
add_action('after_setup_theme', 'register_menu');
function register_menu()
{
    register_nav_menu('primary', __('Primary Menu', 'theme-slug'));
}

/*================================================================
    ダッシュボードカスタマイズ
================================================================*/
function add_dashboard_widgets()
{
    wp_add_dashboard_widget(
        'blog_dashboard_widget', // ウィジェットのスラッグ名
        'ブログ', // ウィジェットに表示するタイトル
        'blog_dashboard_widget_function' // 実行する関数
    );

    wp_add_dashboard_widget(
        'campaign_dashboard_widget', // ウィジェットのスラッグ名
        'キャンペーン', // ウィジェットに表示するタイトル
        'campaign_dashboard_widget_function' // 実行する関数
    );

    wp_add_dashboard_widget(
        'voice_dashboard_widget', // ウィジェットのスラッグ名
        'お客様の声', // ウィジェットに表示するタイトル
        'voice_dashboard_widget_function' // 実行する関数
    );

    wp_add_dashboard_widget(
        'new_dashboard_widget', // 新しいウィジェットのスラッグ名
        'その他編集', // ウィジェットに表示するタイトル
        'new_dashboard_widget_function' // 実行する関数
    );
}
add_action('wp_dashboard_setup', 'add_dashboard_widgets');

function blog_dashboard_widget_function()
{
?>
    <ul class="quick-action">
        <?php if (current_user_can('administrator')) : ?>
            <li>
                <a href="<?php echo admin_url() . 'edit.php'; ?>" class="quick-action-button">
                    <span class="dashicons-before dashicons-admin-customizer dashicons-admin-customizer--icon"></span>
                    ブログ一覧
                </a>
            </li>
            <li>
                <a href="<?php echo admin_url() . 'post-new.php'; ?>" class="quick-action-button">
                    <span class="dashicons-before dashicons-admin-customizer"></span>
                    ブログ新規作成
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php
}

function campaign_dashboard_widget_function()
{
?>
    <ul class="quick-action">
        <?php if (current_user_can('administrator')) : ?>
            <li>
                <a href="<?php echo admin_url() . 'edit.php?post_type=campaign'; ?>" class="quick-action-button">
                    <span class="dashicons-before dashicons-admin-customizer dashicons-admin-customizer--icon"></span>
                    キャンペーン一覧
                </a>
            </li>
            <li>
                <a href="<?php echo admin_url() . 'post-new.php?post_type=campaign'; ?>" class="quick-action-button">
                    <span class="dashicons-before dashicons-admin-customizer"></span>
                    キャンペーン新規作成
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php
}

function voice_dashboard_widget_function()
{
?>
    <ul class="quick-action">
        <?php if (current_user_can('administrator')) : ?>
            <li>
                <a href="<?php echo admin_url() . 'edit.php?post_type=voice'; ?>" class="quick-action-button">
                    <span class="dashicons-before dashicons-admin-customizer dashicons-admin-customizer--icon"></span>
                    お客様の声一覧
                </a>
            </li>
            <li>
                <a href="<?php echo admin_url() . 'post-new.php?post_type=voice'; ?>" class="quick-action-button">
                    <span class="dashicons-before dashicons-admin-customizer"></span>
                    お客様の声新規作成
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php
}

function new_dashboard_widget_function()
{
?>
    <ul class="quick-action">
        <?php if (current_user_can('administrator')) : ?>

            <li>
                <a href="<?php echo admin_url() . 'post.php?post=26&action=edit'; ?>" class="quick-action-button">
                    <span class="dashicons-before dashicons-admin-customizer"></span>
                    料金一覧
                </a>
            </li>
            <li>
                <a href="<?php echo admin_url() . 'post.php?post=24&action=edit'; ?>" class="quick-action-button">
                    <span class="dashicons-before dashicons-admin-customizer"></span>
                    よくある質問
                </a>
            </li>
            <li>
                <a href="<?php echo admin_url() . 'post.php?post=30&action=edit'; ?>" class="quick-action-button">
                    <span class="dashicons-before dashicons-admin-customizer"></span>
                    私たちについて
                </a>
            </li>
            <li>
                <a href="<?php echo admin_url() . 'post.php?post=10&action=edit'; ?>" class="quick-action-button">
                    <span class="dashicons-before dashicons-admin-customizer"></span>
                    トップページFV画像
                </a>
            </li>
            <li>
                <a href="<?php echo admin_url() . 'post.php?post=16&action=edit'; ?>" class="quick-action-button">
                    <span class="dashicons-before dashicons-admin-customizer"></span>
                    利用規約
                </a>
            </li>
            <li>
                <a href="<?php echo admin_url() . 'post.php?post=14&action=edit'; ?>" class="quick-action-button">
                    <span class="dashicons-before dashicons-admin-customizer"></span>
                    プライバシーポリシー
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php
}

/*================================================================
    ダッシュボードカスタマイズCSS
================================================================*/
function enqueue_dashboard_styles()
{
    wp_enqueue_style('dashboard_styles', get_template_directory_uri() . '/assets/css/dashboard.css');
}
add_action('admin_print_styles-index.php', 'enqueue_dashboard_styles');


// サムネイルカラム追加（カスタム投稿にも対応）
function customize_manage_posts_columns($columns)
{
    $columns['thumbnail'] = 'アイキャッチ画像';
    return $columns;
}
add_filter('manage_posts_columns', 'customize_manage_posts_columns');
add_filter('manage_campaign_posts_columns', 'customize_manage_posts_columns'); // カスタム投稿用
add_filter('manage_voice_posts_columns', 'customize_manage_posts_columns'); // カスタム投稿用


// サムネイル画像表示（カスタム投稿にも対応）
function customize_manage_posts_custom_column($column_name, $post_id)
{
    if ('thumbnail' == $column_name) {
        $thum = get_the_post_thumbnail($post_id, 'small', array('style' => 'width:100px;height:75px;object-fit: cover;'));
    }
    if (isset($thum) && $thum) {
        echo $thum;
    } else {
        echo __('None');
    }
}
add_action('manage_posts_custom_column', 'customize_manage_posts_custom_column', 10, 2);
add_action('manage_campaign_posts_custom_column', 'customize_manage_posts_custom_column', 10, 2); // カスタム投稿用
add_action('manage_voice_posts_custom_column', 'customize_manage_posts_custom_column', 10, 2); // カスタム投稿用

/*================================================================
    カスタムフィールドのテキストを投稿タイトルとして反映
================================================================*/
// 自動タイトル設定
function auto_title($post_id)
{
    // 投稿タイプ判定
    $post_type = get_post_type($post_id);

    // 'voice' の場合の処理
    if ($post_type == 'voice') {
        // 必要な情報の取得
        $voice_group = get_field('voice_group', $post_id);
        if ($voice_group) {
            $voice_meta_group = $voice_group['voice_meta_group']; // 'voice_meta_group' フィールドの値を取得
            if ($voice_meta_group) {
                $sub_title = $voice_meta_group['voice_title']; // 'voice_title' フィールドの値を取得

                // タイトルの生成
                $post_title = $sub_title;
                if (!empty($post_title)) { // タイトルが空でない場合
                    $post_name = sanitize_title($post_title); // スラッグの生成

                    // 投稿情報の設定
                    $post = array(
                        'ID' => $post_id,
                        'post_name' => $post_name,
                        'post_title' => $post_title
                    );

                    // フックを一時的に解除して無限ループを防止
                    remove_action('save_post', 'auto_title');

                    // 投稿情報の更新
                    wp_update_post($post);

                    // フックを再追加
                    add_action('save_post', 'auto_title');
                }
            }
        }
    }

    // 'campaign' の場合の処理
    elseif ($post_type == 'campaign') {
        // campaign_title フィールドから値を取得
        $campaign_title = get_field('campaign_title', $post_id);

        if (!empty($campaign_title)) { // タイトルが空でない場合
            $post_name = sanitize_title($campaign_title); // スラッグの生成

            // 投稿情報の設定
            $post = array(
                'ID' => $post_id,
                'post_name' => $post_name,
                'post_title' => $campaign_title
            );

            // フックを一時的に解除して無限ループを防止
            remove_action('save_post', 'auto_title');

            // 投稿情報の更新
            wp_update_post($post);

            // フックを再追加
            add_action('save_post', 'auto_title');
        }
    }
}

// 投稿が保存される際に自動でタイトルを設定
add_action('save_post', 'auto_title');

/*================================================================
    カスタムフィールドの画像をアイキャッチとして反映
================================================================*/
function acf_set_featured_image($post_id)
{
    // 投稿タイプが 'voice' または 'campaign' の場合
    $post_type = get_post_type($post_id);
    if ($post_type !== 'voice' && $post_type !== 'campaign') {
        return;
    }

    if ($post_type === 'voice') {
        // voice の場合、グループフィールドから画像を取得
        $voice_group = get_field('voice_group', $post_id);
        if ($voice_group) {
            $image_id = $voice_group['voice_img']; // voice の画像フィールド
        }
    } elseif ($post_type === 'campaign') {
        // campaign の場合、画像フィールドを直接取得
        $image_id = get_field('campaign_img', $post_id); // campaign の画像フィールド
    }

    // 画像が存在する場合はアイキャッチ画像を設定、存在しない場合はアイキャッチ画像を削除
    if (isset($image_id) && $image_id) {
        set_post_thumbnail($post_id, $image_id);
    } else {
        delete_post_thumbnail($post_id);
    }
}

// 投稿が保存される際にアイキャッチ画像を設定
add_action('save_post', 'acf_set_featured_image');

/*================================================================
    VOICE投稿ページの幅の変更を設定
================================================================*/
function custom_admin_styles()
{
    // 現在の画面が voice または campaign の新規投稿画面であるかを確認
    $screen = get_current_screen();
    if (($screen->post_type === 'voice' || $screen->post_type === 'campaign') && $screen->base === 'post') {
        echo '<style>
            /* voice投稿ページの追加スタイル */
            #post-body-content {
            margin-bottom: 0;
            }
            #wpbody {
                max-width: 1200px; /* 幅を適宜変更 */
                margin: 0 auto; /* 中央に配置する */
            }

            #poststuff .voi_img img {
                aspect-ratio: 180 / 140;
                object-fit: cover;

            }
            /* キャンペーン投稿ページの追加スタイル */
            .post-type-campaign #wpbody {
                /* 追加のスタイルをここに記述 */
            }

                        .post-type-campaign .acf-image-uploader {
                display: flex;
                justify-content: center;
            }
                
            #poststuff .cam_img img {
                aspect-ratio: 333 / 233;
                object-fit: cover;
                width: 100%;
            }

        </style>';
    }
}
add_action('admin_head', 'custom_admin_styles');
