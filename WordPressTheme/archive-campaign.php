<?php get_header(); ?>

<?php
$home = esc_url(home_url('/'));
$blog = esc_url(home_url('/blog/'));
$aboutus = esc_url(home_url('/about-us/'));
$campaign = esc_url(home_url('/campaign/'));
$company = esc_url(home_url('/company/'));
$voice = esc_url(home_url('/voice/'));
$faq = esc_url(home_url('/faq/'));
$price = esc_url(home_url('/price/'));
$privacypolicy = esc_url(home_url('/privacypolicy/'));
$sitemap = esc_url(home_url('/sitemap/'));
$terms = esc_url(home_url('/terms-of-servic/'));
$information = esc_url(home_url('/information/'));
$contact = esc_url(home_url('/contact/'));
?>


<main>

  <section class="sub-fv sub-fv--campaign">
    <h2 class="sub-fv__title">Campaign</h2>
  </section>


  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <section class="page-campaign top-page-campaign">
    <div class="page-campaign__inner inner">
      <div class="page-campaign__filter filter-content">
        <ul class="filter-content__list">
          <li class="filter-content__list-title <?php echo !isset($_GET['category']) || $_GET['category'] == 'all' ? 'is-active' : ''; ?>">
            <a href="?category=all&paged=1">ALL</a>
          </li>
          <li class="filter-content__list-title <?php echo isset($_GET['category']) && $_GET['category'] == 'license' ? 'is-active' : ''; ?>">
            <a href="?category=license&paged=1">ライセンス講習</a>
          </li>
          <li class="filter-content__list-title <?php echo isset($_GET['category']) && $_GET['category'] == 'fundiving' ? 'is-active' : ''; ?>">
            <a href="?category=fundiving&paged=1">ファンダイビング</a>
          </li>
          <li class="filter-content__list-title <?php echo isset($_GET['category']) && $_GET['category'] == 'experience' ? 'is-active' : ''; ?>">
            <a href="?category=experience&paged=1">体験ダイビング</a>
          </li>
        </ul>
      </div>

      <div class="page-campaign__wrapper">
        <ul class="page-campaign__items">
          <?php
          // カテゴリーに基づいてクエリを作成
          $category = isset($_GET['category']) ? $_GET['category'] : 'all';
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // 現在のページを取得

          $args = array(
            'post_type' => 'campaign', // カスタム投稿タイプを指定
            'posts_per_page' => 4,     // 表示件数を指定
            'paged' => $paged,         // ページ番号を指定
          );

          if ($category != 'all') {
            $args['tax_query'] = array(
              array(
                'taxonomy' => 'campaign_category', // タクソノミー名を指定
                'field' => 'slug',
                'terms' => $category,
              ),
            );
          }

          $query = new WP_Query($args);

          // 有効なページ番号でない場合は最初のページにリダイレクト
          if ($paged > $query->max_num_pages && $query->max_num_pages > 0) {
            wp_redirect(get_pagenum_link(1));
            exit;
          }

          if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
              <li class="page-campaign__item campaign-card">
                <div class="campaign-card__item">
                  <div class="campaign-card__img">
                    <?php if (get_the_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                    <?php else : ?>
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage.jpg" alt="noimage">
                    <?php endif; ?>
                  </div>
                  <div class="campaign-card__body campaign-card__body--sub">
                    <div class="campaign-card__category">
                      <p><?php echo get_the_terms(get_the_ID(), 'campaign_category')[0]->name; ?> </p>
                    </div>
                    <h3 class="campaign-card__title campaign-card__title--sub"><?php the_title(); ?></h3>
                    <p class="campaign-card__text campaign-card__text--sub">全部コミコミ(お一人様)</p>
                    <div class="campaign-card__price campaign-card__price--sub">
                      <?php $price_1 = get_field('price_1'); ?>
                      <?php if ($price_1) : ?>
                        <p class="campaign-card__price-original"><span>¥<?php echo number_format($price_1); ?></span></p>
                      <?php endif; ?>
                      <?php $price_2 = get_field('price_2'); ?>
                      <?php if ($price_2) : ?>
                        <p class="campaign-card__price-discount campaign-card__price-discount--sub">¥<?php echo number_format($price_2); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="campaign__wrapper u-desktop">
                    <div class="campaign__text"><?php the_content(); ?></div>
                    <p class="campaign__date">2023/6/1-9/30</p>
                    <p class="campaign__info-text">ご予約・お問い合わせはコチラ</p>
                    <div class="campaign__info-button">
                      <a href="<?php echo $contact; ?>" class="button slide">Contact us<span class="button__arrow"></span></a>
                    </div>
                  </div>
                </div>
              </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php else : ?>
            <p>該当するキャンペーンがありません。</p>
          <?php endif; ?>
        </ul>
      </div>

      <!-- ページナビゲーション -->
      <div class="pagenavi">
        <div class="pagenavi__inner">
          <?php wp_pagenavi(array('query' => $query)); ?>
        </div>
      </div>

    </div>
  </section>
</main>



<?php get_footer(); ?>