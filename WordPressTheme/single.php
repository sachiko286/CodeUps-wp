<?php get_header(); ?>
<main>

  <section class="sub-fv sub-fv--blog">
    <!-- <div class="sub-fv__inner"> -->
    <h2 class="sub-fv__title">Blog</h2>
  </section>


  <?php get_template_part('parts/breadcrumb') ?>

  <?php if (have_posts()) :
    while (have_posts()) :
      the_post(); ?>
      <section class="page-sub-blog top-page-sub-blog">
        <div class="page-sub-blog__inner inner">
          <div class="page-sub-blog__main">
            <div class="page-sub-blog__heading">
              <time datetime="<?php the_time('c'); ?>" class="page-sub-blog__date"><?php the_time('Y.m/d'); ?></time>
              <h1 class="page-sub-blog__title"><?php the_title(); ?></h1>
              <figure class="page-sub-blog__img">
                <?php if (get_the_post_thumbnail()) : ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                <?php else : ?>
                  <img src="<?php echo get_theme_file_uri('assets/images/common/no-image.jpg" alt="noimage'); ?>">
                <?php endif; ?>
              </figure>
            </div>

            <div class="page-sub-blog__body">
              <?php the_content(); ?>

              <figure>
                <img src="./assets/images/common/blog1.jpg" alt="省略">
              </figure>
              <p>
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              </p>
              <ul>
                <li>リスト１</li>
                <li>リスト２</li>
                <li>リスト３</li>
              </ul>
              <p>
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              </p>
            </div>




            <div class="pagenavi pagenavi--sub-blog">
              <div class="pagenavi__inner pagenavi__inner--sub-blog">
                <!-- WP-PageNaviで出力される部分 ここから -->
                <div class="wp-pagenavi wp-pagenavi--sub-blog" role="navigation">
                  <a class="previouspostslink" rel="prev" href="#"></a>
                  <a class="nextpostslink" rel="next" href="#"></a>
                </div>
                <!-- WP-PageNaviで出力される部分 ここまで -->
              </div>
            </div>
          </div>

          <?php get_template_part('parts/aside') ?>
          
        </div>
      </section>
  <?php endwhile;
  endif; ?>
</main>


<?php get_footer(); ?>