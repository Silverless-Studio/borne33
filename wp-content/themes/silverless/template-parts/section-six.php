<section class="section--six container relative">
    <div class="row">
        <div class="image--text">
            <div class="image--text-block col-half">
                <?php if( have_rows('image_text_blocks') ): ?>
                <div class="image--text-image">

                    <div class="image-holder sticky-image">
                      <div class="main-image">
    <?php 
    $counter = 1; // Initialize a counter
    while( have_rows('image_text_blocks') ): the_row(); 
        $image = get_sub_field('image');
    ?>
        <div class="main-image-<?php echo $counter; ?>">
            <?php echo wp_get_attachment_image( $image, 'full', false ); ?>
        </div>
    <?php 
        $counter++; // Increment the counter
    endwhile; 
    ?>
</div>

<div class="bird-morph">
    <?php 
    $counter = 1; // Re-initialize the counter for overlays
    while( have_rows('image_text_blocks') ): the_row(); 
        $overlay = get_sub_field('overlay');
    ?>
        <div class="overlay overlay-<?php echo $counter; ?>">
            <?php echo wp_get_attachment_image( $overlay, 'full' ); ?>
        </div>
    <?php 
        $counter++; // Increment the counter
    endwhile; 
    ?>
</div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if( have_rows('image_text_blocks') ): ?>
                <div class="image--text-scroll fm-right">
                    <?php $counter = 1;
                     while( have_rows('image_text_blocks') ): the_row(); ?>
                     <div class="text--block-<?php echo $counter; ?>">
                    <p class="underscores"><?php echo esc_html( get_sub_field('top_marker') ); ?></p>
                    <h2 class="heading-4 heading-alt font--color-primary">
                        <?php echo esc_html( get_sub_field('title') ); ?></h2>
                    <?php the_sub_field('description'); ?>
                    </div>
                    <?php  $counter++;
                 endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>