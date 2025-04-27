<?php get_header(); ?>
<section class="mt-24 py-24">
    <div class="container mx-auto px-6">
        <h1 class="text-3xl xl:text-5xl mb-6"><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
</section>
<?php get_footer(); ?>