<section class="section--eight container relative">
    <div class="row">
        <?php if( have_rows('image_block') ): ?>
        <div class="image--box">
            <?php while( have_rows('image_block') ): the_row(); 
        $image = get_sub_field('image');
        ?>
            <div class="image--box-outer">
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
            <div class="filler">
                <div class="top"></div>
                <div class="bottom"></div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>