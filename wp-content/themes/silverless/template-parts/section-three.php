<section class="section--three container relative">
    <div class="row col-10 col-half">
        <h2 class="heading-1 fm-left delay-2">
            <?php echo esc_html( get_field('three_title') ); ?>
        </h2>
        <div class="main-description fade-in delay-4">
            <?php the_field('three_description'); ?>
        </div>
    </div>
    <div class="background-image fade-in">
        <?php 
$image = get_field('background_image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}?>
    </div>
</section>