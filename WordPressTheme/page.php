<?php get_header(); ?>

<section class="sub-fv sub-fv--sitemap">
    <!-- <div class="sub-fv__inner"> -->
    <h2 class="sub-fv__title">Privacy Policy</h2>
  </section>


  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>


  <section class="page-privacy top-page-privacy">
    <div class="page-privacy__inner inner">
    <?php the_content(); ?>
    </div>
  </section>


<?php get_footer(); ?>