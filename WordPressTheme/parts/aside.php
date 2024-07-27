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

<div class="page-blog__aside">
        <div class="page-blog__aside-inner">
          <div class="page-blog__aside-content blog-aside">
            <h2 class="blog-aside__title">人気記事</h2>
            <ul class="blog-aside__popular-post post-list">
              <li class="post-list__item">
                <a href="#" class="post-card">
                  <div class="post-card__inner">
                    <div class="post-card__img">
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog4.jpg" alt="省略">
                    </div>
                    <div class="post-card__content">
                      <time class="post-card__date" datetime="2023-11-17">2023.11/17</time>
                      <p class="post-card__title">ライセンス取得</p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="post-list__item">
                <a href="#" class="post-card">
                  <div class="post-card__inner">
                    <div class="post-card__img">
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog2.jpg" alt="省略">
                    </div>
                    <div class="post-card__content">
                      <time class="post-card__date" datetime="2023-11-17">2023.11/17</time>
                      <p class="post-card__title">ウミガメと泳ぐ</p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="post-list__item">
                <a href="#" class="post-card">
                  <div class="post-card__inner">
                    <div class="post-card__img">
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog3.jpg" alt="省略">
                    </div>
                    <div class="post-card__content">
                      <time class="post-card__date" datetime="2023-11-17">2023.11/17</time>
                      <p class="post-card__title">カクレクマノミ</p>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </div>

          <div class="page-blog__aside-content page-blog__aside-content--voice blog-aside">
            <h2 class="blog-aside__title">口コミ</h2>
            <div class="blog-aside__voice aside-voice">
              <?php
              // カスタム投稿タイプ 'voice' の最新1件を取得
              $voice_args = array(
                'post_type'      => 'voice',
                'posts_per_page' => 1,
              );
              $voice_query = new WP_Query($voice_args);
              ?>

              <!-- サブループ処理開始 -->
              <?php if ($voice_query->have_posts()) :
                while ($voice_query->have_posts()) : $voice_query->the_post();
              ?>
                  <a href="#" class="aside-voice__card">
                    <div class="aside-voice__img">
                      <?php if (get_the_post_thumbnail()) : ?>
                        <?php $age = get_field('age'); ?>
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo $age; ?>のアイキャッチ画像">
                      <?php else : ?>
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage.jpg" alt="noimage">
                      <?php endif; ?>
                    </div>
                    <div class="aside-voice__lead">
                      <div class="aside-voice__meta">
                        <p class="aside-voice__age">
                          <?php if ($age) : ?>
                        <p class="voice-card__age"><?php echo $age; ?></p>
                      <?php endif; ?></p>
                      </div>
                      <h3 class="aside-voice__subtitle"><?php the_title(); ?></h3>
                    </div>
                  </a>
              <?php
                endwhile;
              endif;
              // クエリのリセット
              wp_reset_postdata();
              ?>
              <div class="aside-voice__button">
                <a href="<?php echo $voice; ?>" class="button slide">View more<span class="button__arrow"></span></a>
              </div>
            </div>
          </div>

          <div class="page-blog__aside-content page-blog__aside-content--campaign blog-aside">
            <h2 class="blog-aside__title">キャンペーン</h2>
            <div class="blog-aside__campaign aside-campaign">
              <?php
              // カスタム投稿タイプ 'campaign' の最新2件を取得
              $campaign_args = array(
                'post_type'      => 'campaign',
                'posts_per_page' => 2,
              );
              $campaign_query = new WP_Query($campaign_args);
              ?>
              <!-- サブループ処理開始 -->
              <?php if ($campaign_query->have_posts()) :
                while ($campaign_query->have_posts()) : $campaign_query->the_post();
              ?>
                  <div class="aside-campaign__list campaign-card">

                    <!-- スライドの中身 -->
                    <div class="campaign-card__item">
                      <div class="campaign-card__img campaign-card__img--aside">
                        <?php if (get_the_post_thumbnail()) : ?>
                          <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                        <?php else : ?>
                          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage.jpg" alt="noimage">
                        <?php endif; ?>
                      </div>
                      <div class="campaign-card__body campaign-card__body--aside">
                        <p class="campaign-card__title campaign-card__title--aside"><?php the_title(); ?></p>
                        <p class="campaign-card__text campaign-card__text--aside">全部コミコミ(お一人様)</p>
                        <div class="campaign-card__price campaign-card__price--aside">
                          <?php $price_1 = get_field('price_1'); ?>
                          <?php if ($price_1) : ?>
                            <p class="campaign-card__price-original campaign-card__price-original--aside">
                              <span>¥<?php echo number_format($price_1); ?></span>
                            </p>
                          <?php endif; ?>
                          <?php $price_2 = get_field('price_2'); ?>
                          <?php if ($price_2) : ?>
                            <p class="campaign-card__price-discount campaign-card__price-discount--aside">¥<?php echo number_format($price_2); ?></p>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
              <?php
                endwhile;
              endif;
              // クエリのリセット
              wp_reset_postdata();
              ?>
              <div class="aside-voice__button">
                <a href="<?php echo $campaign; ?>" class="button slide">View more<span class="button__arrow"></span></a>
              </div>


            </div>
          </div>


          <div class="page-blog__aside-content page-blog__aside-content--archive blog-aside">
            <h2 class="blog-aside__title">アーカイブ</h2>
            <ul class="blog-aside__archive aside-archive">
              <li class="aside-archive__item">
                <p class="aside-archive__item-year js-archive archive-arrow">2023</p>
                <div class="aside-archive__item-mouths js-mouths">
                  <a href="" class="aside-archive__item-mouth archive-arrow">
                    <p>3月</p>
                  </a>
                  <a href="" class="aside-archive__item-mouth archive-arrow">
                    <p>2月</p>
                  </a>
                  <a href="" class="aside-archive__item-mouth archive-arrow">
                    <p>1月</p>
                  </a>
                </div>
              </li>
              <li class="aside-archive__item">
                <p class="aside-archive__item-year js-faq-question archive-arrow">2022</p>
                <div class="aside-archive__item-mouths js-mouths">

                  <p class="aside-archive__item-mouth archive-arrow">3月</p>
                  <p class="aside-archive__item-mouth archive-arrow">2月</p>
                  <p class="aside-archive__item-mouth archive-arrow">1月</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>


