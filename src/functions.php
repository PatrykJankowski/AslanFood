<?php

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



add_filter('wp_img_tag_add_auto_sizes', '__return_false');

/* Removes unnecessary type attributes */
add_action(
    'after_setup_theme',
    function () {
        add_theme_support('html5', ['script', 'style']);
    }
);




/* Enable upload for webp image files */
function webp_upload_mimes($existing_mimes)
{
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');


add_action('after_setup_theme', 'setup');
function setup()
{
    load_theme_textdomain('pma', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    //global $content_width;
    //if (!isset($content_width)) $content_width = 640;
    register_nav_menu('nav-menu', __('Main menu'));
    register_nav_menu('nav-menu-footer', __('Menu w stopce'));
    register_nav_menu('nav-menu-footer-2', __('Menu w stopce 2'));

}


/* Filter menu classes and ids */
function nav_menu_attributes_filter($var)
{
    return is_array($var) ? array_intersect($var, array('current_page_item', 'current-menu-ancestor', 'current_page_parent')) : '';
}
add_filter('nav_menu_css_class', 'nav_menu_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'nav_menu_attributes_filter', 100, 1);
add_filter('page_css_class', 'nav_menu_attributes_filter', 100, 1);


add_filter('document_title_separator', 'cyb_document_title_separator');
function cyb_document_title_separator($sep)
{
    return "|";
}

add_filter('the_title', 'aslanfood_custom_title');
function aslanfood_custom_title($title)
{
    return $title === '' ? '&rarr;' : $title;
}


add_filter('wp_title', 'filter_wp_title');
function filter_wp_title($title)
{
    return $title . esc_attr(get_bloginfo('name'));
}


/*
 * COMMENTS
 * Remove comments in its entirety
 */

// Removes from admin menu
add_action('admin_menu', 'remove_admin_menus');
function remove_admin_menus()
{
    remove_menu_page('edit-comments.php');
}

// Removes from post and pages
add_action('init', 'remove_comment_support', 100);
function remove_comment_support()
{
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
}

// Removes from admin bar
add_action('wp_before_admin_bar_render', 'remove_comments_admin_bar');
function remove_comments_admin_bar()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}

// Removes from media
add_filter('comments_open', 'remove_media_comment_status', 10, 2);
function remove_media_comment_status($open, $post_id)
{
    $post = get_post($post_id);
    if ($post->post_type == 'attachment') {
        return false;
    }
    return $open;
}


// remove <p> from the form
//add_filter('wpcf7_autop_or_not', '__return_false');

// WooCommere support
function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');




add_action('wp_enqueue_scripts', function () {
    if (class_exists('WooCommerce')) {
        wp_enqueue_script('wc-cart-fragments'); // wymusza włączenie fragmentów koszyka
    }
});


add_filter('woocommerce_add_to_cart_fragments', 'aslan_update_cart_count');
function aslan_update_cart_count($fragments) {
    ob_start();
    $count = WC()->cart->get_cart_contents_count();
    ?>
    <?php if ($count > 0): ?>
        <span class="woocommerce-cart-count absolute -top-2 -right-2 bg-red text-white text-xs font-bold flex justify-center items-center h-5 w-5 rounded-full"
              data-count="<?php echo esc_attr($count); ?>">
            <?php echo esc_html($count); ?>
        </span>
    <?php endif; ?>
    <?php
    $fragments['.woocommerce-cart-count'] = ob_get_clean();
    return $fragments;
}



// Product description

add_action( 'woocommerce_after_shop_loop_item_title', 'custom_product_excerpt_in_loop', 15 );

function custom_product_excerpt_in_loop() {
    global $product;

    echo '<div class="woocommerce-product-details__short-description">';
    echo apply_filters( 'woocommerce_short_description', $product->get_short_description() );
    echo '</div>';
}


add_filter('loop_shop_columns', 'aslanfood_loop_columns', 20);
function aslanfood_loop_columns($columns) {
    return 3;
}
