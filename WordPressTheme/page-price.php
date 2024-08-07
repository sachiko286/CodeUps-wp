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
      <div class="page-price__content price-table" id="price-license">
        <div class="price-table__title">ライセンス講習</div>
        <table class="price-table__body">
          <?php $licenses = SCF::get('license-table'); ?>
          <?php foreach ($licenses as $license) : ?>
            <tr>
              <td class="price-table__course"><?php echo $license['course1']; ?></td>
              <td class="price-table__fee">¥<?php echo number_format($license['price1']); ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>


      <div class="page-price__content price-table" id="price-experience">
        <div class="price-table__title">体験ダイビング</div>
        <table class="price-table__body">
          <?php $experiences = SCF::get('experience-table'); ?>
          <?php foreach ($experiences as $experience) : ?>
            <tr>
              <td class="price-table__course"><?php echo $experience['course2']; ?></td>
              <td class="price-table__fee">¥<?php echo number_format($experience['price2']); ?></td>
            </tr>
          <?php endforeach; ?>
        </table>

      </div>

      <div class="page-price__content price-table" id="price-fundiving">
        <div class="price-table__title">ファンダイビング</div>
        <table class="price-table__body">
          <?php $funs = SCF::get('fundiving-table'); ?>
          <?php foreach ($funs as $fun) : ?>
            <tr>
              <td class="price-table__course"><?php echo $fun['course3']; ?></td>
              <td class="price-table__fee">¥<?php echo number_format($fun['price3']); ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>

      <div class="page-price__content price-table">
        <div class="price-table__title">スペシャルダイビング</div>
        <table class="price-table__body">
          <?php $specials = SCF::get('specialdiving-table'); ?>
          <?php foreach ($specials as $special) : ?>
            <tr>
              <td class="price-table__course"><?php echo $special['course4']; ?></td>
              <td class="price-table__fee">¥<?php echo number_format($special['price4']); ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>