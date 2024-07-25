<?php get_header(); ?>
<main>

  <section class="sub-fv sub-fv--about">
    <!-- <div class="sub-fv__inner"> -->
    <h2 class="sub-fv__title">About us</h2>
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
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります
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
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="gallery top-gallery">
    <div class="gallery__modal js-overlay"></div>
    <div class="gallery__inner inner">
      <div class="about-us__header section-header">
        <p class="section-header__engtitle">Gallery</p>
        <h2 class="section-header__jatitle">フォト</h2>
      </div>

      <ul class="gallery__list gallery-list">
      
        <?php $fields = SCF::get('gallery'); ?>
        <!-- 繰り返し -->
        <?php foreach ($fields as $field) : ?>
          <li class="gallery-list__item js-photo">
          <?php if ($field['gallery-img1']) : ?>
            <img src="<?php echo wp_get_attachment_url($field['gallery-img1']); ?>" alt="<?php the_title(); ?>">
          <?php else : ?>
            <img src="<?php echo esc_url(get_theme_file_uri('assets/images/common/noimage.jpg')); ?>" alt="noimage">
          <?php endif; ?>
          </li>
        <?php endforeach; ?>
        <!-- / 繰り返し -->
      </ul>
    </div>
  </section>
</main>


<?php get_footer(); ?>