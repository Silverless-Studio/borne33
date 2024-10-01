<?php

/**
 * ============== Template Name: Home Page
 *
 * @package silverless
 */

get_header();

?>

<section class="hero container">
    <div class="row">
        <div class="hero--text">
            <h3 class="heading-5 heading-alt"><?php echo esc_html( get_field('top_tagline') ); ?></h3>
            <h2 class="heading-4 heading-alt"><?php echo esc_html( get_field('bottom_tagline') ); ?></h2>
            <div class="hero--text-buttons">
                <div class="link-one">
                    <?php
$buttonOne = get_field('button_one');
if( $buttonOne ): ?>
       
            <a class="button button--<?php echo esc_html( $buttonOne['button_type'] ); ?>" href="<?php echo esc_url( $buttonOne['link']['url'] ); ?>"><?php echo esc_html( $buttonOne['link']['title'] ); ?><?php get_template_part('inc/img/glass'); ?></a>
<?php endif; ?>
                </div>
                <div class="link-two">
                     <?php
$buttontwo = get_field('button_two');
if( $buttontwo ): ?>
       
            <a class="button button--<?php echo esc_html( $buttontwo['button_type'] ); ?>" href="<?php echo esc_url( $buttontwo['link']['url'] ); ?>"><?php echo esc_html( $buttontwo['link']['title'] ); ?><?php get_template_part('inc/img/arrow'); ?></a>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section--two"></section>
<section class="section--three"></section>

<?php get_footer(); ?>