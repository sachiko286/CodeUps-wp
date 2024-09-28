<?php get_header(); ?>

<main>

  <section class="sub-fv sub-fv--voice">
    <h2 class="sub-fv__title">Voice</h2>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <section class="page-voice top-page-voice">
    <div class="page-voice__inner inner">
      <div class="page-voice__filter filter-content">
        <ul class="filter-content__list">
          <li class="filter-content__list-title <?php if (!is_tax('voice_category')) echo 'is-active'; ?>">
            <a href="<?php echo get_post_type_archive_link('voice'); ?>">ALL</a>
          </li>
          <?php
          $voice_terms = get_terms(array(
            'taxonomy' => 'voice_category',
            'hide_empty' => false, // 投稿がなくてもカテゴリーを表示する
            'orderby' => 'description',// カテゴリーの並び順
          ));
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
        <?php if (have_posts()) : ?>
          <ul class="page-voice__items voice-list ">
            <?php while (have_posts()) : the_post(); ?>
              <li class="voice-list__item voice-card">
                <div class="voice-card__inner">
                  <div class="voice-card__header">
                    <div class="voice-card__lead">
                      <div class="voice-card__meta">
                      <?php
                        $voice_group = get_field('voice_group');
                        if (isset($voice_group['voice_meta_group'])) {
                          $voice_meta_group = $voice_group['voice_meta_group'];
                          $voice_age = isset($voice_meta_group['voice_age']) ? $voice_meta_group['voice_age'] : '';
                          $voice_gender = isset($voice_meta_group['voice_gender']) ? $voice_meta_group['voice_gender'] : '';
                        }
                        ?>

                        <p class="voice-card__age"><?php if ($voice_age) : ?><?php echo $voice_age; ?><?php endif; ?><?php if ($voice_gender) : ?>&lpar;<?php echo $voice_gender; ?>&rpar;<?php endif; ?></p>

                        <!-- get_the_terms の結果を変数に代入し、最初のカテゴリー名を表示 -->
                        <?php $voice_category = get_the_terms(get_the_ID(), 'voice_category'); ?>
                        <?php if (!empty($voice_category)) : ?>
                          <p class="voice-card__category"><?php echo esc_html($voice_category[0]->name); ?></p>
                        <?php endif; ?>
                      </div>
                      <h3 class="voice-card__subtitle"><?php the_title(); ?></h3>
                    </div>
                    <div class="voice-card__img colorbox">
                      <?php if (get_the_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo $voice_age; ?><?php echo $voice_gender; ?>のアイキャッチ画像">
                      <?php else : ?>
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage.jpg" alt="noimage">
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="voice-card__text">
                    <?php
                    $voice_content= get_field('voice_content');
                    if (!empty($voice_content)) {
                      echo '<div class="voice-content">';
                      echo nl2br(esc_html($voice_content)); // テキストのエスケープ処理と改行の変換
                      echo '</div>';
                    }
                    ?>
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
    <?php else : ?>
      <p class="non-message">
        <?php
          if (is_tax('voice_category')) {
            $term = get_queried_object();
            echo esc_html($term->name) . 'の投稿はありません';
          } else {
            echo '投稿はありません';
          }
        ?>
      </p>
    <?php endif; ?>
    </div>
  </section>

</main>

<?php get_footer(); ?>