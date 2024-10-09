<section class="section--four container relative">
    <div class="row col-10 col-half">
        <div class="image--text">
            <h2 class="heading-3 fm-left">
                <?php echo esc_html( get_field('image_text') ); ?>
            </h2>
            <div class="background--image"><?php get_template_part('inc/img/flask'); ?></div>
        </div>
        <div class="main-description fm-right">
            <h2 class="heading-4 heading-alt font--color-primary"><?php echo esc_html( get_field('four_title') ); ?>
            </h2>
            <?php the_field('four_description'); ?>
        </div>

    </div>
</section>