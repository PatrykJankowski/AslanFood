<?php
// Default background image (change as needed)
$bg_image = '/wp-content/themes/perfectinfo/img/bg-hero.jpg';

// Allow passing custom background via arguments
if (!empty($args['bg'])) {
    $bg_image = esc_url($args['bg']);
}
?>

<section class="relative z-10 flex items-center justify-center h-[200px] xl:h-[300px] bg-cover bg-center"
    style="background-image: url('<?php echo $bg_image; ?>');" role="banner">
    <!-- Dark overlay -->
    <div class="absolute inset-0 bg-black opacity-50"></div>

    <div class="container mx-auto px-6 relative z-10">
        <h2 class="max-w-xl text-2xl xl:text-5xl text-white">
            Dołącz do nas w misji na rzecz zdrowego odżywiania
        </h2>
    </div>
</section>