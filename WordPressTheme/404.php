<?php get_header(); ?>

<?php include 'urls.php'; ?>
<main>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>


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