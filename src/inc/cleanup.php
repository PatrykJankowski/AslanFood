<?php
// Cleanup

add_filter('wp_enqueue_scripts', 'remove_shit', PHP_INT_MAX);
function remove_shit()
{
    //wp_dequeue_style('wp-block-library');
    //wp_dequeue_style('contact-form-7');

    //add_filter('wpcf7_load_js', '__return_false');
    //add_filter('wpcf7_load_css', '__return_false');

    //wp_dequeue_script('contact-form-7');
    //wp_dequeue_style('contact-form-7');

    //wp_deregister_script('jquery');
}

add_action('init', function () {
    remove_action('rest_api_init', 'wp_oembed_register_route');
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
}, PHP_INT_MAX - 1);


/*  Removes size attributes for images */
add_filter('wp_img_tag_add_auto_sizes', '__return_false');


/* Removes unnecessary type attributes */
add_action(
    'after_setup_theme',
    function () {
        add_theme_support('html5', ['script', 'style']);
    }
);

/*
 * COMMENTS
 * Disable comments globally, except for WooCommerce products.
 */

// 1. Remove Comments from the Admin Menu (globaly)
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
}, 999);

// 2. Remove Comment Support from Posts and Pages (except Products)
add_action('init', function () {
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
}, 100);

// 3. Remove Comments Icon from Admin Bar (if no reviews)
add_action('wp_before_admin_bar_render', function () {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}, 999);

// 4. Disable Comments for Media and Other Post Types, Except Products
add_filter('comments_open', function ($open, $post_id) {
    $post = get_post($post_id);
    if ($post->post_type !== 'product') {
        return false;
    }
    return $open;
}, 10, 2);

// 5. Disable Pings (Global)
add_filter('pings_open', '__return_false', 20, 2);

// 6. Hide Comments (Except for Products)
add_filter('comments_array', function ($comments, $post_id) {
    $post = get_post($post_id);
    return ($post->post_type !== 'product') ? [] : $comments;
}, 10, 2);

// 7. Remove Recent Comments from WordPress Dashboard
add_action('wp_dashboard_setup', function () {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
});

// 8. Remove 'Discussion' Settings from WordPress Settings
add_action('admin_menu', function () {
    remove_submenu_page('options-general.php', 'options-discussion.php');
}, 999);

// 9. Remove Comment REST API Endpoint (Does not affect WooCommerce Reviews)
add_filter('rest_endpoints', function ($endpoints) {
    unset($endpoints['/wp/v2/comments']);
    return $endpoints;
});