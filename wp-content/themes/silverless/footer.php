<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package silverless
 */

?>
<footer id="colophon" class="site-footer container">
    <div class="row col-6">
        <div class="logo"><?php get_template_part('inc/img/logo-main'); ?></div>
        <div class="underscores underscores--primary"></div>
        <h2 class="heading-3"><?php echo esc_html( get_field('footer_byline','options') ); ?></h2>
        <div class="address col-half">
            <div class="address--details"><?php echo wp_kses_post ( get_field('address','options') ); ?></div><div class="address--contact"><?php if( have_rows('links','options') ): ?>
    <ul class="links">
    <?php while( have_rows('links','options') ): the_row(); ?>
        <li>
            <?php 
$link = get_sub_field('link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a class="button--text" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
<?php endif; ?>
        </li>
    <?php endwhile; ?>
    </ul>
<?php endif; ?></div>
        </div>
        <div class="socials"><?php if (have_rows('social_media_links', 'options')) : ?>
                <ul class="social-links">
                    <?php while (have_rows('social_media_links', 'options')) : the_row(); ?>

                    <li>
                        <?php
                                                $link = get_sub_field('link', 'options');
                                                if ($link) :
                                                    $link_url = $link['url'];
                                                    $link_title = $link['title'];
                                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                        <a href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>"><?php the_sub_field('icon', 'options'); ?></a>
                        <?php endif; ?>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?></div>
        <div class="silverless">
                    <a href="https://silverless.co.uk">
                        <?php get_template_part('inc/img/silverless-logo'); ?>
                    </a>
                </div>
                <div class="copyright"><?php the_field('copy_text','options');?> <?php if( have_rows('legal_links','options') ): ?>

    <?php while( have_rows('legal_links','options') ): the_row(); ?>

            
         <?php 
$link = get_sub_field('link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a class="button--text" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
<?php endif; ?>

    <?php endwhile; ?>

<?php endif; ?></div>
    </div>

   

</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>