<?php get_header(); ?>
<main>

  <section class="sub-fv sub-fv--price">
    <!-- <div class="sub-fv__inner"> -->
    <h2 class="sub-fv__title">Price</h2>
  </section>


  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <div class="page-price top-page-price">
    <div class="page-price__inner inner">

      <!-- ライセンス料金表 -->
      <?php $licenses = SCF::get('license-table'); ?>
      <!-- 空でない値だけをフィルタリング -->
      <?php $filtered_licenses = array_filter($licenses, function ($license) {
        return !empty($license['course1']) && !empty($license['price1']);
      }); ?>

      <!-- 体験ダイビング料金表 -->
      <?php $experiences = SCF::get('experience-table'); ?>
      <!-- 空でない値だけをフィルタリング -->
      <?php $filtered_experiences = array_filter($experiences, function ($experience) {
        return !empty($experience['course2']) && !empty($experience['price2']);
      }); ?>

      <!-- ファンダイビング料金表 -->
      <?php $funs = SCF::get('fundiving-table'); ?>
      <!-- 空でない値だけをフィルタリング -->
      <?php $filtered_funs = array_filter($funs, function ($fun) {
        return !empty($fun['course3']) && !empty($fun['price3']);
      }); ?>

      <!-- スペシャルダイビング料金表 -->
      <?php $specials = SCF::get('specialdiving-table'); ?>
      <!-- 空でない値だけをフィルタリング -->
      <?php $filtered_specials = array_filter($specials, function ($special) {
        return !empty($special['course4']) && !empty($special['price4']);
      }); ?>

      <!-- いずれかの料金表データが存在するかどうかを判定 -->
      <?php if (!empty($filtered_licenses) || !empty($filtered_experiences) || !empty($filtered_funs) || !empty($filtered_specials)) : ?>

        <!-- ライセンス料金表 -->
        <!-- フィルタリングされた料金表が存在するか -->
        <?php if (!empty($filtered_licenses)) : ?>
          <div class="page-price__content price-table" id="price-license">
            <div class="price-table__title">ライセンス講習</div>
            <table class="price-table__body">
              <?php foreach ($filtered_licenses as $license) : ?>
                <tr>
                  <td class="price-table__course"><?php echo esc_html($license['course1']); ?></td>
                  <td class="price-table__fee"><?php echo esc_html($license['price1']); ?></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        <?php endif; ?>

        <!-- 体験ダイビング料金表 -->
        <?php if (!empty($filtered_experiences)) : ?>
          <div class="page-price__content price-table" id="price-experience">
            <div class="price-table__title">体験ダイビング</div>
            <table class="price-table__body">
              <?php foreach ($filtered_experiences as $experience) : ?>
                <tr>
                  <td class="price-table__course"><?php echo esc_html($experience['course2']); ?></td>
                  <td class="price-table__fee"><?php echo esc_html($experience['price2']); ?></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        <?php endif; ?>

        <!-- ファンダイビング料金表 -->
        <?php if (!empty($filtered_funs)) : ?>
          <div class="page-price__content price-table" id="price-fundiving">
            <div class="price-table__title">ファンダイビング</div>
            <table class="price-table__body">
              <?php foreach ($filtered_funs as $fun) : ?>
                <tr>
                  <td class="price-table__course"><?php echo esc_html($fun['course3']); ?></td>
                  <td class="price-table__fee"><?php echo esc_html($fun['price3']); ?></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        <?php endif; ?>

        <!-- スペシャルダイビング料金表 -->
        <?php if (!empty($filtered_specials)) : ?>
          <div class="page-price__content price-table" id="price-specialdiving">
            <div class="price-table__title">スペシャルダイビング</div>
            <table class="price-table__body">
              <?php foreach ($filtered_specials as $special) : ?>
                <tr>
                  <td class="price-table__course"><?php echo esc_html($special['course4']); ?></td>
                  <td class="price-table__fee"><?php echo esc_html($special['price4']); ?></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        <?php endif; ?>

      <?php else : ?>
        <!-- 全ての料金表が空の場合 -->
          <p class="non-message">準備中です</p>
      <?php endif; ?>

    </div>
  </div>


</main>

<?php get_footer(); ?>