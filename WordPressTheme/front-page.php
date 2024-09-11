<?php get_header(); ?>

<?php include 'urls.php'; ?>

<main>
  <section class="fv top-fv">
    <div class="fv__inner">
      <div class="fv__title-wrap">
        <h2 class="fv__main-title">diving</h2>
        <p class="fv__sub-title">into the ocean</p>
      </div>
      <div class="fv__swiper swiper js-fv-swiper">
        <div class="fv__slide-wrapper swiper-wrapper">
          <div class="fv__slide swiper-slide">
            <div class="fv__slide-image swiper-img">
              <picture>
                <source srcset="<?php the_field('pc_fv1'); ?>" media="(min-width: 768px)">
                <img src="<?php the_field('sp_fv1'); ?>" alt="fv画像1">
              </picture>
            </div>
          </div>
          <div class="fv__slide swiper-slide">
            <div class="fv__slide-image swiper-img">
              <picture>
                <source srcset="<?php the_field('pc_fv2'); ?>" media="(min-width: 768px)">
                <img src="<?php the_field('sp_fv2'); ?>" alt="fv画像2">
              </picture>
            </div>
          </div>
          <div class="fv__slide swiper-slide">
            <div class="fv__slide-image swiper-img">
              <picture>
                <source srcset="<?php the_field('pc_fv3'); ?>" media="(min-width: 768px)">
                <img src="<?php the_field('sp_fv3'); ?>" alt="fv画像3">
              </picture>
            </div>
          </div>
          <div class="fv__slide swiper-slide">
            <div class="fv__slide-image swiper-img">
              <picture>
                <source srcset="<?php the_field('pc_fv4'); ?>" media="(min-width: 768px)">
                <img src="<?php the_field('sp_fv4'); ?>" alt="fv画像4">
              </picture>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <?php
  $campaign_args = array(
    'post_type' => 'campaign',
    'posts_per_page' => -1,
  );
  $campaign_query = new WP_Query($campaign_args);
  ?>

  <section class="campaign top-campaign">
    <div class="campaign__inner inner">
      <div class="campaign__header section-header">
        <p class="section-header__engtitle">Campaign</p>
        <h2 class="section-header__jatitle">キャンペーン</h2>
      </div>

      <?php if ($campaign_query->have_posts()) : ?>
        <div class="campaign__swiper swiper-container">
          <div class="swiper-button-wrapper u-desktop">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>

          <div class="swiper js-campaign-swiper">
            <div class="campaign__cards campaign-cards swiper-wrapper">
              <?php while ($campaign_query->have_posts()) : $campaign_query->the_post(); ?>
                <div class="campaign-cards__list campaign-card swiper-slide">
                  <!-- スライドの中身 -->
                  <div class="campaign-card__item">
                    <div class="campaign-card__img">
                      <?php if (get_the_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                      <?php else : ?>
                        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/noimage.jpg')); ?>" alt="noimage">
                      <?php endif; ?>
                    </div>
                    <div class="campaign-card__body">
                      <div class="campaign-card__category">
                        <p>
                          <?php
                          $terms = get_the_terms(get_the_ID(), 'campaign_category');
                          if ($terms && !is_wp_error($terms)) {
                            echo esc_html($terms[0]->name);
                          }
                          ?>
                        </p>
                      </div>
                      <h3 class="campaign-card__title"><?php the_title(); ?></h3>
                      <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                      <div class="campaign-card__price">
                        <?php $price_1 = get_field('price_1'); ?>
                        <?php if ($price_1) : ?>
                          <p class="campaign-card__price-original">
                            <span><?php echo esc_html($price_1); ?></span>
                          </p>
                        <?php endif; ?>
                        <?php $price_2 = get_field('price_2'); ?>
                        <?php if ($price_2) : ?>
                          <p class="campaign-card__price-discount">
                            <?php echo esc_html($price_2); ?>
                          </p>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div> <!-- .campaign-cards -->
          </div> <!-- .swiper -->
        </div>
      <?php else : ?>
        <p class="non-message non-message--top">現在のキャンペーンはありません</p>
      <?php endif; ?>
      <!-- クエリのリセット -->
      <?php wp_reset_postdata(); ?>
      <div class="campaign__button">
        <a href="<?php echo $campaign; ?>" class="button slide">View more<span class="button__arrow"></span></a>
      </div>
    </div>
  </section>

  <section class="about-us top-about-us">
    <div class="about-us__inner inner">
      <div class="about-us__header section-header">
        <p class="section-header__engtitle">About us</p>
        <h2 class="section-header__jatitle">私たちについて</h2>
      </div>
      <div class="about-us__wrapper">
        <div class="about-us__images">
          <div class="about-us__image1">
            <img src="<?php echo get_theme_file_uri() . "/assets/images/common/about1.jpg"; ?>" alt="シーサー写真">
          </div>
          <div class="about-us__image2">
            <img src="<?php echo get_theme_file_uri() . "/assets/images/common/about2.jpg"; ?>" alt="シーサー写真">
          </div>
        </div>
        <div class="about-us__content">
          <h3 class="about-us__sub-title">Dive into<br>the Ocean</h3>
          <div class="about-us__body">
            <p class="about-us__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
            </p>
            <div class="about-us__button">
              <a href="<?php echo $aboutus; ?>" class="button slide">View more<span class="button__arrow"></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="information top-information">
    <div class="information__inner inner">
      <div class="information__header section-header">
        <p class="section-header__engtitle">Information</p>
        <h2 class="section-header__jatitle">ダイビング情報</h2>
      </div>
      <div class="information__wrapper">
        <div class="information__image colorbox">
          <img src="<?php echo get_theme_file_uri() . "/assets/images/common/info.jpg"; ?>" alt="サカナの写真">
        </div>
        <div class="information__content">
          <h3 class="information__subtitle">ライセンス講習</h3>
          <p class="information__text">当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br>
            正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
          </p>
          <div class="information__button">
            <a href="<?php echo $information; ?>" class="button slide">View more<span class="button__arrow"></span></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  $blog_args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
  );
  $blog_query = new WP_Query($blog_args);
  ?>
  <section class="blog top-blog">
    <div class="blog__bg"></div>
    <div class="blog__inner inner">
      <div class="blog__header section-header section-header--color">
        <p class="section-header__engtitle">Blog</p>
        <h2 class="section-header__jatitle">ブログ</h2>
      </div>

      <?php if ($blog_query->have_posts()) : ?>
        <ul class="blog__list blog-list">
          <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
            <li class="blog-list__item">
              <a href="<?php the_permalink(); ?>" class="blog-card">
                <div class="blog-card__inner">
                  <div class="blog-card__img">
                    <?php if (get_the_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                    <?php else : ?>
                      <img src="<?php echo get_theme_file_uri() . "/assets/images/common/noimage.jpg"; ?>" alt="noimage">
                    <?php endif; ?>
                  </div>
                  <div class="blog-card__content">
                    <time datetime="<?php the_time('c'); ?>" class="blog-card__date"><?php the_time('Y.m/d'); ?></time>
                    <p class="blog-card__title"><?php the_title(); ?></p>
                    <div class="blog-card__text blog-card__text--top">
                      <?php echo wp_trim_words(get_the_content(), 88, '…'); ?>
                    </div>
                  </div>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php else : ?>
        <p class="non-message non-message--top non-message--blog">ブログの投稿はありません</p>
      <?php endif; ?>
      <!-- クエリのリセット -->
      <?php wp_reset_postdata(); ?>

      <div class="blog__button">
        <a href="<?php echo $blog; ?>" class="button slide">View more<span class="button__arrow"></span></a>
      </div>
    </div>
  </section>

  <?php
  $voice_args = array(
    'post_type' => 'voice',
    'posts_per_page' => 2,
  );
  $voice_query = new WP_Query($voice_args);
  ?>
  <section class="voice top-voice">
    <div class="voice__inner inner">
      <div class="voice__header section-header">
        <p class="section-header__engtitle">Voice</p>
        <h2 class="section-header__jatitle">お客様の声</h2>
      </div>

      <?php if ($voice_query->have_posts()) : ?>
        <ul class="voice__list voice-list">
          <?php while ($voice_query->have_posts()) : $voice_query->the_post(); ?>
            <li class="voice-list__item voice-card">
              <div class="voice-card__inner">
                <div class="voice-card__header">
                  <div class="voice-card__lead">
                    <div class="voice-card__meta">
                      <?php $age = get_field('age'); ?>
                      <?php if ($age) : ?>
                        <p class="voice-card__age"><?php echo $age; ?></p>
                      <?php endif; ?>
                      <p class="voice-card__category"><?php echo get_the_terms(get_the_ID(), 'voice_category')[0]->name; ?></p>
                    </div>
                    <h3 class="voice-card__subtitle"><?php the_title(); ?></h3>
                  </div>
                  <div class="voice-card__img colorbox">
                    <?php if (get_the_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo $age; ?>のアイキャッチ画像">
                    <?php else : ?>
                      <img src="<?php echo get_theme_file_uri() . "/assets/images/common/noimage.jpg"; ?>" alt="noimage">
                    <?php endif; ?>
                  </div>
                </div>
                <div class="voice-card__text voice-card__text--top">
                  <?php echo get_the_content(); //文字数制限
                  ?>
                </div>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php else : ?>
        <p class="non-message non-message--top">投稿はありません</p>
      <?php endif; ?>
      <!-- クエリのリセット -->
      <?php wp_reset_postdata(); ?>
      <div class="voice__button">
        <a href="<?php echo $voice; ?>" class="button slide">View more<span class="button__arrow"></span></a>
      </div>
    </div>
  </section>

  <section class="price top-price">
    <div class="price__inner inner">
      <div class="price__header section-header">
        <p class="section-header__engtitle">Price</p>
        <h2 class="section-header__jatitle">料金一覧</h2>
      </div>
      <!-- ライセンス料金表 -->
      <?php $licenses = SCF::get('license-table', 26); ?>
      <!-- 空でない値だけをフィルタリング -->
      <?php $filtered_licenses = array_filter($licenses, function ($license) {
        return !empty($license['course1']) && !empty($license['price1']);
      }); ?>

      <!-- 体験ダイビング料金表 -->
      <?php $experiences = SCF::get('experience-table', 26); ?>
      <!-- 空でない値だけをフィルタリング -->
      <?php $filtered_experiences = array_filter($experiences, function ($experience) {
        return !empty($experience['course2']) && !empty($experience['price2']);
      }); ?>

      <!-- ファンダイビング料金表 -->
      <?php $funs = SCF::get('fundiving-table', 26); ?>
      <!-- 空でない値だけをフィルタリング -->
      <?php $filtered_funs = array_filter($funs, function ($fun) {
        return !empty($fun['course3']) && !empty($fun['price3']);
      }); ?>

      <!-- スペシャルダイビング料金表 -->
      <?php $specials = SCF::get('specialdiving-table', 26); ?>
      <!-- 空でない値だけをフィルタリング -->
      <?php $filtered_specials = array_filter($specials, function ($special) {
        return !empty($special['course4']) && !empty($special['price4']);
      }); ?>

      <!-- いずれかの料金表が空でない場合に表示 -->
      <?php if (!empty($filtered_licenses) || !empty($filtered_experiences) || !empty($filtered_funs) || !empty($filtered_specials)) : ?>
        <div class="price__wrapper">
          <div class="price__image  colorbox">
            <picture>
              <source srcset="<?php echo get_theme_file_uri() . "/assets/images/common/price-pc.jpg"; ?>" media="(min-width: 768px)">
              <img src="<?php echo get_theme_file_uri() . "/assets/images/common/price-sp.jpg"; ?>" alt="かめの写真">
            </picture>
          </div>
          <div class="price__content">

            <!-- ライセンス料金表の表示 -->
            <?php if (!empty($filtered_licenses)) : ?>
              <div class="price__item">
                <h3 class="price__subtitle">ライセンス講習</h3>
                <?php foreach ($filtered_licenses as $license) : ?>
                  <dl class="price__menu">
                    <dt class="price__course"><?php echo esc_html($license['course1']); ?></dt>
                    <dd class="price__fee"><?php echo esc_html($license['price1']); ?></dd>
                  </dl>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <!-- 体験ダイビング料金表の表示 -->
            <?php if (!empty($filtered_experiences)) : ?>
              <div class="price__item">
                <h3 class="price__subtitle">体験ダイビング</h3>
                <?php foreach ($filtered_experiences as $experience) : ?>
                  <dl class="price__menu">
                    <dt class="price__course"><?php echo esc_html($experience['course2']); ?></dt>
                    <dd class="price__fee"><?php echo esc_html($experience['price2']); ?></dd>
                  </dl>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <!-- ファンダイビング料金表の表示 -->
            <?php if (!empty($filtered_funs)) : ?>
              <div class="price__item">
                <h3 class="price__subtitle">ファンダイビング</h3>
                <?php foreach ($filtered_funs as $fun) : ?>
                  <dl class="price__menu">
                    <dt class="price__course"><?php echo esc_html($fun['course3']); ?></dt>
                    <dd class="price__fee"><?php echo esc_html($fun['price3']); ?></dd>
                  </dl>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <!-- スペシャルダイビング料金表の表示 -->
            <?php if (!empty($filtered_specials)) : ?>
              <div class="price__item">
                <h3 class="price__subtitle">スペシャルダイビング</h3>
                <?php foreach ($filtered_specials as $special) : ?>
                  <dl class="price__menu">
                    <dt class="price__course"><?php echo esc_html($special['course4']); ?></dt>
                    <dd class="price__fee"><?php echo esc_html($special['price4']); ?></dd>
                  </dl>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

          </div>
        </div>
      <?php else : ?>
        <!-- すべての料金表が空の場合 -->
        <p class="non-message non-message--top">準備中です</p>
      <?php endif; ?>
    </div>
    <div class="price__button">
      <a href="<?php echo $price; ?>" class="button slide">View more<span class="button__arrow"></span></a>
    </div>
  </section>
</main>

<?php get_footer(); ?>