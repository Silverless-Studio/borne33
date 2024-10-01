<?php

$cta_size = get_sub_field('cta_size');
$use_default_cta_content = get_sub_field('use_default_cta_content');

if ($use_default_cta_content) {
    $image = get_field('image', 'options');
    $title = get_field('title', 'options');
    $subtitle = get_field('subtitle', 'options');
    $button_link = get_field('button_link', 'options');
} else {
    $image = get_sub_field('image');
    $title = get_sub_field('title');
    $subtitle = get_sub_field('subtitle');
    $button_link = get_sub_field('button_link');
}

?>

<section class="<?php echo get_container_classes(['section-cta']); ?>" style="<?php echo get_container_styles(); ?>">
    <div class="<?php echo get_row_classes(['cta', 'cta__wrapper', $cta_size, 'fade-target']); ?>">
        <div class="cta__image">
            <img class="fade" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
        </div>
        <div class="cta__content">
            <h2 class="heading heading__underline font__color__white heading__xl">
                <?php echo $title; ?>
            </h2>
            <?php if ($subtitle) { ?>
                <h3 class="heading heading__xs font__color__white">
                    <?php echo $subtitle; ?>
                </h3>
            <?php } ?>
            <?php if ($button_link) { ?>
                <a href="<?php echo $button_link['url']; ?>" target="<?php echo $button_link['target']; ?>" class="button">
                    <?php echo $button_link['title']; ?>
                </a>
            <?php } ?>
        </div>
    </div>
</section>