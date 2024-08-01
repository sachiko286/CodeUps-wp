<?php get_header(); ?>
<main>

  <section class="sub-fv sub-fv--sitemap">
    <!-- <div class="sub-fv__inner"> -->
    <h2 class="sub-fv__title">Site MAP</h2>
  </section>


  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <div class="page-sitemap top-page-sitemap">
    <div class="page-sitemap__inner inner">
      <nav class=" page-sitemap__content sp-nav">
        <div class="sp-nav__list-box">
          <p class="sp-nav__list-category sp-nav__list-category--sitemap"><a href="page-campaign.html">キャンペーン</a></p>
          <ul class="sp-nav__list-items">
            <li class="sp-nav__list-item"><a href="page-campaign.html?filter=cat1">ライセンス取得</a></li>
            <li class="sp-nav__list-item"><a href="page-campaign.html?filter=cat2">貸切体験ダイビング</a></li>
            <li class="sp-nav__list-item"><a href="page-campaign.html?filter=cat3">ナイトダイビング</a></li>
          </ul>

        </div>
        <div class="sp-nav__list-box">
          <p class="sp-nav__list-category sp-nav__list-category--sitemap"><a href="page-about-us.html">私たちについて</a></p>
        </div>
        <div class="sp-nav__list-box">
          <p class="sp-nav__list-category sp-nav__list-category--sitemap"><a href="page-information.html">ダイビング情報</a>
          </p>
          <ul class="sp-nav__list-items">
            <li class="sp-nav__list-item"><a href="page-information.html?tab=tab01">ライセンス講習</a></li>
            <li class="sp-nav__list-item"><a href="page-information.html?tab=tab03">体験ダイビング</a></li>
            <li class="sp-nav__list-item"><a href="page-information.html?tab=tab02">ファンダイビング</a></li>
          </ul>
        </div>
        <div class="sp-nav__list-box">
          <p class="sp-nav__list-category sp-nav__list-category--sitemap"><a href="page-blog.html">ブログ</a></p>
        </div>
        <div class="sp-nav__list-box">
          <p class="sp-nav__list-category sp-nav__list-category--sitemap"><a href="page-voice.html">お客様の声</a></p>
        </div>
        <div class="sp-nav__list-box">
          <p class="sp-nav__list-category sp-nav__list-category--sitemap"><a href="page-price.html">料金一覧</a></p>
          <ul class="sp-nav__list-items">
            <li class="sp-nav__list-item"><a href="#">ライセンス講習</a></li>
            <li class="sp-nav__list-item"><a href="#">体験ダイビング</a></li>
            <li class="sp-nav__list-item"><a href="#">ファンダイビング</a></li>
            <!-- <li class="sp-nav__list-item"><a href="#">スペシャルダイビング</a></li> -->
          </ul>
        </div>
        <div class="sp-nav__list-box">
          <p class="sp-nav__list-category sp-nav__list-category--sitemap"><a href="page-faq.html">よくある質問</a></p>
        </div>
        <div class="sp-nav__list-box">
          <p class="sp-nav__list-category sp-nav__list-category--sitemap"><a href="page-site-map.html">サイトマップ</a></p>
        </div>
        <div class="sp-nav__list-box">
          <p class="sp-nav__list-category sp-nav__list-category--sitemap "><a href="page-privacy.html">プライバシー<br class="u-mobile">ポリシー</a>
          </p>
        </div>
        <div class="sp-nav__list-box">
          <p class="sp-nav__list-category sp-nav__list-category--sitemap"><a href="page-terms.html">利用規約</a></p>
        </div>
        <div class="sp-nav__list-box">
          <p class="sp-nav__list-category sp-nav__list-category--sitemap"><a href="page-contact.html">お問い合わせ</a></p>
        </div>
      </nav>
    </div>
  </div>


</main>

<?php get_footer(); ?>