<section class="section--five container relative">
    
    <div class="row col-6">
         <h2 class="heading-1 font--color-primary">
        <?php echo esc_html( get_field('five_title') ); ?>
    </h2>
   
        <h3 class="heading-4 heading-alt font--color-secondary"><?php echo esc_html( get_field('five_title_sub') ); ?></h3>
         <div class="main-description">
        <?php the_field('five_description'); ?>
    </div>
    </div>
   
    </div>
</section>