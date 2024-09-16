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
      <?php $faqs = SCF::get('faq'); ?>

      <?php $has_faq = false; ?>

      <!-- 表示可能(Q&Aどちらも空でない)なQ&Aがあるか確認 。(Q&Aが全て空の場合エラーメッセージを出すために必要な処理)-->
      <?php foreach ($faqs as $faq) : ?>
        <?php if (!empty($faq['question']) && !empty($faq['answer'])) : //表示可能(Q&Aどちらも空でない)Q&Aがあるか ?>
          <?php $has_faq = true;  // 表示可能なQ&Aが見つかるとtrueに変更 ?>
          <?php break; // 1つでも表示可能なQ&Aが見つかればループを終了 (無駄にループを回すのを避けるため) ?>
        <?php endif; ?>
      <?php endforeach; ?>

      <?php if ($has_faq) : //表示可能なQ&Aがあれば表示、なければエラーメッセージを表示 ?>
        <ul class="page-faq__list faq-list">
          <?php foreach ($faqs as $faq) : ?>
            <?php if (!empty($faq['question']) && !empty($faq['answer'])) : //Q&Aどちらも空でないQ&Aがあれば表示 ?>
              <li class="faq-list__item">
                <h3 class="faq-list__item-question js-faq-question">
                  <?php echo esc_html($faq['question']); ?>
                </h3>
                <p class="faq-list__item-answer">
                  <?php echo esc_html($faq['answer']); ?>
                </p>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      <?php else : ?>
        <p class="non-message">準備中です。</p>
      <?php endif; ?>
    </div>
  </section>

</main>

<?php get_footer(); ?>