<?php
// Theme and SEO related changes


/* Enable upload for webp image files */
function webp_upload_mimes($existing_mimes)
{
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');


/* Theme setup function */
add_action('after_setup_theme', 'setup');
function setup()
{
    // Load theme translation files from the /languages folder
    load_theme_textdomain('aslanfood', get_template_directory() . '/languages');

    // Add support for the title tag, automatic feed links, and post thumbnails
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menu('nav-menu', __('Main menu')); // Main menu
    register_nav_menu('nav-menu-footer', __('Footer menu')); // Footer menu
    register_nav_menu('nav-menu-footer-2', __('Footer menu 2')); // Secondary footer menu
}


/* Filter menu classes and IDs */
function nav_menu_attributes_filter($var)
{
    // Keep only the necessary CSS classes and IDs for active menu items
    return is_array($var) ? array_intersect($var, array('current_page_item', 'current-menu-ancestor', 'current_page_parent')) : '';
}
add_filter('nav_menu_css_class', 'nav_menu_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'nav_menu_attributes_filter', 100, 1);
add_filter('page_css_class', 'nav_menu_attributes_filter', 100, 1);


/* Modify document title separator */
add_filter('document_title_separator', 'cyb_document_title_separator');
function cyb_document_title_separator($sep)
{
    return "|";
}


/* Customize the title on empty posts */
add_filter('the_title', 'aslanfood_custom_title');
function aslanfood_custom_title($title)
{
    // If the title is empty, replace it with an arrow
    return $title === '' ? '&rarr;' : $title;
}


/* Add the site name to the title */
add_filter('wp_title', 'filter_wp_title');
function filter_wp_title($title)
{
    return $title . esc_attr(get_bloginfo('name'));
}