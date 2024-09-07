<?php get_header(); ?>

<main>

  <section class="sub-fv sub-fv--voice">
    <h2 class="sub-fv__title">Voice</h2>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <section class="page-voice top-page-voice">
    <div class="page-voice__inner inner">
      <!-- 投稿があれば表示なければ非表示 -->
      <?php if (have_posts()) : ?>
        <div class="page-voice__folter filter-content">
          <ul class="filter-content__list">
            <li class="filter-content__list-title <?php if (!isset($_GET['voice_category'])) echo 'is-active'; ?>">
              <a href="<?php echo get_post_type_archive_link('voice'); ?>">ALL</a>
            </li>
            <?php
            $voice_terms = get_terms('voice_category');
            if ($voice_terms && !is_wp_error($voice_terms)) :
              foreach ($voice_terms as $voice_term) : ?>
                <li class="filter-content__list-title <?php if (is_tax('voice_category', $voice_term->slug)) echo 'is-active'; ?>">
                  <a href="<?php echo esc_url(get_term_link($voice_term)); ?>"><?php echo $voice_term->name; ?></a>
                </li>
            <?php endforeach;
            endif; ?>
          </ul>
        </div>

        <div class="page-voice__wrapper">
          <ul class="page-voice__items voice-list ">
            <?php while (have_posts()): the_post(); ?>
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
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage.jpg" alt="noimage">
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="voice-card__text">
                    <?php the_content(); ?>
                  </div>
                </div>
              </li>
            <?php endwhile; ?>
          </ul>
        </div>

        <!-- ページナビゲーション -->
        <div class="pagenavi">
          <div class="pagenavi__inner">
            <?php wp_pagenavi(); ?>
          </div>
        </div>
      <?php else: ?>
        <p>投稿はありません。</p>
      <?php endif; ?>
    </div>
  </section>

</main>

<?php get_footer(); ?>