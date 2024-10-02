<section class="section--seven container relative">
    
    <div class="row col-6">
         <h2 class="heading-1">
        <?php echo esc_html( get_field('quote') ); ?>
    </h2>
   
        <h3 class="heading-5 heading-alt  font--color-tertiary"><?php echo esc_html( get_field('cite') ); ?></h3>
         <div class="main-description">
        <p><?php echo wp_kses_post ( get_field('seven_description') ); ?></p>
    </div>
    </div>
   
    </div>
</section>