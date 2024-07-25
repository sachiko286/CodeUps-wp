<?php get_header(); ?>

<main>

  <section class="sub-fv sub-fv--faq">
    <!-- <div class="sub-fv__inner"> -->
    <h2 class="sub-fv__title">FAQ</h2>
  </section>


  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <section class="page-faq top-page-faq">
    <div class="page-faq__inner inner">
      <ul class="page-faq__list faq-list">
        <?php $faqs = SCF::get('faq'); ?>
        <?php foreach ($faqs as $faq) : ?>
          <li class="faq-list__item">
            <h3 class="faq-list__item-question js-faq-question"><?php echo $faq['question']; ?></h3>
            <p class="faq-list__item-answer"><?php echo $faq['answer']; ?></p>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>
</main>


<?php get_footer(); ?>