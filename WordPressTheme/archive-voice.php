<?php get_header(); ?>
<main>

  <section class="sub-fv sub-fv--voice">
    <h2 class="sub-fv__title">Voice</h2>
  </section>


  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <section class="page-voice top-page-voice">
    <div class="page-voice__inner inner">
      <div class="page-voice__folter filter-content">
        <ul class="filter-content__list">
          <li class="filter-content__list-title <?php echo !isset($_GET['category']) || $_GET['category'] == 'all' ? 'is-active' : ''; ?>">
            <a href="?category=all&paged=1">ALL</a>
          </li>
          <li class="filter-content__list-title <?php echo isset($_GET['category']) && $_GET['category'] == 'license' ? 'is-active' : ''; ?>">
            <a href="?category=license&paged=1">ライセンス講習</a>
          </li>
          <li class="filter-content__list-title <?php echo isset($_GET['category']) && $_GET['category'] == 'fundiving' ? 'is-active' : ''; ?>">
            <a href="?category=fundiving&paged=1">ファンダイビング</a>
          </li>
          <li class="filter-content__list-title <?php echo isset($_GET['category']) && $_GET['category'] == 'experience' ? 'is-active' : ''; ?>">
            <a href="?category=experience&paged=1">体験ダイビング</a>
          </li>
        </ul>
      </div>
      <div class="page-voice__wrapper">
        <ul class="page-voice__items voice-list ">
          <?php
          // カテゴリーに基づいてクエリを作成
          $category = isset($_GET['category']) ? $_GET['category'] : 'all';
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // 現在のページを取得

          $args = array(
            'post_type' => 'voice', // カスタム投稿タイプを指定
            'posts_per_page' => 10,     // 表示件数を指定
            'paged' => $paged,         // ページ番号を指定
          );

          if ($category != 'all') {
            $args['tax_query'] = array(
              array(
                'taxonomy' => 'campaign_category', // タクソノミー名を指定
                'field' => 'slug',
                'terms' => $category,
              ),
            );
          }

          $query = new WP_Query($args);

          // 有効なページ番号でない場合は最初のページにリダイレクト
          if ($paged > $query->max_num_pages && $query->max_num_pages > 0) {
            wp_redirect(get_pagenum_link(1));
            exit;
          }

          if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
              <li class="voice-list__item voice-card">
                <div class="voice-card__inner">
                  <div class="voice-card__header">
                    <div class="voice-card__lead">
                      <div class="voice-card__meta">
                        <?php $age = get_field('age'); ?>
                        <?php if ($age) : ?>
                          <p class="voice-card__age"><?php echo $age; ?></p>
                        <?php endif; ?>

                        <p class="voice-card__category"><?php echo get_the_terms(get_the_ID(), 'campaign_category')[0]->name; ?></p>
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
                  <div class="voice-card__text"><?php the_content(); ?>
                  </div>
                </div>
              </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php else : ?>
            <p>該当する口コミがありません。</p>
          <?php endif; ?>
        </ul>
      </div>
      <!-- ページナビゲーション -->
      <div class="pagenavi">
        <div class="pagenavi__inner">
          <?php wp_pagenavi(); ?>
        </div>
      </div>

    </div>
  </section>
</main>

<?php get_footer(); ?>