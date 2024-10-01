<section class="<?php echo get_container_classes(['section-accordion']); ?>"
  style="<?php echo get_container_styles(); ?>" data-auto-close="<?php the_sub_field('auto_close'); ?>">
  <div class="<?php echo get_row_classes(); ?>">
    <?php if (have_rows('records')) { ?>
      <div class="accordion">
        <?php while (have_rows('records')) { ?>
          <?php
          the_row();
          $title = get_sub_field('title');
          $content = get_sub_field('content');
          ?>
          <div class="accordion__record">
            <div class="accordion__heading">
              <h3 class=" heading heading__lg font__color__primary">
                <?php echo $title; ?>
              </h3>
              <?php echo get_template_part('/inc/img/arrow'); ?>
            </div>
            <div class="accordion__content">
              <?php echo $content; ?>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</section>