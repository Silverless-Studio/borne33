<?php

/**
 * ============== Template Name: Home Page
 *
 * @package silverless
 */

get_header();

?>

<?php get_template_part('template-parts/hero');?>
<?php get_template_part('template-parts/section-two');?>
<section class="section--three container relative">
    
    <div class="row col-10 col-half">
         <h2 class="heading-1">
        <?php echo esc_html( get_field('three_title') ); ?>
    </h2>
    <div class="main-description">
        <?php the_field('three_description'); ?>
    </div>
    </div>
     <div class="background-image">
        <?php 
$image = get_field('background_image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}?>
    </div>
</section>

<?php get_footer(); ?>