<?php
// WooCommerce specific hooks and customizations here

// Add WooCommere support
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
function aslan_update_cart_count($fragments)
{
    ob_start();
    $count = WC()->cart->get_cart_contents_count();
    ?>
    <?php if ($count > 0): ?>
        <span
            class="woocommerce-cart-count absolute -top-2 -right-2 bg-red text-white text-xs font-bold flex justify-center items-center h-5 w-5 rounded-full"
            data-count="<?php echo esc_attr($count); ?>">
            <?php echo esc_html($count); ?>
        </span>
    <?php endif; ?>
    <?php
    $fragments['.woocommerce-cart-count'] = ob_get_clean();
    return $fragments;
}


// Product description

add_action('woocommerce_after_shop_loop_item_title', 'custom_product_excerpt_in_loop', 15);

function custom_product_excerpt_in_loop()
{
    global $product;

    echo '<div class="woocommerce-product-details__short-description">';
    echo apply_filters('woocommerce_short_description', $product->get_short_description());
    echo '</div>';
}


add_filter('loop_shop_columns', 'aslanfood_loop_columns', 20);
function aslanfood_loop_columns($columns)
{
    return 3;
}


// Coupon 
add_filter('woocommerce_coupon_is_valid', 'only_first_order_coupon_check_extended', 10, 2);
function only_first_order_coupon_check_extended($valid, $coupon)
{
    $first_order_coupon_code = 'PIERWSZE10'; // Kod

    if (strtolower($coupon->get_code()) === strtolower($first_order_coupon_code)) {
        $email = '';

        if (is_user_logged_in()) {
            $user_id = get_current_user_id();

            // Sprawdź, czy użytkownik ma już jakieś zamówienia
            $customer_orders = wc_get_orders(array(
                'customer_id' => $user_id,
                'status' => array('completed', 'processing', 'on-hold'),
                'limit' => 1,
            ));

            if (!empty($customer_orders)) {
                return false;
            }

        } else {
            // Dla gościa: pobierz e-mail z danych sesji koszyka
            if (!WC()->cart)
                return $valid;

            $checkout = WC()->checkout();
            $email = $checkout->get_value('billing_email');

            if ($email) {
                $customer_orders = wc_get_orders(array(
                    'billing_email' => $email,
                    'status' => array('completed', 'processing', 'on-hold'),
                    'limit' => 1,
                ));

                if (!empty($customer_orders)) {
                    return false;
                }
            }
        }
    }

    return $valid;
}


// Show EAN (first) on product page
add_filter('woocommerce_display_product_attributes', 'add_sku_to_attributes_table', 10, 2);
function add_sku_to_attributes_table($attributes, $product) {
    if ($ean = $product->get_global_unique_id()) {
        $attributes = [
            'ean' => [
                'label' => __('EAN', 'woocommerce'),
                'value' => $ean,
            ]
        ] + $attributes;
    }
    return $attributes;
}

add_filter('gettext', 'zmien_etykiete_firma_checkout_blokowy', 20, 3);
function zmien_etykiete_firma_checkout_blokowy($translated_text, $text, $domain) {
    if ($translated_text === 'Company name') {
        $translated_text = 'Nazwa firmy';
    }
    return $translated_text;
}
