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

<?php if (!is_page('contact') && !is_404()) : ?>
  <section class="contact sub-contact">
    <div class="contact__inner inner">
      <div class="contact__content">
        <div class="contact__access">
          <div class="contact__company">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-gr.svg" alt="社名ロゴ">
          </div>
          <div class="contact__address">
            <div class="contact__text">
              <address>
                <p class="contact__text-item">沖縄県那覇市1-1</p>
                <p class="contact__text-item">TEL:0120-000-0000</p>
              </address>
              <p class="contact__text-item">営業時間:8:30-19:00</p>
              <p class="contact__text-item">定休日:毎週火曜日</p>
            </div>
            <div class="contact__map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57273.02319561895!2d127.6435022806094!3d26.210859430275388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e5697141a6b58b%3A0x2cd8aff616585e98!2z5rKW57iE55yM6YKj6KaH5biC!5e0!3m2!1sja!2sjp!4v1707313584106!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
        <div class="contact__info">
          <div class="contact__info-header section-header">
            <p class="section-header__engtitle"><span>C</span>ontact</p>
            <h2 class="section-header__jatitle">お問い合わせ</h2>
          </div>
          <div class="contact__info-text">ご予約・お問い合わせはコチラ</div>
          <div class="contact__info-button">
            <a href="<?php echo $contact; ?>" class="button slide">Contact us<span class="button__arrow"></span></a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<footer class="footer top-footer <?php if (is_404()) { echo 'top-footert--mt0'; } ?>">
  <div class="footer__inner inner">
    <div class="footer__heater">
      <div class="footer__title">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-w.svg" alt="会社ロゴホワイト">
      </div>
      <div class="footer__sns">
        <a class="footer__sns-facebook" href="#"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/FacebookLogo.png" alt="フェイスブックロゴ"></a>
        <a class="footer__sns-insta" href="#"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/insta.png" alt="インスタロゴ"></a>
      </div>
    </div>
    <nav class="footer__nav sp-nav">
      <div class="sp-nav__list-box">
        <p class="sp-nav__list-category"><a href="<?php echo $campaign; ?>">キャンペーン</a></p>
        <ul class="sp-nav__list-items">
          <li class="sp-nav__list-item"><a href="<?php echo add_query_arg('campaign_category', 'license', $campaign); ?>">ライセンス講習</a></li>
          <li class="sp-nav__list-item"><a href="<?php echo add_query_arg('campaign_category', 'experience', $campaign); ?>">体験ダイビング</a></li>
          <li class="sp-nav__list-item"><a href="<?php echo add_query_arg('campaign_category', 'fundiving', $campaign); ?>">ファンダイビング</a></li>
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
          <!-- <li class="sp-nav__list-item"><a href="#">スペシャルダイビング</a></li> -->
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
  <div class="footer__copyright">
    <p>Copyright © 2021 - 2023 CodeUps LLC. All Rights Reserved.</p>
  </div>
</footer>

<div class="page-top top-page-top js-page-top">
  <div class="page-top__yazirusi"></div>
</div>

<?php wp_footer(); ?>
</body>

</html>