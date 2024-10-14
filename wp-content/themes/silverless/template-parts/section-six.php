<section class="section--six container relative">
    <div class="row">

        <div class="image--text">


            <div class="image--text-block col-half">
                <?php if( have_rows('image_text_blocks') ): ?>
                <div class="image--text-image">
                   
                    <div class="image-holder sticky-image">
                         <div class="bird-morph">
                        <?php while( have_rows('image_text_blocks') ): the_row(); 
         $overlay = get_sub_field('overlay');
        ?>
                        <div class="overlay"><?php echo wp_get_attachment_image( $overlay, 'full' ); ?></div>
                        <?php endwhile; ?>
                    </div>
                        <?php while( have_rows('image_text_blocks') ): the_row(); 
        $image = get_sub_field('image');
        ?>
                        <?php echo wp_get_attachment_image( $image, 'full', false); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if( have_rows('image_text_blocks') ): ?>
                <div class="image--text-scroll">
                    <?php while( have_rows('image_text_blocks') ): the_row(); ?>
                    <p class="underscores"><?php echo esc_html( get_sub_field('top_marker') ); ?></p>
                    <h2 class="heading-4 heading-alt font--color-primary">
                        <?php echo esc_html( get_sub_field('title') ); ?></h2>
                    <?php the_sub_field('description'); ?>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>

        </div>


    </div>
</section>