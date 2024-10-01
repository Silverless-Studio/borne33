<div
  class="image-element <?php the_sub_field('image_grid'); ?> <?php the_sub_field('grid_gap'); ?> <?php the_sub_field('padding_below'); ?>">
  <?php if (have_rows('cards')): ?>
    <?php while (have_rows('cards')):
      the_row();
      $image = get_sub_field('image');
      ?>
      <div class="cards">
        <div class="image-cover">
          <?php echo wp_get_attachment_image($image, 'full'); ?>
        </div>
        <div class="card-content">
          <h2 class="heading-3"><?php echo acf_esc_html(get_sub_field('title')); ?></h2>
          <div class="body">
            <p><?php the_sub_field('description'); ?></p>
          </div>
          <?php
          $link = get_sub_field('link');
          if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="button--cross" href="<?php echo esc_url($link_url); ?>"
              target="<?php echo esc_attr($link_target); ?>"><span class="text">Find Out
                More</span> <span class="square"><?php echo get_template_part('/inc/img/linkanim'); ?></span></a>
          <?php endif; ?>

        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</div>