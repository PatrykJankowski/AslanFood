<?php
/* Template Name: Szablon domyślny */
get_header();
?>

<section class="container mx-auto py-24 px-4 single-page">
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <h2 class="text-5xl font-medium"><?php the_title(); ?></h2>
            </div>

            <!-- Post Content -->
            <div class="post-content text-lg">
                <?php the_content(); ?>
            </div>

        <?php endwhile; endif; ?>
</section>

<?php get_template_part('partials/section-contact'); ?>


<?php get_footer(); ?>