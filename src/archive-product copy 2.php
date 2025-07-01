<?php get_header(); ?>

<?php
$shop_page_id = wc_get_page_id('shop');

for ($i = 1; $i <= 3; $i++) {
    $title = get_field("hero_slide_{$i}_title", $shop_page_id);
    $text = get_field("hero_slide_{$i}_text", $shop_page_id);
    $isWhite = get_field("hero_slide_{$i}_iswhite", $shop_page_id);
    $image = get_field("hero_slide_{$i}_image", $shop_page_id);
    $btn1_text = get_field("hero_slide_{$i}_btn1_text", $shop_page_id);
    $btn1_url = get_field("hero_slide_{$i}_btn1_url", $shop_page_id);
    $btn2_text = get_field("hero_slide_{$i}_btn2_text", $shop_page_id);
    $btn2_url = get_field("hero_slide_{$i}_btn2_url", $shop_page_id);

    if ($title && $image) {
        $slides[] = [
            'title' => $title,
            'text' => $text,
            'isWhite' => $isWhite,
            'image' => $image['url'],
            'btn1_text' => $btn1_text,
            'btn1_url' => $btn1_url,
            'btn2_text' => $btn2_text,
            'btn2_url' => $btn2_url
        ];
    }
}
?>

<section class="relative h-[300px] xl:h-[300px] overflow-hidden container mx-auto mt-0 xl:mt-48" role="banner">
    <div id="hero-slider" class="relative w-full h-full">
        <?php foreach ($slides as $index => $slide): ?>
            <div
                class="absolute inset-0 transition-opacity duration-1000 ease-in-out <?php echo $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0'; ?> slide">
                <div class="w-full h-full bg-cover bg-center flex items-center justify-center rounded-xl"
                    style="background-image: url('<?php echo esc_url($slide['image']); ?>');">
                    <div class="container mx-auto px-6 text-center text-white">
                        <h2
                            class="max-w-3xl text-3xl font-medium xl:text-5xl font-medium xl:leading-[110px] mx-auto <?php echo $slide['isWhite'] ? 'text-white' : ''; ?>">
                            <?php echo esc_html($slide['title']); ?>
                        </h2>
                        <p
                            class="my-10 font-semibold text-xl text-black <?php echo $slide['isWhite'] ? 'text-white' : 'text-black'; ?>">
                            <?php echo esc_html($slide['text']); ?>
                        </p>
                        <div class="flex justify-center flex-wrap gap-4">
                            <?php if ($slide['btn1_text'] && $slide['btn1_url']): ?>
                                <a href="<?php echo esc_url($slide['btn1_url']); ?>"
                                    class="button button--secondary"><?php echo esc_html($slide['btn1_text']); ?></a>
                            <?php endif; ?>
                            <?php if ($slide['btn2_text'] && $slide['btn2_url']): ?>
                                <a href="<?php echo esc_url($slide['btn2_url']); ?>"
                                    class="button"><?php echo esc_html($slide['btn2_text']); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Dots -->
        <div id="hero-dots" class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex gap-3 z-20">
            <?php foreach ($slides as $index => $_): ?>
                <button class="w-3 h-3 rounded-full bg-white/50 dot <?php echo $index === 0 ? 'bg-white' : ''; ?>"
                    data-index="<?php echo $index; ?>"></button>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="container mx-auto mt-12 mb-0 text-center text-3xl">
    Sprzedaż hurtowa realizowana jest za pośrednictwem działu handlowego.
</section>

<section class="py-24 shop">
    <div class="container mx-auto px-6">
        <div class="mb-12">
            <h1 class="text-3xl xl:text-5xl font-medium mb-6">Nasze produkty</h1>
            <p class="text-xl">Produkty najwyższej jakości od najlepszych producentów.</p>
        </div>

        <!-- GRID: filtr i produkty -->
        <div class="grid grid-cols-1 xl:grid-cols-[280px_1fr] gap-8">
            <!-- LEWA KOLUMNA: FILTRY -->
            <aside class="hidden xl:block">
               <?php echo do_shortcode("[woof sid='generator_6808d1f0d76b7' autohide='0' autosubmit='-1' is_ajax='1' ajax_redraw='0' start_filtering_btn='0' btn_position='b' dynamic_recount='-1' hide_terms_count_txt='0' mobile_mode='0' ]"); ?>
            </aside>

            <!-- PRAWA KOLUMNA: produkty -->
            <div>
                <div class="flex flex-wrap gap-4 mb-10 justify-center xl:hidden">
                    <?php
                    $current_cat = get_queried_object();
                    $shop_page_url = get_permalink(wc_get_page_id('shop'));

                    $current_url = $_SERVER['REQUEST_URI'];
                    $is_all_active = (!is_tax('product_cat') && (strpos($current_url, '/sklep') !== false))
                        ? ' bg-black text-white border-black '
                        : ' border-gray-1';

                    echo '<a href="' . esc_url($shop_page_url) . '" class="block text-center font-bold rounded-full border px-6 py-2 hover:bg-black hover:border-black hover:text-white transition' . $is_all_active . '">Wszystkie</a>';

                    $args = [
                        'taxonomy' => 'product_cat',
                        'orderby' => 'menu_order',
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
                        $url = $_SERVER['REQUEST_URI'];
                        $is_current = (is_tax('product_cat') && $current_cat->term_id === $cat->term_id) || strpos($url, '/' . $cat->slug . '/') !== false
                            ? ' bg-black border-black text-white '
                            : ' border-gray-1';

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
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slides = document.querySelectorAll('#hero-slider .slide');
        const dots = document.querySelectorAll('#hero-slider .dot');
        const dotsContainer = document.getElementById('hero-dots');
        let current = 0;
        let interval;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('opacity-100', i === index);
                slide.classList.toggle('opacity-0', i !== index);
                slide.classList.toggle('z-10', i === index);
                slide.classList.toggle('z-0', i !== index);
            });

            dots.forEach((dot, i) => {
                dot.classList.toggle('bg-white', i === index);
                dot.classList.toggle('bg-white/50', i !== index);
            });

            current = index;
        }

        function nextSlide() {
            const next = (current + 1) % slides.length;
            showSlide(next);
        }

        if (slides.length <= 1) {
            if (dotsContainer) dotsContainer.classList.add('hidden');
        } else {
            interval = setInterval(nextSlide, 6000);

            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    const index = parseInt(dot.dataset.index);
                    showSlide(index);
                    clearInterval(interval);
                    interval = setInterval(nextSlide, 6000); // restart autoplay
                });
            });
        }
    });
</script>

<?php get_footer(); ?>