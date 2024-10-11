<section class="section--eight container relative">
    <div class="row">
        <?php if( have_rows('image_block') ): ?>
        <div class="image--box">
            <?php 
            $counter = 0; // Initialize a counter for image--box-outer
            $grow_counter = 1; // Initialize a counter for grow-right starting with delay-1
            while( have_rows('image_block') ): the_row(); 
                $image = get_sub_field('image');
                $delay_class = $counter > 0 ? 'fm-right delay-' . ($counter * 2) : 'fade-in'; // Add delay class for image--box-outer
                $grow_delay_class = 'delay-' . $grow_counter; // Add delay class for grow-right
            ?>
            <div class="image--box-outer <?php echo $delay_class; ?>">
                <div class="spacer left">
                    <div class="top"></div>
                    <div class="bottom"></div>
                </div>
                <div class="content">
                    <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                    <p><?php echo acf_esc_html( get_sub_field('description') ); ?></p>
                </div>
                <div class="spacer right">
                    <div class="top"></div>
                    <div class="bottom"></div>
                </div>
            </div>
            <div class="filler grow-right <?php echo $grow_delay_class; ?>">
                <div class="top"></div>
                <div class="bottom"></div>
            </div>
            <?php 
            $counter++; // Increment the counter for image--box-outer delay
            $grow_counter+= 2; // Increment the grow-right delay for the next iteration
            endwhile; 
            ?>
        </div>
        <?php endif; ?>
    </div>
</section>