<?php get_header(); ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'cat' => 1,
    'paged' => $paged,
);
$posts_query = new WP_Query($args);
$page_id = get_option('page_for_posts');
$page = get_post($page_id)
?>

<?php get_template_part('partials/section-baner', null, ['bg' => '/wp-content/themes/aslanfood/img/bg-hero.jpg']); ?>

<section>
    <div class="container mx-auto px-6 mt-24">
        <h2 class="text-3xl xl:text-5xl font-medium text-center mb-6"><?php echo get_the_title($page_id); ?></h2>
        <div class="flex justify-center">
            <div class="max-w-2xl text-center text-lg"><?php echo apply_filters('the_content', $page->post_content); ?></div>
        </div>

        <!-- <div class="flex flex-wrap justify-center 2xl:justify-between gap-4 2xl:gap-0 mt-12">
            <a href="<?php echo site_url('/blog/'); ?>"
                class="px-8 py-2 rounded-md border font-semibold <?php echo (is_home()) ? 'bg-secondary border-secondary text-white' : 'border-primary text-secondary'; ?>">
                Wszystkie
            </a>
            <?php
            // $categories = get_categories();
            // foreach ($categories as $category) {
            //     echo '<a href="' . get_category_link($category->term_id) . '" class="px-6 py-2 rounded-md border border-primary text-secondary font-semibold">' . $category->name . '</a>';
            // }
            ?>
        </div> -->
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
                    <div href="<?php the_permalink(); ?>" class="flex mb-2">
                        <?php if (has_post_thumbnail()): ?>
                            <img src="<?php the_post_thumbnail_url(); ?>"
                                class="w-full <?php echo $image_height; ?> rounded-lg object-cover" alt="<?php the_title(); ?>">
                        <?php else: ?>
                            <img src="/wp-content/themes/aslanfood/img/tlo.jpeg"
                                class="w-full <?php echo $image_height; ?> rounded-lg object-cover" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                    </div>
                    <div>
                        <time class="text-lg" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d.m.Y'); ?></time>
                        <h2 class="font-bold text-2xl my-4">
                            <a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p class="mb-4"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <a href="<?php the_permalink(); ?>" class="text-primary font-semibold">Czytaj więcej →</a>
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