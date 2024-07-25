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
    <!-- <div class="sub-fv__inner"> -->
    <h2 class="sub-fv__title">Campaign</h2>
    <!-- <div class="sub-fv__image">
      <picture >
        <source srcset="./assets/images/common/sub-fv-pc.jpg" alt="省略" media="(min-width: 768px)">
        <img src="./assets/images/common/sub-fv-sp.jpg" alt="省略">
      </picture>
      </div> -->
    <!-- </div> -->
  </section>


  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <section class="page-campaign top-page-campaign">
    <div class="page-campaign__inner inner">
      <div class="page-campaign__filter filter-content">
        <ul class="filter-content__list">
          <li class="filter-content__list-title is-active"><a href="#">ALL</a></li>
          <li class="filter-content__list-title "><a href="#">ライセンス講習</a></li>
          <li class="filter-content__list-title "><a href="#">ファンダイビング</a></li>
          <li class="filter-content__list-title "><a href="#">体験ダイビング</a></li>
        </ul>
      </div>
      <div class="page-campaign__wrapper">
        <ul class="page-campaign__items">
          <?php if (have_posts()) :
            while (have_posts()) :
              the_post(); ?>
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
                      <p><?php echo get_the_terms(get_the_ID(), 'campaign')[0]->name; ?> </p>
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
                    <p class="campaign__text"><?php the_content(); ?>
                    </p>

                    <p class="campaign__date">2023/6/1-9/30</p>
                    <p class="campaign__info-text">ご予約・お問い合わせはコチラ</p>
                    <div class="campaign__info-button">
                      <a href="<?php echo $contact; ?>" class="button slide">Contact us<span class="button__arrow"></span></a>
                    </div>
                  </div>
                </div>
              </li>
          <?php endwhile;
          endif; ?>
        </ul>

        <div class="pagenavi">
          <div class="pagenavi__inner">
            <!-- WP-PageNaviで出力される部分 ここから -->
            <div class="wp-pagenavi" role="navigation">
              <a class="previouspostslink" rel="prev" href="#"></a>
              <div class="pagenavi__numbers">
                <span class="current pagenavi__number">1</span>
                <a class="pagenavi__number" href="#">2</a>
                <a class="pagenavi__number" href="#">3</a>
                <a class="pagenavi__number" href="#">4</a>
                <a class="pagenavi__number u-desktop" href="#">5</a>
                <a class="pagenavi__number u-desktop" href="#">6</a>
              </div>
              <a class="nextpostslink" rel="next" href="#"></a>
            </div>
            <!-- WP-PageNaviで出力される部分 ここまで -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>