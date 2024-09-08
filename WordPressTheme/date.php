<?php get_header(); ?>

<?php include 'urls.php'; ?>

<section class="sub-fv sub-fv--blog">
  <h2 class="sub-fv__title"><?php the_archive_title(); ?></h2>
</section>

<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>

<section class="page-blog top-page-blog ">
  <div class="page-blog__inner inner">
    <div class="page-blog__main">
      <div class="page-blog__main-inner">
        <!-- アーカイブのタイトルを表示 -->
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
                      <time datetime="<?php the_time('c'); ?>" class="blog-card__date"><?php the_time('Y.m/d'); ?></time>
                      <p class="blog-card__title"><?php the_title(); ?></p>
                      <div class="blog-card__text">
                        <?php echo wp_trim_words(get_the_content(), 88, '…'); ?>
                      </div>
                    </div>
                  </div>
                </a>
              </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
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
    <?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>