<?php
/*
Plugin Name: WooCommerce AJAX Category, Brand, and Tag Filter with URL Update
Description: AJAX filter for product categories, brands, and tags with reset button and badge-style tag selection.
Version: 1.1
*/

if (!defined('ABSPATH')) exit;

// Load JS and CSS
add_action('wp_enqueue_scripts', function () {
    if (is_shop() || is_product_category()) {
        wp_enqueue_script('wc-cat-filter-ajax', plugin_dir_url(__FILE__) . 'assets/script.js', ['jquery'], null, true);
        wp_enqueue_style('wc-cat-filter-style', plugin_dir_url(__FILE__) . 'assets/style.css');
        wp_localize_script('wc-cat-filter-ajax', 'wcCatFilterAjax', [
            'ajax_url' => admin_url('admin-ajax.php'),
        ]);
    }
});

// Shortcode
add_shortcode('wc_ajax_category_filter', function () {
    $categories = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => true]);
    $brands = get_terms(['taxonomy' => 'pa_brand', 'hide_empty' => true]); // Brand taxonomy
    $tags = get_terms(['taxonomy' => 'product_tag', 'hide_empty' => true]);

    ob_start(); ?>
    <form id="wc-ajax-filter-form" class="mb-6 p-4 border rounded-xl bg-white space-y-4">
        <div>
            <p class="font-semibold mb-2">Kategorie</p>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                <?php foreach ($categories as $term): ?>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="category[]" value="<?= esc_attr($term->slug) ?>">
                        <span><?= esc_html($term->name) ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>
        <div>
            <p class="font-semibold mb-2">Marki</p>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                <?php foreach ($brands as $brand): ?>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="brand[]" value="<?= esc_attr($brand->slug) ?>">
                        <span><?= esc_html($brand->name) ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>
        <div>
            <p class="font-semibold mb-2">Tagi</p>
            <div class="tag-selector border p-2 rounded">
                <select id="tag-select" class="border p-1">
                    <option value="">Wybierz tag</option>
                    <?php foreach ($tags as $tag): ?>
                        <option value="<?= esc_attr($tag->slug) ?>"><?= esc_html($tag->name) ?></option>
                    <?php endforeach; ?>
                </select>
                <div id="tag-badges" class="mt-2 flex flex-wrap gap-2"></div>
            </div>
        </div>
        <button type="button" id="reset-filters" class="mt-4 px-4 py-2 bg-red-500 text-white rounded">Resetuj filtry</button>
    </form>
    <?php
    return ob_get_clean();
});

// AJAX handler
add_action('wp_ajax_filter_products', 'wc_ajax_filter_products');
add_action('wp_ajax_nopriv_filter_products', 'wc_ajax_filter_products');

function wc_ajax_filter_products() {
    $categories = $_POST['categories'] ?? [];
    $brands = $_POST['brands'] ?? [];
    $tags = $_POST['tags'] ?? [];
    $paged = isset($_POST['page']) ? max(1, intval($_POST['page'])) : 1;

    $args = [
        'post_type' => 'product',
        'posts_per_page' => 12,
        'paged' => $paged,
        'post_status' => 'publish',
        'tax_query' => ['relation' => 'AND'],
    ];

    if (!empty($categories)) {
        $args['tax_query'][] = [
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $categories,
            'operator' => 'IN'
        ];
    }

    if (!empty($brands)) {
        $args['tax_query'][] = [
            'taxonomy' => 'pa_brand',
            'field' => 'slug',
            'terms' => $brands,
            'operator' => 'IN'
        ];
    }

    if (!empty($tags)) {
        $args['tax_query'][] = [
            'taxonomy' => 'product_tag',
            'field' => 'slug',
            'terms' => $tags,
            'operator' => 'IN'
        ];
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) {
        echo '<div class="products">';
        woocommerce_product_loop_start();
        while ($query->have_posts()) {
            $query->the_post();
            wc_get_template_part('content', 'product');
        }
        woocommerce_product_loop_end();
        echo '</div>';

        $total_pages = $query->max_num_pages;
        if ($total_pages > 1) {
            echo '<nav class="woocommerce-pagination">';
            echo paginate_links([
                'total' => $total_pages,
                'current' => $paged,
                'format' => '#',
                'prev_text' => '&laquo;',
                'next_text' => '&raquo;',
            ]);
            echo '</nav>';
        }

    } else {
        echo '<p class="text-gray-600">Brak produktów w wybranych filtrach.</p>';
    }

    wp_reset_postdata();

    echo ob_get_clean();
    wp_die();
}
