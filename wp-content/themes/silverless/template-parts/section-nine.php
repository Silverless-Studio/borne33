<section class="section--nine container relative">
    <div class="row relative recipe-intro">
        <div class="background--image"><?php get_template_part('inc/img/hand'); ?></div>
        <h2 class="heading-1 heading-1--xl  font--color-primary fm-right">
            <?php echo esc_html(get_field('recipes_title')); ?>
        </h2>
        <p>
            <?php echo esc_html(get_field('recipes_sub_title')); ?>
        </p>
    </div>
    <div class="row extended relative">
        <?php
        // Define the query parameters
        $args = array(
            'post_type' => 'recipe', // Custom Post Type name
            'posts_per_page' => -1,  // Show all posts
        );
        // Create a new query for the custom post type 'recipe'
        $recipe_query = new WP_Query($args);
        // Check if there are posts in the query
        if ($recipe_query->have_posts()): ?>
            <div class="recipe-slider">
                <?php while ($recipe_query->have_posts()):
                    $recipe_query->the_post(); ?>
                    <div class="recipe">
                        <?php echo get_template_part('/inc/img/slider-text'); ?>
                        <div class="col-half">
                            <div class="image"> <?php if (has_post_thumbnail()): ?>
                                    <?php echo get_template_part('/inc/img/slider-three'); ?>
                                    <?php echo get_template_part('/inc/img/slider-four'); ?>
                                    <?php echo get_template_part('/inc/img/slider-five'); ?>
                                    <?php the_post_thumbnail('full'); // Full-size featured image ?>
                                <?php endif; ?></div>
                            <div class="details">
                                <?php echo get_template_part('/inc/img/slider-one'); ?>
                                <h2 class="heading-4 heading-alt underscores underscores--long"><?php the_title(); ?></h2>
                                <h3 class="heading-5 heading-alt font--color-primary">
                                    <?php echo esc_html(get_field('ingredients_title')); ?></h3>
                                <div class="ingredients">

                                    <?php echo get_template_part('/inc/img/slider-two'); ?>
                                    <?php if (have_rows('ingredients')): ?>
                                        <ul class="ingredient--items">
                                            <?php while (have_rows('ingredients')):
                                                the_row(); ?>
                                                <li>
                                                    <?php echo esc_html(get_sub_field('ingredient')); ?>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                                <div class="method">
                                    <?php if (have_rows('method')): ?>
                                        <ol class="method--items">
                                            <?php while (have_rows('method')):
                                                the_row(); ?>
                                                <li>
                                                    <?php echo esc_html(get_sub_field('step')); ?>
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
            <div class="slider--nav row">
                <div class="slider--nav-previous">
                    <?php echo get_template_part('/inc/img/slider-arrow'); ?>
                </div>
                <div class="slider--nav-next">
                    <?php echo get_template_part('/inc/img/slider-arrow'); ?>
                </div>
            </div>
        <?php endif;
        // Restore original post data (important after a custom query)
        wp_reset_postdata();
        ?>
    </div>
    <div class="background--image-map"><?php get_template_part('inc/img/contour'); ?></div>
</section>