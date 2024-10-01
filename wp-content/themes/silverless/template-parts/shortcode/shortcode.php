<section class="container section-shortcode">
  <div class="<?php echo get_row_classes(); ?>">
    <div class="short-code">
      <?php
      if (get_sub_field('shortcode')) {
        echo do_shortcode(get_sub_field('shortcode'));
      }
      ?>
    </div>
  </div>
</section>