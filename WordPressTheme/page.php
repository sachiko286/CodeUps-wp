<?php get_header(); ?>

<section class="sub-fv sub-fv--sitemap">
  <!-- <div class="sub-fv__inner"> -->
  <h2 class="sub-fv__title">
    <?php $fv_title = get_field('fv_title'); ?>
    <?php echo $fv_title; ?>
  </h2>
</section>


<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>


<section class="page-privacy top-page-privacy">
  <div class="page-privacy__inner inner">
    <?php if (have_posts()) :
      while (have_posts()) :
        the_post(); ?>
        <h2 class="page-privacy__title">
          <?php the_title(); ?>
        </h2>
        <div class="page-privacy__body">
          <?php the_content(); ?>
        </div>
    <?php endwhile;
    endif; ?>
  </div>
</section>


<?php get_footer(); ?>