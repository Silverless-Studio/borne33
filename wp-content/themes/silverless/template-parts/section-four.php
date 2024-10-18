<section class="section--four container relative">
    <div class="row col-10 col-half">
        <div class="flask"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/img/flask.avif" /></div>
        <div class="image--text">
            <h2 class="heading-2">
                <?php echo esc_html(get_field('image_text')); ?>
            </h2>
            <div class="background--image">


                <div class="spin-me"><img
                        src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/img/wheel.avif" /></div>
                <div class="spin-me"><?php get_template_part('inc/img/runes'); ?></div>
            </div>
        </div>
        <div class="main-description fm-right">
            <h2 class="heading-4 heading-alt font--color-primary"><?php echo esc_html(get_field('four_title')); ?>
            </h2>
            <?php the_field('four_description'); ?>
        </div>

    </div>
</section>