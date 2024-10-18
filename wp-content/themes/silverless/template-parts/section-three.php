<section class="section--three container relative">
      <div class="background-image step--one">
        <?php 
$image = get_field('background_image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}?>
    </div>
    <div class="row col-10 col-half">
        <h2 class="heading-1 step--two">
            <?php echo esc_html( get_field('three_title') ); ?>
        </h2>
        <div class="main-description step--three">
            <?php the_field('three_description'); ?>
        </div>
    </div>
  
</section>