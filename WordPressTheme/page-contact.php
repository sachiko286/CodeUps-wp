<?php get_header(); ?>
<main>

  <section class="sub-fv sub-fv--contact">
    <!-- <div class="sub-fv__inner"> -->
    <h2 class="sub-fv__title sub-fv__title--contact">Contact</h2>
  </section>


  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <div class="page-contact top-page-contact">
    <div class="page-contact__inner inner">
      <?php echo do_shortcode('[contact-form-7 id="62617b1" title="コンタクトフォーム 1"]'); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>