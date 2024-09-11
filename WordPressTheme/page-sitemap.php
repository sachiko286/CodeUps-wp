<?php get_header(); ?>

<?php include 'urls.php'; ?>

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
        <p class="sp-nav__list-category"><a href="<?php echo $campaign; ?>">キャンペーン</a></p>
        <ul class="sp-nav__list-items">
          <li class="sp-nav__list-item"><a href="<?php echo $campaign_license; ?>">ライセンス講習</a></li>
          <li class="sp-nav__list-item"><a href="<?php echo $campaign_experience; ?>">体験ダイビング</a></li>
          <li class="sp-nav__list-item"><a href="<?php echo $campaign_fundiving; ?>">ファンダイビング</a></li>
        </ul>

      </div>
      <div class="sp-nav__list-box">
        <p class="sp-nav__list-category"><a href="<?php echo $aboutus; ?>">私たちについて</a></p>
      </div>
      <div class="sp-nav__list-box">
        <p class="sp-nav__list-category"><a href="<?php echo $information; ?>">ダイビング情報</a></p>
        <ul class="sp-nav__list-items">
          <li class="sp-nav__list-item"><a href="<?php echo $information; ?>?tab=tab01">ライセンス講習</a></li>
          <li class="sp-nav__list-item"><a href="<?php echo $information; ?>?tab=tab03">体験ダイビング</a></li>
          <li class="sp-nav__list-item"><a href="<?php echo $information; ?>?tab=tab02">ファンダイビング</a></li>
        </ul>
      </div>
      <div class="sp-nav__list-box">
        <p class="sp-nav__list-category"><a href="<?php echo $blog; ?>">ブログ</a></p>
      </div>
      <div class="sp-nav__list-box">
        <p class="sp-nav__list-category"><a href="<?php echo $voice; ?>">お客様の声</a></p>
      </div>
      <div class="sp-nav__list-box">
        <p class="sp-nav__list-category"><a href="<?php echo $price; ?>">料金一覧</a></p>
        <ul class="sp-nav__list-items">
          <li class="sp-nav__list-item"><a href="<?php echo $price; ?>#price-license">ライセンス講習</a></li>
          <li class="sp-nav__list-item"><a href="<?php echo $price; ?>#price-experience">体験ダイビング</a></li>
          <li class="sp-nav__list-item"><a href="<?php echo $price; ?>#price-fundiving">ファンダイビング</a></li>
        </ul>
      </div>
      <div class="sp-nav__list-box">
        <p class="sp-nav__list-category"><a href="<?php echo $faq; ?>">よくある質問</a></p>
      </div>
      <div class="sp-nav__list-box">
        <p class="sp-nav__list-category"><a href="<?php echo $sitemap; ?>">サイトマップ</a></p>
      </div>
      <div class="sp-nav__list-box">
        <p class="sp-nav__list-category "><a href="<?php echo $privacypolicy; ?>">プライバシー<br class="u-mobile">ポリシー</a>
        </p>
      </div>
      <div class="sp-nav__list-box">
        <p class="sp-nav__list-category"><a href="<?php echo $terms; ?>">利用規約</a></p>
      </div>
      <div class="sp-nav__list-box">
        <p class="sp-nav__list-category"><a href="<?php echo $contact; ?>">お問い合わせ</a></p>
      </div>
      </nav>
    </div>
  </div>


</main>

<?php get_footer(); ?>