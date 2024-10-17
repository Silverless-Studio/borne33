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
    <?php get_template_part('template-parts/age-gate');?>
    <div id="page" class="site" style="--start-grad:0%;--end-grad:100%">
        <a class="skip-link screen-reader-text" href="#primary">
            <?php esc_html_e('Skip to content', 'silverless'); ?>
        </a>
        <!-- <div class="dark-gradient"></div> -->
        
        <?php if ( is_front_page() ) : ?>
        <header id="home-header" class="site-header container">
            <div class="sunburst"></div>
            <div class="row">
                <a href="<?php echo home_url(); ?>">
                    <?php get_template_part('inc/img/fish'); ?>
                </a>
                <?php 
            $link = get_field('purchase_link','options');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="button button--primary" href="<?php echo esc_url( $link_url ); ?>"
                    target="<?php echo esc_attr( $link_target ); ?>">
                    <?php echo esc_html( $link_title ); ?>
                    <?php get_template_part('inc/img/glass'); ?>
                </a>
                <?php endif; ?>
            </div>
        </header>
        <?php else : ?>
        <header id="main-header" class="site-header container">
            <div class="row">
                <div class="sunburst"></div>
                <a href="<?php echo home_url(); ?>">
                    <?php get_template_part('inc/img/fish'); ?>
                </a>
                <?php 
            $link = get_field('discover_link','options');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="button button--outline" href="<?php echo esc_url( $link_url ); ?>"
                    target="<?php echo esc_attr( $link_target ); ?>">
                    <?php echo esc_html( $link_title ); ?>
                    <?php get_template_part('inc/img/arrow'); ?>
                </a>
                <?php endif; ?>
            </div>
        </header>
        <?php endif; ?>
        <div class="left-glow"></div>