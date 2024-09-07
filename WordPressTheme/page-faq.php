<?php get_header(); ?>

<main>

  <section class="sub-fv sub-fv--faq">
    <!-- <div class="sub-fv__inner"> -->
    <h2 class="sub-fv__title">FAQ</h2>
  </section>


  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <section class="page-faq top-page-faq">
    <?php
    // FAQデータの取得
    $faqs = SCF::get('faq'); ?>
    <?php
    // FAQが存在するか確認し、条件に合う項目だけをフィルタリング
    $filtered_faqs = array_filter($faqs, function ($faq) {
      return !empty($faq['question']) && !empty($faq['answer']);
    }); ?>

    <div class="page-faq__inner inner">
      <!-- フィルタリングされたFAQが存在するか -->
      <?php if (!empty($filtered_faqs)) : ?>
        <ul class="page-faq__list faq-list">
          <?php foreach ($filtered_faqs as $faq) : ?>
            <li class="faq-list__item">
              <h3 class="faq-list__item-question js-faq-question">
                <?php echo esc_html($faq['question']); ?>
              </h3>
              <p class="faq-list__item-answer">
                <?php echo esc_html($faq['answer']); ?>
              </p>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else : ?>
        <p>質問はありません。</p>
      <?php endif; ?>
    </div>
  </section>




</main>


<?php get_footer(); ?>