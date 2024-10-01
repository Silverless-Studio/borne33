<section class="<?php echo get_container_classes(['section-content-blocks']); ?>"
  style="<?php echo get_container_styles(); ?>">
  <div class="<?php echo get_row_classes(); ?>">
    <?php if (have_rows('content_blocks')): ?>
      <?php while (have_rows('content_blocks')): ?>
        <?php
        the_row();
        $layout = get_row_layout();
        $layout = str_replace('_', '-', $layout);
        get_template_part("template-parts/$layout/$layout");
        ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>