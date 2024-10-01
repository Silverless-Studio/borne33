<?php

$gallery = get_sub_field('gallery');
$show_captions = get_sub_field('show_captions');
$random = rand();

?>

<section class="<?php echo get_container_classes(['section-carousel']); ?>"
  style="<?php echo get_container_styles(); ?>">
  <?php if ($gallery) { ?>
    <div class="<?php echo get_row_classes(['carousel__slider', 'carousel__images']); ?>">
      <?php foreach ($gallery as $image) { ?>
        <?php
        $src = wp_get_attachment_image_url($image['ID'], 'large');
        $srcset = wp_get_attachment_image_srcset($image['ID'], 'large');
        $sizes = wp_get_attachment_image_sizes($image['ID'], 'large');
        ?>
        <div>
          <div class="fade-target carousel__image">
            <img src="<?php echo esc_attr($src); ?>" srcset="<?php echo esc_attr($srcset); ?>"
              sizes="<?php echo esc_attr($sizes); ?>" alt="" loading="lazy" class="fade" />
            <?php if ($show_captions && $image['caption']) { ?>
              <p class="caption heading heading__xs">
                <?php echo $image['caption']; ?>
              </p>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="carousel__navigation row">
      <div class="carousel__navigation__box carousel__navigation__previous">
        <?php echo get_template_part('/inc/img/arrow'); ?>
      </div>
      <div class="carousel__navigation__box carousel__navigation__next">
        <?php echo get_template_part('/inc/img/arrow'); ?>
      </div>
    </div>
  <?php } ?>
</section>