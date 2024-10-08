<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <!-- 自動的に電話番号と認識してリンク化する機能を無効 -->
  <meta name="format-detection" content="telephone=no" />
  <!-- ポートフォリオや学習の時 検索結果に出ないように設定 -->
  <meta name="robots" content="noindex" />
  <!-- meta情報 -->
  <!-- <title>CodeUps</title> -->
  <!-- ウェブページの概要や説明。検索結果に表示されることがある -->
  <!-- <meta name="description" content="" /> -->
  <!-- <meta name="keywords" content="ウェブページの内容に関連するキーワード" /> -->
  <!-- ogp -->
  <!-- <meta property="og:title" content="共有された際のページのタイトル" /> -->
  <!-- <meta property="og:type" content="ページの種類 例:website、article、videoなど"> -->
  <!-- <meta property="og:url" content="ページのURLを指定" /> -->
  <!-- <meta property="og:image" content="ページを共有した際に表示される画像のURL" /> -->
  <!-- <meta property="og:site_name" content="サイトの名前" /> -->
  <!-- <meta property="og:description" content="ページの説明" /> -->
  <!-- favicon.ico -->
  <!-- <link rel="icon" href="assets/images/common/favicon.ico" alt="ロゴ" /> -->


  <?php wp_head(); ?>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-GLQPSR946R"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-GLQPSR946R');
  </script>
</head>

<?php include 'urls.php'; ?>

<body>
  <!-- ヘッダー -->
  <header class="header top-header">
    <div class="header__inner">
      <?php if (is_front_page()) : ?>
        <h1 class="header__logo">
        <?php else : ?>
          <div class="header__logo">
          <?php endif; ?>
          <a href="<?php echo $home; ?>">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-w.svg" alt="ロゴ">
          </a>
          <?php if (is_front_page()) : ?>
        </h1>
      <?php else : ?>
    </div>
  <?php endif; ?>

  <!-- ハンバーガーボタン -->
  <button class="header__hamburger js-hamburger" aria-label="メニューを開く">
    <span></span>
    <span></span>
    <span></span>
  </button>

  <!-- PCヘッダーナビ -->
  <nav class="header__pc-nav pc-nav">
    <ul class="pc-nav__items">
      <li class="pc-nav__item">
        <a href="<?php echo $campaign; ?>">Campaign<span>キャンペーン</span></a>
      </li>
      <li class="pc-nav__item">
        <a href="<?php echo $aboutus; ?>">About us<span>私たちについて</span></a>
      </li>
      <li class="pc-nav__item">
        <a href="<?php echo $information; ?>">Information<span>ダイビング情報</span></a>
      </li>
      <li class="pc-nav__item">
        <a href="<?php echo $blog; ?>">Blog<span>ブログ</span></a>
      </li>
      <li class="pc-nav__item">
        <a href="<?php echo $voice; ?>">Voice<span>お客様の声</span></a>
      </li>
      <li class="pc-nav__item">
        <a href="<?php echo $price; ?>">Price<span>料金一覧</span></a>
      </li>
      <li class="pc-nav__item">
        <a href="<?php echo $faq; ?>">FAQ<span>よくある質問</span></a>
      </li>
      <li class="pc-nav__item">
        <a href="<?php echo $contact; ?>">Contact<span>お問い合わせ</span></a>
      </li>
    </ul>
  </nav>

  <!-- spドロワーメニュー -->
  <div class="header__drawer js-drawer">
    <nav class="header__drawer-nav sp-nav">
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
  </header>