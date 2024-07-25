<?php get_header(); ?>
<main>

  <section class="sub-fv sub-fv--voice">
    <!-- <div class="sub-fv__inner"> -->
    <h2 class="sub-fv__title">Voice</h2>
  </section>


<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>

  <section class="page-voice top-page-voice">
    <div class="page-voice__inner inner">
      <div class="page-voice__folter filter-content">
        <ul class="filter-content__list">
          <li class="filter-content__list-title is-active"><a href="#">ALL</a></li>
          <li class="filter-content__list-title "><a href="#">ライセンス講習</a></li>
          <li class="filter-content__list-title "><a href="#">ファンダイビング</a></li>
          <li class="filter-content__list-title "><a href="#">体験ダイビング</a></li>
        </ul>
      </div>
      <div class="page-voice__wrapper">
        <ul class="page-voice__items voice-list ">
        <?php if (have_posts()) :
            while (have_posts()) :
              the_post(); ?>
          <li class="voice-list__item voice-card">
            <div class="voice-card__inner">
              <div class="voice-card__header">
                <div class="voice-card__lead">
                  <div class="voice-card__meta">
                  <?php $age = get_field('age'); ?>
                  <?php if ($age) : ?>
                    <p class="voice-card__age"><?php echo $age; ?></p>
                    <?php endif; ?>

                    <p class="voice-card__category"><?php echo get_the_terms(get_the_ID(), 'campaign')[0]->name; ?></p>
                  </div>
                  <h3 class="voice-card__subtitle"><?php the_title(); ?></h3>
                </div>
                <div class="voice-card__img colorbox">
                <?php if (get_the_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                    <?php else : ?>
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage.jpg" alt="noimage">
                    <?php endif; ?>
                  <!-- <img src="./assets/images/common/voice1.jpg" alt="女性の写真"> -->
                </div>
              </div>
              <p class="voice-card__text"><?php the_content(); ?>
              </p>
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