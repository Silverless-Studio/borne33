<div
  class="image-element <?php the_sub_field('image_grid'); ?> <?php the_sub_field('grid_gap'); ?> <?php the_sub_field('padding_below'); ?>">
  <?php if (have_rows('awards')): ?>
    <?php while (have_rows('awards')):
      the_row();
      $image = get_sub_field('icon');
      $src = wp_get_attachment_image_url($image, 'large');
      $srcset = wp_get_attachment_image_srcset($image, 'large');
      $sizes = wp_get_attachment_image_sizes($image, 'large');
      ?>
      <div class="award">
        <img src="<?php echo esc_attr($src); ?>" srcset="<?php echo esc_attr($srcset); ?>"
          sizes="<?php echo esc_attr($sizes); ?>" alt="" loading="lazy" />
        <h3 class="heading-5--awards"><span
            class="color-primary heading-5"><?php echo acf_esc_html(get_sub_field('highlight')); ?></span>
          <?php echo acf_esc_html(get_sub_field('title')); ?>
        </h3>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</div>