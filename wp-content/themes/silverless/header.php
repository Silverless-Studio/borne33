<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package silverless
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
<link rel="stylesheet" href="https://use.typekit.net/nwl6azg.css">
    <?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary">
            <?php esc_html_e('Skip to content', 'silverless'); ?>
        </a>
        <div id="age-gate" class="age-gate">
    <div class="age-gate-content">
        <h1>Are you over 18?</h1>
        <button id="yes-btn">Yes</button>
        <button id="no-btn">No</button>
    </div>
</div>

        <header id="site-header" class="site-header container">
            <div class="row">
                <?php get_template_part('inc/img/fish'); ?>  <?php
$buttontwo = get_field('button_one');
if( $buttontwo ): ?>
       
            <a class="button button--primary" href="<?php echo esc_url( $buttontwo['link']['url'] ); ?>"><?php echo esc_html( $buttontwo['link']['title'] ); ?><?php get_template_part('inc/img/glass'); ?></a>
<?php endif; ?>
            </div>
           
        </header>
       