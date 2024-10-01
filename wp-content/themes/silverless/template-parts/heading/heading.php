<h2 class="<?php the_sub_field('heading_size'); ?> <?php the_sub_field('align'); ?> <?php the_sub_field('colour'); ?> <?php
         if (get_sub_field('uppercase')) {
           echo 'font-upper';
         } ?>  <?php the_sub_field('padding_below'); ?>">
  <?php echo esc_html(get_sub_field('heading')); ?>
</h2>