<?php
/**
 * Front Page Template
 */
get_header();
?>

<!-- <section
    class="relative flex items-center justify-center h-[500px] xl:h-[800px] mb-24 bg-cover bg-center bg-[url('/wp-content/themes/aslanfood/img/bg-hero.jpg')]"
    role="banner">
    <div class="container mx-auto px-6 flex flex-col items-center text-center">
        <h2 class="max-w-3xl text-5xl xl:text-[100px] font-medium xl:leading-[110px] text-center">
            Żywność wysokiej jakości
        </h2>
        <p class="my-10 text-xl text-black">Produkty najwyższej jakości od najlepszych producentów.</p>
        <div class="flex justify-center flex-wrap gap-4">
            <a href="/sklep" class="button button--primary">Zobacz produkty</a>
            <a href="/kontakt" class="button">Skontaktuj się</a>
        </div>
    </div>
</section> -->

<?php
$slides = [];

for ($i = 1; $i <= 3; $i++) {
    $title = get_field("hero_slide_{$i}_title");
    $text = get_field("hero_slide_{$i}_text");
    $image = get_field("hero_slide_{$i}_image");
    $btn1_text = get_field("hero_slide_{$i}_btn1_text");
    $btn1_url = get_field("hero_slide_{$i}_btn1_url");
    $btn2_text = get_field("hero_slide_{$i}_btn2_text");
    $btn2_url = get_field("hero_slide_{$i}_btn2_url");

    if ($title && $image) {
        $slides[] = [
            'title' => $title,
            'text' => $text,
            'image' => $image['url'],
            'btn1_text' => $btn1_text,
            'btn1_url' => $btn1_url,
            'btn2_text' => $btn2_text,
            'btn2_url' => $btn2_url
        ];
    }
}
?>

<section class="relative h-[500px] xl:h-[800px] mb-24 overflow-hidden" role="banner">
    <div id="hero-slider" class="relative w-full h-full">
        <?php foreach ($slides as $index => $slide): ?>
            <div
                class="absolute inset-0 transition-opacity duration-1000 ease-in-out <?php echo $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0'; ?> slide">
                <div class="w-full h-full bg-cover bg-center flex items-center justify-center"
                    style="background-image: url('<?php echo esc_url($slide['image']); ?>');">
                    <div class="container mx-auto px-6 text-center text-white">
                        <h2 class="max-w-3xl text-5xl xl:text-[100px] font-medium xl:leading-[110px] mx-auto">
                            <?php echo esc_html($slide['title']); ?>
                        </h2>
                        <p class="my-10 text-xl text-black"><?php echo esc_html($slide['text']); ?></p>
                        <div class="flex justify-center flex-wrap gap-4">
                            <?php if ($slide['btn1_text'] && $slide['btn1_url']): ?>
                                <a href="<?php echo esc_url($slide['btn1_url']); ?>"
                                    class="button button--primary"><?php echo esc_html($slide['btn1_text']); ?></a>
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

<section class="text-center pb-24">
    <div class="container mx-auto px-6 pb-10 flex justify-between">
        <h2 class="text-3xl xl:text-5xl">Zobacz nowości w sklepie</h2>
        <a href="<?php echo site_url('/sklep/'); ?>" class="button button--primary hidden xl:flex">
            Zobacz wszystkie
        </a>
    </div>
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 4,
                'orderby' => 'date',
                'order' => 'DESC',
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()):
                while ($loop->have_posts()):
                    $loop->the_post();
                    global $product;
                    ?>
                    <a href="<?php the_permalink(); ?>"
                        class="flex flex-col border border-gray-1 rounded-xl p-4 hover:shadow-lg transition">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('medium', ['class' => 'mx-auto mb-4']); ?>
                        <?php else: ?>
                            <img src="/wp-content/uploads/woocommerce-placeholder-300x300.png">
                        <?php endif; ?>

                        <h3 class="text-lg font-semibold mb-2"><?php the_title(); ?></h3>

                        <?php if (has_excerpt()): ?>
                            <div class="text-sm mb-4 flex-grow"><?php the_excerpt(); ?></div>
                        <?php endif; ?>

                        <p class="text-primary font-bold text-base mt-auto"><?php echo $product->get_price_html(); ?></p>
                    </a>
                    <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <a href="<?php echo site_url('/sklep/'); ?>" class="button button--primary mt-12 mx-auto flex xl:hidden">
            Zobacz wszystkie
        </a>
    </div>
</section>

<?php $page_id = 2; ?>

