<?php

// ************* Remove Admin Bar from FrontEnd *************

add_filter('show_admin_bar', '__return_false');

/*

// ************* Remove default Posts type since no blog *************

// Remove side menu
add_action('admin_menu', 'remove_default_post_type');

function remove_default_post_type()
{
    remove_menu_page('edit.php');
}

// Remove +New post in top Admin Menu Bar
add_action('admin_bar_menu', 'remove_default_post_type_menu_bar', 999);

function remove_default_post_type_menu_bar($wp_admin_bar)
{
    $wp_admin_bar->remove_node('new-post');
}

// Remove Quick Draft Dashboard Widget
add_action('wp_dashboard_setup', 'remove_draft_widget', 999);

function remove_draft_widget()
{
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
}

*/

// ************* Remove comments *************

add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;

    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar & de-queue comment-reply
add_action('init', function () {
    wp_deregister_script('comment-reply');

    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

// ************* Remove blocks *************

// Disable Gutenberg editor.
add_filter('use_block_editor_for_post_type', '__return_false', 10);
// Don't load Gutenberg-related stylesheets.
add_action('wp_enqueue_scripts', 'remove_block_css', 100);
function remove_block_css()
{
    wp_dequeue_style('wp-block-library'); // Wordpress core
    wp_dequeue_style('wp-block-library-theme'); // Wordpress core
    wp_dequeue_style('wc-block-style'); // WooCommerce
    wp_dequeue_style('storefront-gutenberg-blocks'); // Storefront theme
}

// ************* Enable Old Menus *************

add_action('after_setup_theme', 'custom_setup');
function custom_setup()
{
    add_theme_support('post-thumbnails');

    register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'silverless')));
}

// ************* Remove WP CSS Variables *************

// remove CSS variables --wp--preset--color/gradient/duotone
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_footer', 'wp_enqueue_global_styles', 1);

// remove SVG definitions for gradient/duotone
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

//Disable emojis in WordPress
add_action('init', 'smartwp_disable_emojis');

function smartwp_disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}

function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

// ************* Remove WP Dashboard Widgets *************

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

function remove_dashboard_widgets()
{
    global $wp_meta_boxes;
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');        // Right Now
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');  // Recent Comments
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');   // Incoming Links
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');         // Activity
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');          // Plugins
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');        // Quick Press
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');      // Recent Drafts
    remove_meta_box('dashboard_primary', 'dashboard', 'side');            // WordPress blog
    remove_meta_box('dashboard_secondary', 'dashboard', 'side');          // Other WordPress News
}