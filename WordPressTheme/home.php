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

  <section class="sub-fv sub-fv--blog">
    <!-- <div class="sub-fv__inner"> -->
    <h2 class="sub-fv__title">Blog</h2>
  </section>


  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <section class="page-blog top-page-blog">
    <div class="page-blog__inner inner">
      <div class="page-blog__main">
        <div class="page-blog__main-inner">
          <ul class="page-blog__list blog-list blog-list--page">
            <?php if (have_posts()) :
              while (have_posts()) :
                the_post(); ?>
                <li class="blog-list__item">
                  <a href="<?php the_permalink(); ?>" class="blog-card">
                    <div class="blog-card__inner">
                      <div class="blog-card__img">
                        <?php if (get_the_post_thumbnail()) : ?>
                          <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                        <?php else : ?>
                          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage.jpg" alt="noimage">
                        <?php endif; ?>
                      </div>
                      <div class="blog-card__content">
                        <!-- <time class="blog-card__date" datetime="2023-11-17">2023.11/17</time> -->
                        <time datetime="<?php the_time('c'); ?>" class="blog-card__date"><?php the_time('Y.m/d'); ?></time>
                        <p class="blog-card__title"><?php the_title(); ?></p>
                        <div class="blog-card__text">
                          <?php the_content(); ?></div>
                      </div>
                    </div>
                  </a>
                </li>
            <?php endwhile;
            endif; ?>
          </ul>
          <div class="pagenavi">
            <div class="pagenavi__inner">
              <!-- WP-PageNaviで出力される部分 ここから -->
              <?php wp_pagenavi(); ?>
              <!-- WP-PageNaviで出力される部分 ここまで -->
            </div>

          </div>


        </div>
      </div>

      <?php get_template_part('parts/aside') ?>

  </section>
</main>


<?php get_footer(); ?>