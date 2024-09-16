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
      <?php $has_license_data = false; ?>
      
      <!-- 表示可能(コース名と金額の入力がどちらも空でない)な料金表があるか確認(price-table__contentとエラーメッセージの表示・非表示に関する処理に必要） -->
      <?php foreach ($licenses as $license) : ?>
        <?php if (!empty($license['course1']) && !empty($license['price1'])) : //表示可能(コース名と金額の入力がどちらも空でない)な料金表があるか
        ?>
          <?php $has_license_data = true; // 表示可能な料金表が見つかるとtrueに変更
          ?>
          <?php break; // 1つでも表示可能な料金表が見つかればループを終了 (無駄にループを回すのを避けるため)
          ?>
        <?php endif; ?>
      <?php endforeach; ?>

      <?php if ($has_license_data) : //タイトル部分のみ残らないようにここから条件分岐 
      ?>
        <div class="page-price__content price-table" id="price-license">
          <div class="price-table__title">ライセンス講習</div>
          <table class="price-table__body">
            <?php foreach ($licenses as $license) : ?>
              <?php if (!empty($license['course1']) && !empty($license['price1'])) : //コース名と金額の入力がどちらも空でない料金表があるか 
              ?>
                <tr>
                  <td class="price-table__course"><?php echo esc_html($license['course1']); ?></td>
                  <td class="price-table__fee"><?php echo esc_html($license['price1']); ?></td>
                </tr>
              <?php endif; ?>
            <?php endforeach; ?>
          </table>
        </div>
      <?php endif; ?>

      <!-- 体験ダイビング料金表 -->
      <?php $experiences = SCF::get('experience-table'); ?>
      <?php $has_experience_data = false; ?>
      <!-- 表示可能(コース名と金額の入力がどちらも空でない)な料金表があるか確認(カテゴリタイトル非表示とエラーメッセージの表示・非表示に関する処理に必要） -->
      <?php foreach ($experiences as $experience) : ?>
        <?php if (!empty($experience['course2']) && !empty($experience['price2'])) : //表示可能(コース名と金額の入力がどちらも空でない)な料金表があるか 
        ?>
          <?php $has_experience_data = true;  // 表示可能な料金表が見つかるとtrueに変更 
          ?>
          <?php break; // 1つでも表示可能な料金表が見つかればループを終了 (無駄にループを回すのを避けるため) 
          ?>
        <?php endif; ?>
      <?php endforeach; ?>

      <?php if ($has_experience_data) : //タイトル部分のみ残らないようにここから条件分岐 
      ?>
        <div class="page-price__content price-table" id="price-experience">
          <div class="price-table__title">体験ダイビング</div>
          <table class="price-table__body">
            <?php foreach ($experiences as $experience) : ?>
              <?php if (!empty($experience['course2']) && !empty($experience['price2'])) : //コース名と金額の入力がどちらも空でない料金表があるか 
              ?>
                <tr>
                  <td class="price-table__course"><?php echo esc_html($experience['course2']); ?></td>
                  <td class="price-table__fee"><?php echo esc_html($experience['price2']); ?></td>
                </tr>
              <?php endif; ?>
            <?php endforeach; ?>
          </table>
        </div>
      <?php endif; ?>

      <!-- ファンダイビング料金表 -->
      <?php $funs = SCF::get('fundiving-table'); ?>
      <?php $has_fun_data = false; ?>
      <!-- 表示可能な料金表(コース名と金額の入力がどちらも空でない)があるか確認(カテゴリタイトル非表示とエラーメッセージの表示・非表示に関する処理に必要） -->
      <?php foreach ($funs as $fun) : ?>
        <?php if (!empty($fun['course3']) && !empty($fun['price3'])) : //表示可能な料金表(コース名と金額の入力がどちらも空でない)があるか
        ?>
          <?php $has_fun_data = true; // 表示可能な料金表が見つかるとtrueに変更
          ?>
          <?php break; // 1つでも表示可能な料金表が見つかればループを終了 (無駄にループを回すのを避けるため)
          ?>
        <?php endif; ?>
      <?php endforeach; ?>

      <?php if ($has_fun_data) : //タイトル部分のみ残らないようにここから条件分岐 
      ?>
        <div class="page-price__content price-table" id="price-fundiving">
          <div class="price-table__title">ファンダイビング</div>
          <table class="price-table__body">
            <?php foreach ($funs as $fun) : ?>
              <?php if (!empty($fun['course3']) && !empty($fun['price3'])) : //コース名と金額の入力がどちらも空でない料金表があるか 
              ?>
                <tr>
                  <td class="price-table__course"><?php echo esc_html($fun['course3']); ?></td>
                  <td class="price-table__fee"><?php echo esc_html($fun['price3']); ?></td>
                </tr>
              <?php endif; ?>
            <?php endforeach; ?>
          </table>
        </div>
      <?php endif; ?>

      <!-- スペシャルダイビング料金表 -->
      <?php $specials = SCF::get('specialdiving-table'); ?>
      <?php $has_special_data = false; ?>
      <!-- 表示可能な料金表(コース名と金額の入力がどちらも空でない)があるか確認(カテゴリタイトル非表示とエラーメッセージの表示・非表示に関する処理に必要） -->
      <?php foreach ($specials as $special) : ?>
        <?php if (!empty($special['course4']) && !empty($special['price4'])) : //表示可能な料金表(コース名と金額の入力がどちらも空でない)があるか 
        ?>
          <?php $has_special_data = true; // 表示可能な料金表が見つかるとtrueに変更 
          ?>
          <?php break; // 1つでも表示可能な料金表が見つかればループを終了 (無駄にループを回すのを避けるため) 
          ?>
        <?php endif; ?>
      <?php endforeach; ?>

      <?php if ($has_special_data) : //タイトル部分のみ残らないようにここから条件分岐 
      ?>
        <div class="page-price__content price-table" id="price-specialdiving">
          <div class="price-table__title">スペシャルダイビング</div>
          <table class="price-table__body">
            <?php foreach ($specials as $special) : ?>
              <?php if (!empty($special['course4']) && !empty($special['price4'])) : //コース名と金額の入力がどちらも空でない料金表があるか 
              ?>
                <tr>
                  <td class="price-table__course"><?php echo esc_html($special['course4']); ?></td>
                  <td class="price-table__fee"><?php echo esc_html($special['price4']); ?></td>
                </tr>
              <?php endif; ?>
            <?php endforeach; ?>
          </table>
        </div>
      <?php endif; ?>

      <!-- 全ての料金表が空だった場合にエラーメッセージを表示 -->
      <?php if (!$has_license_data && !$has_experience_data && !$has_fun_data && !$has_special_data) : ?>
        <p class="non-message non-message--top">準備中です</p>
      <?php endif; ?>
      
    </div>
  </div>

</main>

<?php get_footer(); ?>