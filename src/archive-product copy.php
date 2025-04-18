<?php get_header(); ?>

<?php get_template_part('partials/section-baner', null, ['bg' => '/wp-content/themes/aslanfood/img/bg-hero.jpg']); ?>

<section class="py-24 shop">
    <div class="container mx-auto px-6">

        <div class="text-center mb-10">
            <h1 class="text-3xl xl:text-5xl mb-6">Nasze produkty</h1>
            <p class="text-xl">Produkty najwyższej jakości od najlepszych producentów.</p>
        </div>

        <?php echo do_shortcode('[woof  sid="generator_68022478a8873" autohide="0" autosubmit="-1" is_ajax="0" ajax_redraw="0" start_filtering_btn="0" btn_position="b" dynamic_recount="-1" hide_terms_count_txt="0" mobile_mode="0" ]'); ?>


        <div class="flex flex-wrap gap-4 mb-10 justify-between">
            <?php
            $current_cat = get_queried_object(); // obecna kategoria
            $shop_page_url = get_permalink(wc_get_page_id('shop'));

            // === Link "Wszystkie" ===
            $is_active = !is_tax('product_cat') ? ' bg-black text-white border-black ' : ' border-gray-1';
            echo '<a href="' . esc_url($shop_page_url) . '" class="block text-center font-bold rounded-full border px-6 py-2 hover:bg-black hover:border-black hover:text-white transition' . $is_active . '">Wszystkie</a>';

            // === Kategorie ===
            $args = [
                'taxonomy' => 'product_cat',
                'orderby' => 'name',
                'show_count' => 0,
                'pad_counts' => 0,
                'hierarchical' => 1,
                'hide_empty' => 0,
                'parent' => 0
            ];

            $all_categories = get_categories($args);

            foreach ($all_categories as $cat) {
                $category_id = $cat->term_id;
                $thumbnail_id = get_term_meta($category_id, 'thumbnail_id', true);
                $image = wp_get_attachment_url($thumbnail_id);
                $link = get_term_link($cat->slug, 'product_cat');

                // Czy to aktywna kategoria?
                $is_current = (is_tax('product_cat') && $current_cat->term_id === $cat->term_id) ? ' bg-black border-black text-white ' : ' border-gray-1';

                ?>
                <a href="<?php echo esc_url($link); ?>"
                    class="block text-center font-bold rounded-full border px-6 py-2 hover:bg-black hover:border-black hover:text-white transition <?php echo $is_current; ?>">
                    <?php if ($image): ?>
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($cat->name); ?>"
                            class="mx-auto mb-2 w-12 h-12 object-contain" />
                    <?php endif; ?>
                    <?php echo esc_html($cat->name); ?>
                </a>
                <?php
            }
            ?>
        </div>

        <div class="mb-10 flex items-center flex-col gap-2 xl:gap-0 xl:flex-row">
            <h2 class="text-lg mr-4 font-DMSans">Szukaj produktów</h2>
            <?php aws_get_search_form(true); ?>
        </div>

        <?php woocommerce_content(); ?>
    </div>
</section>

<?php get_footer(); ?>