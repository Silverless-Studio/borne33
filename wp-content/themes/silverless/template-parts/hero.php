<div class="background--image-bottle"><?php
$image = get_field('bottle', 'options');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if ($image) {
    echo wp_get_attachment_image($image, $size);
} ?><div class="dark-gradient"></div>
</div>
<div class="background--image-main"><?php
$image = get_field('background_image', 'options');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if ($image) {
    echo wp_get_attachment_image($image, $size);
} ?></div>
<section class="hero container">
    <div class="row">
        <div class="hero--text hero-fm-top">
            <div class="white-line">
                <div class="line"></div>
            </div>
            <h3 class="heading-5 heading-alt font--color-primary"><?php echo esc_html(get_field('top_tagline')); ?>
            </h3>
            <div class="logo">
                <?php get_template_part('inc/img/logo-main'); ?>
            </div>
            <h2 class="heading-4 heading-alt"><?php echo esc_html(get_field('bottom_tagline')); ?>
            </h2>
            <div class="hero--text-buttons">
                <?php
                $buttonOne = get_field('button_one');
                if ($buttonOne): ?>
                    <a class="button button--<?php echo esc_html($buttonOne['button_type']); ?>"
                        href="<?php echo esc_url($buttonOne['link']['url']); ?>"><?php echo esc_html($buttonOne['link']['title']); ?><?php get_template_part('inc/img/glass'); ?></a>
                <?php endif; ?>

                <?php
                $buttontwo = get_field('button_two');
                if ($buttontwo): ?>
                    <a class="button button--<?php echo esc_html($buttontwo['button_type']); ?> link-two"
                        href="<?php echo esc_url($buttontwo['link']['url']); ?>"><?php echo esc_html($buttontwo['link']['title']); ?><?php get_template_part('inc/img/arrow'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>