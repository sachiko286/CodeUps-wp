<?php get_header(); ?>

<?php include 'urls.php'; ?>

<main>

  <section class="sub-fv sub-fv--campaign">
    <h2 class="sub-fv__title">Campaign</h2>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <section class="page-campaign top-page-campaign">
    <div class="page-campaign__inner inner">
      <!-- 投稿があれば表示なければ非表示 -->
      <?php if (have_posts()) : ?>
        <div class="page-campaign__filter filter-content">
          <ul class="filter-content__list">
            <!-- 'ALL' リンクが選択された時にクラス 'is-active' を追加 -->
            <li class="filter-content__list-title <?php if (!isset($_GET['campaign_category'])) echo 'is-active'; ?>">
              <a href="<?php echo get_post_type_archive_link('campaign'); ?>">ALL</a>
            </li>
            <?php
            $campaign_terms = get_terms(array(
              'taxonomy' => 'campaign_category',
              'hide_empty' => false, // 投稿がなくてもカテゴリーを表示する
              'orderby' => 'description', // カテゴリーの並び順
            ));
            // キャンペーンカテゴリーが存在するかどうかをチェック
            if ($campaign_terms && !is_wp_error($campaign_terms)) :
              foreach ($campaign_terms as $campaign_term) : ?>
                <li class="filter-content__list-title <?php if (is_tax('campaign_category', $campaign_term->slug)) echo 'is-active'; ?>">
                  <a href="<?php echo esc_url(get_term_link($campaign_term)); ?>"><?php echo esc_html($campaign_term->name); ?></a>
                </li>
            <?php endforeach;
            endif; ?>
          </ul>
        </div>

        <div class="page-campaign__wrapper">
          <ul class="page-campaign__items">
            <?php while (have_posts()) : the_post(); ?>
              <li class="page-campaign__item campaign-card">
                <div class="campaign-card__item">
                  <div class="campaign-card__img">
                    <?php if (get_the_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>のアイキャッチ画像">
                    <?php else : ?>
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage.jpg" alt="noimage">
                    <?php endif; ?>
                  </div>
                  <div class="campaign-card__body campaign-card__body--sub">
                    <div class="campaign-card__category">
                      <!-- get_the_terms の結果を変数に代入し、最初のカテゴリー名を表示 -->
                      <?php $campaign_category = get_the_terms(get_the_ID(), 'campaign_category'); ?>
                      <?php if (!empty($campaign_category)) : ?>
                        <p><?php echo esc_html($campaign_category[0]->name); ?></p>
                      <?php endif; ?>
                    </div>
                    <h3 class="campaign-card__title campaign-card__title--sub"><?php the_title(); ?></h3>
                    <p class="campaign-card__text campaign-card__text--sub">全部コミコミ(お一人様)</p>
                    <div class="campaign-card__price campaign-card__price--sub">
                      <!-- get_field の結果を変数に代入して使用 -->
                      <?php $campaign_price = get_field('campaign_price'); ?>
                      <?php if ($campaign_price && $campaign_price['price_1'] && $campaign_price['price_2']) : ?>
                        <p class="campaign-card__price-original"><span>&yen;<?php echo number_format($campaign_price['price_1']); ?></span></p>
                        <p class="campaign-card__price-discount campaign-card__price-discount--sub">&yen;<?php echo number_format($campaign_price['price_2']); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="campaign__wrapper u-desktop">
                    <div class="campaign__text">
                      <?php
                      $campaign_content = get_field('campaign_content');
                      if (!empty($campaign_content)) {
                        echo nl2br(esc_html($campaign_content)); // テキストのエスケープ処理と改行の変換
                      }
                      ?>
                    </div>

                    <?php $campaign_period = get_field('campaign_period'); ?>
                    <?php if ($campaign_period && $campaign_period['period_start'] && $campaign_period['period_end']) : ?>
                      <p class="campaign__date"><?php echo esc_html($campaign_period['period_start']); ?> &#045; <?php echo esc_html($campaign_period['period_end']); ?></p>
                    <?php endif; ?>

                    <p class="campaign__info-text">ご予約・お問い合わせはコチラ</p>
                    <div class="campaign__info-button">
                      <a href="<?php echo $contact; ?>" class="button slide">Contact us<span class="button__arrow"></span></a>
                    </div>
                  </div>
                </div>
              </li>
            <?php endwhile; ?>
          </ul>
        </div>

        <div class="pagenavi">
          <div class="pagenavi__inner">
            <!-- WP-PageNaviで出力される部分 -->
            <?php wp_pagenavi(); ?>
          </div>
        </div>
      <?php else : ?>
        <!-- 投稿がない場合のメッセージ -->
        <p class="non-message">現在のキャンペーンはありません</p>
      <?php endif; ?>
    </div>
  </section>


</main>

<?php get_footer(); ?>