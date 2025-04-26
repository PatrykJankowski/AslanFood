<?php get_header(); ?>

<?php get_template_part('partials/section-baner', null, ['bg' => '/wp-content/themes/aslanfood/img/bg-hero.jpg']); ?>

<article class="container mx-auto py-24 px-4 post">
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="relative">
                    <?php if (has_post_thumbnail()): ?>
                        <?php
                        $alt_text = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);

                        if (empty($alt_text)) {
                            $alt_text = get_the_title();
                        }

                        the_post_thumbnail('large', [
                            'class' => 'w-full h-96 rounded-lg object-cover',
                            'alt' => esc_attr($alt_text)
                        ]);
                        ?>
                    <?php else: ?>
                        <img src="/wp-content/uploads/2025/04/job-1024x683.jpg"
                            class="w-full <?php echo $image_height; ?> rounded-lg object-cover" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                </div>

                <div>
                    <h2 class="text-5xl font-medium"><?php the_title(); ?></h2>
                    <div class="text-sm mb-4">
                        <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                    </div>

                    <div>
                        <?php if (has_excerpt()): ?>
                            <p><?php echo get_the_excerpt(); ?></p>
                        <?php else: ?>
                            <p><?php echo wp_trim_words(get_the_content(), 50, '...'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="post-content text-lg">
                <?php the_content(); ?>
            </div>

        <?php endwhile; endif; ?>
</article>

<?php
$args = array(
    'bg_color' => 'bg-gray-3',
);
get_template_part('partials/section-contact', null, $args);
?>

<?php get_footer(); ?>