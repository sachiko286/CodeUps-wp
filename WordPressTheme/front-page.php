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
                  <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/pc-fv1.jpg" media="(min-width: 768px)">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sp-fv1.jpg" alt="省略">
                </picture>
              </div>
            </div>
            <div class="fv__slide swiper-slide">
              <div class="fv__slide-image swiper-img">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/pc-fv2.jpg" media="(min-width: 768px)">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sp-fv2.jpg" alt="省略">
                </picture>
              </div>
            </div>
            <div class="fv__slide swiper-slide">
              <div class="fv__slide-image swiper-img">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/pc-fv3.jpg" media="(min-width: 768px)">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sp-fv3.jpg" alt="省略">
                </picture>
              </div>
            </div>
            <div class="fv__slide swiper-slide">
              <div class="fv__slide-image swiper-img">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/pc-fv4.jpg" media="(min-width: 768px)">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sp-fv4.jpg" alt="省略">
                </picture>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



    <section class="campaign top-campaign">
      <div class="campaign__inner inner">
        <div class="campaign__header section-header">
          <p class="section-header__engtitle">Campaign</p>
          <h2 class="section-header__jatitle">キャンペーン</h2>
        </div>

        <div class="campaign__swiper swiper-container">
          <div class="swiper-button-wrapper u-desktop">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>

          <div class="swiper js-campaign-swiper">
            <div class="campaign__cards campaign-cards swiper-wrapper">
              <div class="campaign-cards__list campaign-card swiper-slide">
                <!-- スライドの中身 -->
                <div class="campaign-card__item">
                  <div class="campaign-card__img">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign1.jpg" alt="省略">
                  </div>
                  <div class="campaign-card__body">
                    <div class="campaign-card__category">
                      <p>ライセンス講習</p>
                    </div>
                    <h3 class="campaign-card__title">ライセンス取得</h3>
                    <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                    <div class="campaign-card__price">
                      <p class="campaign-card__price-original"><span>¥56,000</span></p>
                      <p class="campaign-card__price-discount">¥46,000</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="campaign-cards__list campaign-card swiper-slide">
                <!-- スライドの中身 -->
                <div class="campaign-card__item">
                  <div class="campaign-card__img">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign2.jpg" alt="省略">
                  </div>
                  <div class="campaign-card__body">
                    <div class="campaign-card__category">
                      <p>体験ダイビング</p>
                    </div>
                    <h3 class="campaign-card__title">貸切体験ダイビング</h3>
                    <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                    <div class="campaign-card__price">
                      <p class="campaign-card__price-original"><span>¥24,000</span></p>
                      <p class="campaign-card__price-discount">¥18,000</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="campaign-cards__list campaign-card swiper-slide">
                <!-- スライドの中身 -->
                <div class="campaign-card__item">
                  <div class="campaign-card__img">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign3.jpg" alt="省略">
                  </div>
                  <div class="campaign-card__body">
                    <div class="campaign-card__category">
                      <p>体験ダイビング</p>
                    </div>
                    <h3 class="campaign-card__title">ナイトダイビング</h3>
                    <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                    <div class="campaign-card__price">
                      <p class="campaign-card__price-original"><span>¥10,000</span></p>
                      <p class="campaign-card__price-discount">¥8,000</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="campaign-cards__list campaign-card swiper-slide">
                <!-- スライドの中身 -->
                <a href="#">
                  <div class="campaign-card__item">
                    <div class="campaign-card__img">
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign4.jpg" alt="省略">
                    </div>
                    <div class="campaign-card__body">
                      <div class="campaign-card__category">
                        <p>ファンダイビング</p>
                      </div>
                      <h3 class="campaign-card__title">貸切ファンダイビング</h3>
                      <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                      <div class="campaign-card__price">
                        <p class="campaign-card__price-original"><span>¥20,000</span></p>
                        <p class="campaign-card__price-discount">¥16,000</p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

        </div>
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
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about1.jpg" alt="シーサー写真">
            </div>
            <div class="about-us__image2">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about2.jpg" alt="シーサー写真">
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
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info.jpg" alt="サカナの写真">
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

    <section class="blog top-blog">
      <div class="blog__bg"></div>
      <div class="blog__inner inner">
        <div class="blog__header section-header section-header--color">
          <p class="section-header__engtitle">Blog</p>
          <h2 class="section-header__jatitle">ブログ</h2>
        </div>
        <ul class="blog__list blog-list">
          <li class="blog-list__item">
            <a href="#" class="blog-card">
              <div class="blog-card__inner">
                <div class="blog-card__img">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog1.jpg" alt="省略">
                </div>
                <div class="blog-card__content">
                  <time class="blog-card__date" datetime="2023-11-17">2023.11/17</time>
                  <p class="blog-card__title">ライセンス取得</p>
                  <p class="blog-card__text">
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキスト</p>
                </div>
              </div>
            </a>
          </li>
          <li class="blog-list__item">
            <a href="#" class="blog-card">
              <div class="blog-card__inner">
                <div class="blog-card__img">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog2.jpg" alt="省略">
                </div>
                <div class="blog-card__content">
                  <time class="blog-card__date" datetime="2023-11-17">2023.11/17</time>
                  <p class="blog-card__title">ウミガメと泳ぐ</p>
                  <p class="blog-card__text">
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキスト</p>
                </div>

              </div>
            </a>
          </li>
          <li class="blog-list__item">
            <a href="#" class="blog-card">
              <div class="blog-card__inner">
                <div class="blog-card__img">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog3.jpg" alt="省略">
                </div>
                <div class="blog-card__content">
                  <time class="blog-card__date" datetime="2023-11-17">2023.11/17</time>
                  <p class="blog-card__title">カクレクマノミ</p>
                  <p class="blog-card__text">
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキスト</p>
                </div>
              </div>
            </a>
          </li>
        </ul>

        <div class="blog__button">
          <a href="<?php echo $blog; ?>" class="button slide">View more<span class="button__arrow"></span></a>
        </div>
      </div>
    </section>

    <section class="voice top-voice">
      <div class="voice__inner inner">
        <div class="voice__header section-header">
          <p class="section-header__engtitle">Voice</p>
          <h2 class="section-header__jatitle">お客様の声</h2>
        </div>
        <ul class="voice__list voice-list">
          <li class="voice-list__item voice-card">
            <div class="voice-card__inner">
              <div class="voice-card__header">
                <div class="voice-card__lead">
                  <div class="voice-card__meta">
                    <p class="voice-card__age">20代(女性)</p>
                    <p class="voice-card__category">ライセンス講習</p>
                  </div>
                  <h3 class="voice-card__subtitle">ここにタイトルが入ります。ここにタイトル</h3>
                </div>
                <div class="voice-card__img colorbox">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice1.jpg" alt="女性の写真">
                </div>
              </div>
              <p class="voice-card__text">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
                ここにテキストが入ります。ここにテキストが入ります。
              </p>
            </div>
          </li>
          <li class="voice-list__item voice-card">
            <div class="voice-card__inner">
              <div class="voice-card__header">
                <div class="voice-card__lead">
                  <div class="voice-card__meta">
                    <p class="voice-card__age">30代(男性)</p>
                    <p class="voice-card__category">ファンダイビング</p>
                  </div>
                  <h3 class="voice-card__subtitle">ここにタイトルが入ります。ここにタイトル</h3>
                </div>
                <div class="voice-card__img colorbox">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice2.jpg" alt="男性の写真">
                </div>
              </div>
              <p class="voice-card__text">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
                ここにテキストが入ります。ここにテキストが入ります。
              </p>
            </div>
          </li>

        </ul>
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
        <div class="price__wrapper">
          <div class="price__image  colorbox">
            <picture>
              <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-pc.jpg"  media="(min-width: 768px)">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-sp.jpg" alt="かめの写真">
            </picture>
          </div>
          <div class="price__content">
            <div class="price__item">
              <h3 class="price__subtitle">ライセンス講習</h3>
              <dl class="price__menu">
                <dt class="price__course">オープンウォーターダイバーコース</dt>
                <dd class="price__fee">¥50,000</dd>
              </dl>
              <dl class="price__menu">
                <dt class="price__course">アドバンスドオープンウォーターコース</dt>
                <dd class="price__fee">¥60,000</dd>
              </dl>
              <dl class="price__menu">
                <dt class="price__course">レスキュー＋EFRコース</dt>
                <dd class="price__fee">¥70,000</dd>
              </dl>
            </div>
            <div class="price__item">
              <h3 class="price__subtitle">体験ダイビング</h3>
              <dl class="price__menu">
                <dt class="price__course">ビーチ体験ダイビング(半日)</dt>
                <dd class="price__fee">¥7,000</dd>
              </dl>
              <dl class="price__menu">
                <dt class="price__course">ビーチ体験ダイビング(1日)</dt>
                <dd class="price__fee">¥14,000</dd>
              </dl>
              <dl class="price__menu">
                <dt class="price__course">ボート体験ダイビング(半日)</dt>
                <dd class="price__fee">¥10,000</dd>
              </dl>
              <dl class="price__menu">
                <dt class="price__course">ボート体験ダイビング(1日)</dt>
                <dd class="price__fee">¥18,000</dd>
              </dl>
            </div>
            <div class="price__item">
              <h3 class="price__subtitle">ファンダイビング</h3>
              <dl class="price__menu">
                <dt class="price__course">ビーチダイビング(2ダイブ)</dt>
                <dd class="price__fee">¥14,000</dd>
              </dl>
              <dl class="price__menu">
                <dt class="price__course">ボートダイビング(2ダイブ)</dt>
                <dd class="price__fee">¥18,000</dd>
              </dl>
              <dl class="price__menu">
                <dt class="price__course">スペシャルダイビング(2ダイブ)</dt>
                <dd class="price__fee">¥24,000</dd>
              </dl>
              <dl class="price__menu">
                <dt class="price__course">ナイトダイビング(1ダイブ)</dt>
                <dd class="price__fee">¥10,000</dd>
              </dl>
            </div>
            <div class="price__item">
              <h3 class="price__subtitle">スペシャルダイビング</h3>
              <dl class="price__menu">
                <dt class="price__course">貸切ダイビング(2ダイブ)</dt>
                <dd class="price__fee">¥24,000</dd>
              </dl>
              <dl class="price__menu">
                <dt class="price__course">1日ダイビング(3ダイブ)</dt>
                <dd class="price__fee">¥32,000</dd>
              </dl>
            </div>
          </div>
        </div>
        <div class="price__button">
          <a href="<?php echo $price; ?>" class="button slide">View more<span class="button__arrow"></span></a>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>


