<?php
$images = get_sub_field('images');
$random = rand();
$size = 'large';
if ($images): ?>
  <div
    class="image-element <?php the_sub_field('image_grid'); ?> <?php the_sub_field('grid_gap'); ?> <?php the_sub_field('padding_below'); ?>">
    <?php foreach ($images as $image_id): ?>
      <div class="img image-cover <?php the_sub_field('image_aspect'); ?>">
        <?php
        $image_url_full = wp_get_attachment_image_src($image_id, 'full')[0];
        $src = wp_get_attachment_image_url($image_id, 'large');
        $srcset = wp_get_attachment_image_srcset($image_id, 'large');
        $sizes = wp_get_attachment_image_sizes($image_id, 'large');
        ?>
        <a data-fslightbox="gallery-<?php echo $random; ?>" href="<?php echo $image_url_full; ?>" target="_blank">
          <img src="<?php echo esc_attr($src); ?>" srcset="<?php echo esc_attr($srcset); ?>"
            sizes="<?php echo esc_attr($sizes); ?>" alt="" loading="lazy" />
        </a>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>