<section class="py-24 bg-gray-3">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <!-- Lewa kolumna: Obraz -->
            <div class="relative mb-12">
                <div class="pr-12">
                    <img src="/wp-content/themes/aslanfood/img/food.jpg" alt="Delicious Wraps"
                        class="object-cover rounded-xl h-[566px]">
                </div>
                <div
                    class="absolute -bottom-12 right-0 text-white bg-black p-12 rounded-xl max-w-xs flex flex-col gap-4">
                    <h3 class="text-xl text-white font-semibold mb-3">Skontaktuj się z nami</h3>
                    <p class="flex items-center gap-1">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.25 2.75C1.25 1.92157 1.92157 1.25 2.75 1.25H5.20943C5.53225 1.25 5.81886 1.45657 5.92094 1.76283L7.0443 5.13291C7.16233 5.48699 7.00203 5.87398 6.6682 6.0409L4.97525 6.88737C5.80194 8.72091 7.27909 10.1981 9.11263 11.0247L9.9591 9.3318C10.126 8.99796 10.513 8.83767 10.8671 8.9557L14.2372 10.0791C14.5434 10.1811 14.75 10.4677 14.75 10.7906V13.25C14.75 14.0784 14.0784 14.75 13.25 14.75H12.5C6.2868 14.75 1.25 9.7132 1.25 3.5V2.75Z"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <a href="tel:+48<?php echo preg_replace('/\D/', '', get_field('phone', $page_id)); ?>">
                            <?php the_field('phone', $page_id); ?>
                        </a>
                    </p>

                    <p class="flex items-center gap-1">
                        <span class="text-primary text-xl">
                            <svg width="16" height="12" viewBox="0 0 16 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.25 3L7.16795 6.9453C7.6718 7.2812 8.3282 7.2812 8.83205 6.9453L14.75 3M2.75 11.25H13.25C14.0784 11.25 14.75 10.5784 14.75 9.75V2.25C14.75 1.42157 14.0784 0.75 13.25 0.75H2.75C1.92157 0.75 1.25 1.42157 1.25 2.25V9.75C1.25 10.5784 1.92157 11.25 2.75 11.25Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <a href="mailto:<?php the_field('email', $page_id); ?>">
                            <?php the_field('email', $page_id); ?>
                        </a>
                    </p>
                    <p class="flex items-center gap-1">
                        <svg class="w-5 -ml-[3px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                        <span>Marszałkowska 84/92/119</span>
                    </p>
                </div>
            </div>

            <!-- Prawa kolumna: Tekst -->
            <div class="text-left">
                <h2 class="text-3xl xl:text-5xl mb-6">
                    Dołącz do nas w misji na rzecz zdrowego odżywiania
                </h2>
                <p class="text-lg font-medium text-black">
                    Odkryj naszą różnorodną gamę wysokiej jakości produktów i zobacz, jak Aslan Food może wzbogacić
                    Twoją codzienną dietę. Rozpocznij z nami swoją podróż.
                </p>

                <p class="mt-6">
                    Współpraca z zaufanymi dostawcami z Polski i Turcji pozwala nam oferować konkurencyjne warunki oraz
                    niezawodność w realizacji zamówień.
                </p>

                <div class="my-6 flex flex-wrap justify-between items-center gap-12">
                    <img src="/wp-content/themes/aslanfood/img/kebok.png" alt="Logo Kebok" class="h-20">
                    <img src="/wp-content/themes/aslanfood/img/marida.png" alt="Logo Marida" class="h-20">
                    <img src="/wp-content/themes/aslanfood/img/aslan.png" alt="Logo Aslan" class="h-20">
                </div>

                <a href="/nasze-marki" class="button mt-2">Nasze marki</a>

            </div>
        </div>
    </div>
</section>


<!-- Sekcja najnowszych postów -->
<?php
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 5, // Pobiera 3 ostatnie posty
);
$latest_posts = new WP_Query($args);
?>


