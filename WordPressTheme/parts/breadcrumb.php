<!-- パンくず -->
<div class="breadcrumb <?php if (is_404()) { echo 'breadcrumb--404'; } ?>">
  <div class="breadcrumb__inner inner">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    } ?>
  </div>
</div>