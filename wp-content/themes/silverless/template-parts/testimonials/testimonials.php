<?php

$cta_size = get_sub_field('cta_size');
$use_default_testimonial_content = get_sub_field('use_default_testimonial_content');

$post_id = 'options';

if (!$use_default_testimonial_content) {
  $post_id = get_the_ID();
}

?>


<section class="<?php echo get_container_classes(['section-testimonials']); ?>"
  style="<?php echo get_container_styles(); ?>">
  <?php if (have_rows('testimonials', $post_id)) { ?>
    <div class="<?php echo get_row_classes(['testimonials']); ?>">
      <div class="testimonials__wrapper">
        <div class="testimonials__navigation">
          <div class="testimonials__navigation__box testimonials__navigation__previous">
            <?php echo get_template_part('/inc/img/arrow'); ?>
          </div>
          <div class="testimonials__navigation__box testimonials__navigation__next">
            <?php echo get_template_part('/inc/img/arrow'); ?>
          </div>
        </div>
        <div class="testimonials__slider">
          <?php while (have_rows('testimonials', $post_id)) { ?>
            <?php
            the_row();
            $testimonial = get_sub_field('testimonial');
            $author = get_sub_field('author');
            ?>
            <div class="testimonials__content">

              <div
                class="testimonials__testimonial font__color__tertiary font__style__italic font__weight__light heading heading__lg">
                <?php echo $testimonial; ?>
              </div>
              <p class="testimonials__author font__color__primary small">
                <?php echo $author; ?>
              </p>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
</section>