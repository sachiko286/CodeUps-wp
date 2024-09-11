<?php get_header(); ?>
<main>

  <section class="sub-fv sub-fv--information">
    <!-- <div class="sub-fv__inner"> -->
    <h2 class="sub-fv__title">Information</h2>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <div class="page-information top-page-information">
    <div class="page-information__inner inner">
      <div class="page-information__tab information-tab">
        <ul class="information-tab__menu">
          <li class="information-tab__menu-item js-tab-menu is-active" data-number="tab01">
            ライセンス<br class="u-mobile">講習
          </li>
          <li class="information-tab__menu-item js-tab-menu" data-number="tab02">
            ファン<br class="u-mobile">ダイビング
          </li>
          <li class="information-tab__menu-item js-tab-menu" data-number="tab03">体験<br class="u-mobile">ダイビング
          </li>
        </ul>
        <ul class="information-tab__content">
          <li id="tab01" class="information-tab__content-item js-tab-content is-active">
            <div class="information-tab__content-wrapper">
              <div class="information-tab__content-body">
                <p class="information-tab__content-title">
                  ライセンス講習
                </p>
                <p class="information-tab__content-text">
                  泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！
                </p>
              </div>
              <div class="information-tab__content-img">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-license.jpg" alt="#">
              </div>

            </div>
          </li>
          <li id="tab02" class="information-tab__content-item js-tab-content">
            <div class="information-tab__content-wrapper">
              <div class="information-tab__content-body">
                <p class="information-tab__content-title">
                  ファンダイビング
                </p>
                <p class="information-tab__content-text">
                  ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                </p>
              </div>
              <div class="information-tab__content-img">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-fundiving.jpg" alt="#">
              </div>
            </div>
          </li>
          <li id="tab03" class="information-tab__content-item js-tab-content">
            <div class="information-tab__content-wrapper">
              <div class="information-tab__content-body">
                <p class="information-tab__content-title">
                  体験ダイビング
                </p>
                <p class="information-tab__content-text">
                  ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                </p>
              </div>
              <div class="information-tab__content-img">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-diving.jpg" alt="#">
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>