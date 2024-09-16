<!-- パンくず -->
<div class="breadcrumb <?php echo is_404() ? 'breadcrumb--404' : ''; ?>">
  <div class="breadcrumb__inner inner">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    } ?>
  </div>
</div>