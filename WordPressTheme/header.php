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
  <title>CodeUps</title>
  <!-- ウェブページの概要や説明。検索結果に表示されることがある -->
  <meta name="description" content="" />
  <meta name="keywords" content="ウェブページの内容に関連するキーワード" />
  <!-- ogp -->
  <meta property="og:title" content="共有された際のページのタイトル" />
  <meta property="og:type" content="ページの種類 例:website、article、videoなど">
  <meta property="og:url" content="ページのURLを指定" />
  <meta property="og:image" content="ページを共有した際に表示される画像のURL" />
  <meta property="og:site_name" content="サイトの名前" />
  <meta property="og:description" content="ページの説明" />
  <!-- ファビコン -->
  <link rel="icon" href="#" />

  <?php wp_head(); ?>
</head>

<body>
  <!-- ヘッダー -->
  <header class="header top-header">
    <div class="header__inner">
      <h1 class="header__logo">
        <a href="index.html">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-w.svg" alt="ロゴ">
        </a>
      </h1>

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
            <a href="page-campaign.html">Campaign<span>キャンペーン</span></a>
          </li>
          <li class="pc-nav__item">
            <a href="page-about-us.html">About us<span>私たちについて</span></a>
          </li>
          <li class="pc-nav__item">
            <a href="page-information.html">Information<span>ダイビング情報</span></a>
          </li>
          <li class="pc-nav__item">
            <a href="page-blog.html">Blog<span>ブログ</span></a>
          </li>
          <li class="pc-nav__item">
            <a href="page-voice.html">Voice<span>お客様の声</span></a>
          </li>
          <li class="pc-nav__item">
            <a href="page-price.html">Price<span>料金一覧</span></a>
          </li>
          <li class="pc-nav__item">
            <a href="page-faq.html">FAQ<span>よくある質問</span></a>
          </li>
          <li class="pc-nav__item">
            <a href="page-contact.html">Contact<span>お問い合わせ</span></a>
          </li>
        </ul>
      </nav>

      <!-- spドロワーメニュー -->
      <div class="header__drawer js-drawer">
        <nav class="header__drawer-nav sp-nav">
          <div class="sp-nav__list-box">
            <p class="sp-nav__list-category"><a href="page-campaign.html">キャンペーン</a></p>
            <ul class="sp-nav__list-items">
              <li class="sp-nav__list-item"><a href="#">ライセンス取得</a></li>
              <li class="sp-nav__list-item"><a href="#">貸切体験ダイビング</a></li>
              <li class="sp-nav__list-item"><a href="#">ナイトダイビング</a></li>
            </ul>
          </div>
          <div class="sp-nav__list-box">
            <p class="sp-nav__list-category"><a href="page-about-us.html">私たちについて</a></p>
          </div>
          <div class="sp-nav__list-box">
            <p class="sp-nav__list-category"><a href="page-information.html">ダイビング情報</a></p>
            <ul class="sp-nav__list-items">
              <li class="sp-nav__list-item"><a href="#">ライセンス講習</a></li>
              <li class="sp-nav__list-item"><a href="#">体験ダイビング</a></li>
              <li class="sp-nav__list-item"><a href="#">ファンダイビング</a></li>
            </ul>
          </div>
          <div class="sp-nav__list-box">
            <p class="sp-nav__list-category"><a href="page-blog.html">ブログ</a></p>
          </div>
          <div class="sp-nav__list-box">
            <p class="sp-nav__list-category"><a href="page-voice.html">お客様の声</a></p>
          </div>
          <div class="sp-nav__list-box">
            <p class="sp-nav__list-category"><a href="page-price.html">料金一覧</a></p>
            <ul class="sp-nav__list-items">
              <li class="sp-nav__list-item"><a href="#">ライセンス講習</a></li>
              <li class="sp-nav__list-item"><a href="#">体験ダイビング</a></li>
              <li class="sp-nav__list-item"><a href="#">ファンダイビング</a></li>
            </ul>
          </div>
          <div class="sp-nav__list-box">
            <p class="sp-nav__list-category"><a href="page-faq.html">よくある質問</a></p>
          </div>
          <div class="sp-nav__list-box">
            <p class="sp-nav__list-category"><a href="page-site-map.html">サイトマップ</a></p>
          </div>
          <div class="sp-nav__list-box">
            <p class="sp-nav__list-category "><a href="page-privacy.html">プライバシー<br class="u-mobile">ポリシー</a>
            </p>
          </div>
          <div class="sp-nav__list-box">
            <p class="sp-nav__list-category"><a href="page-terms.html">利用規約</a></p>
          </div>
          <div class="sp-nav__list-box">
            <p class="sp-nav__list-category"><a href="page-contact.html">お問い合わせ</a></p>
          </div>
        </nav>
      </div>
    </div>
  </header>