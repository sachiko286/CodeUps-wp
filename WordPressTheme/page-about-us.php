<?php get_header(); ?>
<main>

  <section class="sub-fv sub-fv--about">
    <h2 class="sub-fv__title">About us</h2>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <section class="page-about-us--sp about-us u-mobile">
    <div class="about-us__inner inner">
      <div class="about-us__wrapper">
        <div class="about-us__images">
          <div class="about-us__image2">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about2.jpg" alt="シーサー写真">
          </div>
        </div>
        <div class="about-us__content">
          <h3 class="about-us__sub-title">Dive into<br>the Ocean</h3>
          <div class="about-us__body">
            <p class="about-us__text">
            <?php
              $about_content = get_field('about_content');
              if (!empty($about_content)) {
                echo nl2br(esc_html($about_content)); // テキストのエスケープ処理と改行の変換
              }
              ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="page-about-us--pc about-us u-desktop">
    <div class="about-us__inner inner">
      <div class="about-us__wrapper">
        <div class="about-us__images">
          <div class="about-us__image1 u-desktop">
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
              <?php
              $about_content = get_field('about_content');
              if (!empty($about_content)) {
                echo nl2br(esc_html($about_content)); // テキストのエスケープ処理と改行の変換
              }
              ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php $fields = SCF::get('gallery'); ?>

  <!-- 画像が存在する場合のみギャラリーセクションを表示 -->
  <?php if ($fields[0]['gallery-img1']) : //最初の画像があるかどうか 
  ?>

    <section class="gallery top-gallery">
      <div class="gallery__modal js-overlay"></div>
      <div class="gallery__inner inner">
        <div class="about-us__header section-header">
          <p class="section-header__engtitle">Gallery</p>
          <h2 class="section-header__jatitle">フォト</h2>
        </div>
        <ul class="gallery__list gallery-list">
          <!-- 繰り返し -->
          <?php foreach ($fields as $field) : ?>
            <?php if ($field['gallery-img1']) : ?> <!-- 各フィールドが 'gallery-img1' を持っているかをチェック -->
              <li class="gallery-list__item js-photo">
                <img src="<?php echo wp_get_attachment_url($field['gallery-img1']); ?>" alt="<?php the_title(); ?>">
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
          <!-- / 繰り返し -->
        </ul>
      </div>
    </section>

  <?php endif; ?>

</main>

<?php get_footer(); ?>