<section class="py-24 bg-aliceblue">
    <div class="container mx-auto px-6 pb-10 flex justify-between">
        <h2 class="text-3xl xl:text-5xl">Ostatnie artykuły</h2>
        <a href="<?php echo site_url('/blog/'); ?>" class="button button--primary hidden xl:flex">
            Zobacz więcej artykułów
        </a>
    </div>

    <?php if ($latest_posts->have_posts()): ?>
        <div class="container mx-auto px-6 py-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <?php
            $count = 0;
            while ($latest_posts->have_posts()):
                $latest_posts->the_post();
                $count++;
                if ($count === 1):
                    ?>
                    <!-- Duży artykuł -->
                    <article class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col h-full">
                        <?php if (has_post_thumbnail()): ?>
                            <img src="<?php the_post_thumbnail_url(); ?>" class="w-full min-h-52 xl:min-h-[456px] object-cover"
                                alt="<?php the_title(); ?>">
                        <?php else: ?>
                            <img src="/wp-content/themes/aslanfood/img/tlo.jpeg" class="w-full min-h-52 xl:min-h-[456px] object-cover"
                                alt="<?php the_title(); ?>">
                        <?php endif; ?>

                        <div class="flex flex-col h-full p-6">
                            <time class="text-sm mb-2" datetime="<?php the_time('Y-m-d'); ?>">
                                <?php the_time('d.m.Y'); ?>
                            </time>
                            <h3 class="text-xl font-DMSans font-medium mb-2">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="flex-grow"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                            <a href="<?php the_permalink(); ?>" class="mt-4 text-primary font-semibold">Czytaj więcej →</a>
                        </div>
                    </article>

                    <!-- Start kolumny z mniejszymi artykułami -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-stretch">
                    <?php else: ?>
                        <!-- Małe artykuły -->
                        <article class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col h-full">
                            <div class="h-52 overflow-hidden">
                                <?php if (has_post_thumbnail()): ?>
                                    <img src="<?php the_post_thumbnail_url('large'); ?>"
                                        class="w-full h-full object-cover object-center" alt="<?php the_title(); ?>">
                                <?php else: ?>
                                    <img src="/wp-content/themes/aslanfood/img/tlo.jpeg"
                                        class="w-full h-full object-cover object-center" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </div>

                            <div class="flex flex-col flex-grow px-4 py-6">
                                <time class="text-sm mb-2" datetime="<?php the_time('Y-m-d'); ?>">
                                    <?php the_time('d.m.Y'); ?>
                                </time>
                                <h3 class="flex-grow text-xl font-DMSans font-medium mb-2">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <a href="<?php the_permalink(); ?>" class="mt-2 text-primary font-semibold">Czytaj więcej
                                    →</a>
                            </div>
                        </article>
                        <?php
                endif;
            endwhile;
            ?>
            </div> <!-- Zamyka kolumnę z mniejszymi artykułami -->
            <?php wp_reset_postdata(); ?>
            <a href="<?php echo site_url('/blog/'); ?>" class="button button--primary mt-12 mx-auto flex xl:hidden">
                Zobacz więcej artykułów
            </a>
        </div>
    <?php else: ?>
        <div class="container mx-auto px-6 text-center">
            <p class="text-lg">Brak nowych wpisów.</p>
        </div>
    <?php endif; ?>
</section>


<!-- 
<section class="text-center py-24 bg-gray-3">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold">Kontakt</h2>
        <p class="text-lg mt-2">Zadzwoń lub napisz</p>
        <p class="text-xl mt-4">Aslan Food</p>
        <p class="text-xl mt-2 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 mr-2" width="20.438" height="20.475">
                <path fill="none" stroke="#4ec3e0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"
                    d="M12.447 4.404a4.539 4.539 0 0 1 3.586 3.587M12.447.773a8.171 8.171 0 0 1 7.218 7.208m-.908 7.245v2.724a1.816 1.816 0 0 1-1.979 1.816 17.967 17.967 0 0 1-7.835-2.787 17.7 17.7 0 0 1-5.447-5.447A17.967 17.967 0 0 1 .708 3.66a1.816 1.816 0 0 1 1.807-1.979h2.723a1.816 1.816 0 0 1 1.816 1.561 11.657 11.657 0 0 0 .636 2.551 1.816 1.816 0 0 1-.409 1.916L6.133 8.862a14.526 14.526 0 0 0 5.447 5.447l1.153-1.153a1.816 1.816 0 0 1 1.916-.409 11.657 11.657 0 0 0 2.551.636 1.816 1.816 0 0 1 1.557 1.843Z"
                    data-name="Icon feather-phone-call"></path>
            </svg> <a href="tel:+48111111111">500 111 111</a></p>
        <p class="text-xl mt-2"><span class="text-primary text-xl">✉</span> <a
                href="mailto:kontakt@slubnyklasyk.pl">kontakt@aslanfood.com</a></p>
        <p class="mt-4"><a href="https://facebook.com" target="_blank" class="text-blue-600">Facebook</a></p> -->
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

<?php
get_footer();
?>