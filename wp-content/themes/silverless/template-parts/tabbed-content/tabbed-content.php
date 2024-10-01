<?php


$post_id = get_the_ID();

?>

<section class="<?php echo get_container_classes(['section-tabbed-content']); ?>"
  style="<?php echo get_container_styles(); ?>">
  <div class="<?php echo get_row_classes(['tabbed-content']); ?>">
    <div class="tabbed-content__tabs">
      <?php if (have_rows('tabs')) { ?>
        <?php while (have_rows('tabs')) { ?>
          <?php
          the_row();
          $index = get_row_index();
          $title = get_sub_field('title');
          $tab_class = "tabbed-content__tab";
          if ($index == 1) {
            $tab_class .= " active";
          }
          ?>
          <div class="<?php echo $tab_class; ?>" data-tab="<?php echo $index; ?>">
            <h3 class="heading heading__lg">
              <?php echo $title; ?>
            </h3>
            <?php echo get_template_part('/inc/img/arrow'); ?>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
    <div class="tabbed-content__content-container">
      <?php if (have_rows('tabs')) { ?>
        <?php while (have_rows('tabs')) { ?>
          <?php
          the_row();
          $index = get_row_index();
          ?>
          <div class="tabbed-content__content" data-tab="<?php echo $index; ?>">
            <?php
            if (have_rows('tabbed_elements')):
              while (have_rows('tabbed_elements')):
                the_row();
                $row_layout = get_row_layout();
                $row_layout = str_replace('_', '-', $row_layout);
                get_template_part("template-parts/$row_layout/$row_layout");
              endwhile;
            endif;
            ?>
          </div>
        <?php } ?>
      <?php } ?>
      <?php get_template_part('template-parts/additional-artwork', null, ['field_prefix' => 'content']); ?>
    </div>
  </div>
</section>