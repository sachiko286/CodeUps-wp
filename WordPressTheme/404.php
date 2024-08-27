<?php get_header(); ?>

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

<main>

<div class="breadcrumb breadcrumb--404">
  <div class="breadcrumb__inner inner">
    <ol class="breadcrumb__list">
      <li class="breadcrumb__list-item"><a href="/">TOP</a></li>
      <li class="breadcrumb__list-item"><a href="/category">404</a></li>
    </ol>
  </div>
</div>

<div class="page-404 top-page-404">
  <div class="page-404__inner inner">
    <p class="page-404__title">
      404
    </p>
    <p class="page-404__text">
      申し訳ありません。<br>お探しのページが見つかりません。
    </p>
    <div class="page-404__button">
      <a href="<?php echo $home; ?>" class="button--white slide">Page TOP<span class="button__arrow--white"></span></a>
    </div>
  </div>
</div>

</main>

<?php get_footer(); ?>