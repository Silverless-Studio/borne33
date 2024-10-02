<section class="section--nine container relative">
    
    <div class="row col-8">
        <h2 class="heading-1 heading-1--xl  font--color-primary">
        <?php echo esc_html( get_field('recipes_title') ); ?>
    </h2>
    <h3 class="heading-5 heading-alt"><?php echo esc_html( get_field('recipes_sub_title') ); ?></h3>
    </div>
    <div class="row extended">
        <?php
// Define the query parameters
$args = array(
    'post_type' => 'recipe', // Custom Post Type name
    'posts_per_page' => -1,  // Show all posts
);

// Create a new query for the custom post type 'recipe'
$recipe_query = new WP_Query($args);

// Check if there are posts in the query
if ($recipe_query->have_posts()) :?>
<div class="recipe-slider">
   <?php while ($recipe_query->have_posts()) : $recipe_query->the_post(); ?>
    
        <div class="recipe">
            <div class="col-half">
            <div class="image"> <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full'); // Full-size featured image ?>
            <?php endif; ?></div>
            <div class="details">
            <h2 class="heading-4 heading-alt"><?php the_title(); ?></h2>
            <h3 class="heading-5 heading-alt font--color-primary"><?php echo esc_html( get_field('ingredients_title') ); ?></h3>
            <div class="ingredients">
               <?php if( have_rows('ingredients') ): ?>
    <ul class="ingredients">
    <?php while( have_rows('ingredients') ): the_row();?>
        <li>
            <?php echo esc_html( get_sub_field('ingredient') ); ?>
        </li>
    <?php endwhile; ?>
    </ul>
<?php endif; ?>
            </div>

<div class="method">
               <?php if( have_rows('method') ): ?>
    <ol class="method">
    <?php while( have_rows('method') ): the_row();?>
        <li>
            <?php echo esc_html( get_sub_field('step') ); ?>
        </li>
    <?php endwhile; ?>
    </ol>
<?php endif; ?>
            </div>
</div>
            </div>
        </div>

    <?php endwhile; ?>
    </div>
<?php endif;

// Restore original post data (important after a custom query)
wp_reset_postdata();
?>
    </div>
</section>