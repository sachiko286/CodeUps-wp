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
            </div>

            <?php
            $prev = get_previous_post();
            if (!empty($prev)) {
              $prev_url = esc_url(get_permalink($prev->ID));
            }

            $next = get_next_post();
            if (!empty($next)) {
              $next_url = esc_url(get_permalink($next->ID));
            }
            ?>

            <div class="pagenavi pagenavi--sub-blog">
              <div class="pagenavi__inner pagenavi__inner--sub-blog">
                <div class="wp-pagenavi wp-pagenavi--sub-blog" role="navigation">
                  <?php if (!empty($prev)) : ?>
                    <a class="previouspostslink" rel="prev" href="<?php echo $prev_url; ?>"></a>
                  <?php endif; ?>
                  <?php if (!empty($next)) : ?>
                    <a class="nextpostslink" rel="next" href="<?php echo $next_url; ?>"></a>
                  <?php endif; ?>
                </div>
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