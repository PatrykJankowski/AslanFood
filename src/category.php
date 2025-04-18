<?php get_header(); ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$category = get_queried_object(); // Pobiera aktualną kategorię

$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'paged' => $paged,
    'cat' => $category->term_id, // Filtruje tylko po bieżącej kategorii
);
$posts_query = new WP_Query($args);
?>

<?php get_template_part('partials/section-baner', null, ['bg' => '/wp-content/themes/aslanfood/img/bg-small-2.webp']); ?>

<section>
    <div class="container mx-auto px-6 mt-24">
        <h2 class="font-bold text-5xl md:text-6xl text-center mb-6">Szukasz informacji na temat RODO?</h2>
        <div class="flex justify-center">
            <p class="max-w-xl text-center">Jeśli tak, to ten blog jest miejscem dla Ciebie. Znajdziesz tu najnowsze
                wiadomości,
                porady i nowinki
                dotyczące ochrony danych osobowych w Polsce. Możesz tu również przeczytać o prowadzeniu dokumentacji
                pracowniczej i cyberbezpieczeństwie. Stale aktualizujemy nasz blog o nowe treści, więc pamiętaj, aby
                często
                tu zaglądać!
            </p>
        </div>

        <div class="flex flex-wrap justify-center 2xl:justify-between gap-4 2xl:gap-0 mt-12">
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"
                class="px-8 py-2 rounded-md border font-semibold <?php echo (is_home()) ? 'bg-secondary border-secondary text-white' : 'border-primary text-secondary'; ?>">
                Wszystkie
            </a>
            <?php
            $categories = get_categories();
            foreach ($categories as $cat) {
                $activeClass = ($cat->term_id === $category->term_id) ? 'bg-secondary border-secondary text-white' : 'text-secondary';
                echo '<a href="' . get_category_link($cat->term_id) . '" 
                       class="px-6 py-2 rounded-md border border-primary  font-semibold ' . $activeClass . '">' .
                    $cat->name . '</a>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Blog Posts Grid -->
<section>
    <div class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <h2 class="visually-hidden">Wszystkie artykuły</h2>

        <?php if ($posts_query->have_posts()):
            $counter = 1; // Add a counter to track the position of posts
            while ($posts_query->have_posts()):
                $posts_query->the_post();
                // Set image height based on post index
                $image_height = 'h-48'; // Default height
                switch ($counter) {
                    case 1:
                        $image_height = 'h-[278px]';
                        break;
                    case 2:
                        $image_height = 'h-[430px]';
                        break;
                    case 3:
                        $image_height = 'h-[352px]';
                        break;
                    case 4:
                        $image_height = 'h-[428px]';
                        break;
                    case 5:
                        $image_height = 'h-[330px]';
                        break;
                    case 6:
                        $image_height = 'h-[354px]';
                        break;
                    default:
                        $image_height = 'h-48';
                        break;
                }
                ?>
                <article>
                    <a href="<?php the_permalink(); ?>" class="flex mb-2">
                        <?php if (has_post_thumbnail()): ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>"
                                class="w-full <?php echo $image_height; ?> rounded-lg object-cover" alt="<?php the_title(); ?>">
                        <?php else: ?>
                            <img src="/wp-content/themes/aslanfood/img/spotkanie.png"
                                class="w-full <?php echo $image_height; ?> rounded-lg object-cover" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                    </a>
                    <div>
                        <p class="text-lg"><?php the_time('d.m.Y'); ?></p>
                        <h2 class="font-bold text-2xl my-4">
                            <a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                    </div>
                </article>
                <?php
                $counter++; // Increment the counter for each post
            endwhile;
            wp_reset_postdata();
        else: ?>
            <p class="text-center text-lg">Brak artykułów do wyświetlenia.</p>
        <?php endif; ?>
    </div>

    <div class="container mx-auto px-6 py-12">
        <!-- Pagination -->
        <div class="pagination mt-8">
            <?php
            echo paginate_links(array(
                'total' => $posts_query->max_num_pages,
                'current' => $paged,
                'prev_text' => '←',
                'next_text' => '→',
                'type' => 'list',
                'class' => 'flex'
            ));
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>