<section class="section--seven container">
    <div class="row col-6 relative">
        <div class="background--image seven--two"><?php get_template_part('inc/img/cluster'); ?></div>
        <h2 class="heading-1 seven--one">
            <?php echo esc_html( get_field('quote') ); ?>
        </h2>
        <h3 class="heading-5 heading-alt  font--color-tertiary seven--three"><?php echo esc_html( get_field('cite') ); ?></h3>
        <div class="main-description seven--four">
            <p><?php echo wp_kses_post ( get_field('seven_description') ); ?></p>
        </div>
    </div>
</section>