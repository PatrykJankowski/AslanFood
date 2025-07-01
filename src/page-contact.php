<?php
/* Template Name: Contact Page */
get_header();
?>

<section class="py-24">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl xl:text-5xl font-medium mb-12">Kontakt</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-12">
            <div class="space-y-8">
                <div>
                    <h3 class="text-xl font-semibold">Dane firmowe</h3>
                    <p class="mt-2"><?php the_field('company'); ?></p>
                    <p class="mt-2"><?php the_field('street'); ?>, <?php the_field('postcode'); ?>
                        <?php the_field('city'); ?>
                    </p>
                    <p class="mt-2">NIP: <?php the_field('nip'); ?></p>
                    <p class="mt-2">REGON: <?php the_field('regon'); ?></p>
                    <p class="mt-2">KRS: <?php the_field('krs'); ?></p>
                </div>

                <div class="mt-6">
                    <h3 class="text-xl font-semibold">Magazyn</h3>
                    <p class="mt-2">ul. Trakt Dębski 45, 05-311 Dębe Wielkie</p>
                    <p class="mt-2"><a href="tel:+48<?php echo preg_replace('/\D/', '', get_field('phone')); ?>">
                            <?php the_field('phone'); ?>
                        </a></p>
                    <p class="mt-2"><a href="mailto:<?php the_field('email'); ?>">
                            <?php the_field('email'); ?>
                        </a></p>
                    <p class="mt-4 font-semibold">Zamówienia hurtowe:</p>
                    <p class="mt-2"><a href="tel:+48<?php echo preg_replace('/\D/', '', get_field('phone')); ?>">
                            <?php the_field('phone'); ?>
                        </a></p>
                    <p class="mt-2">zamowienia@aslan-food.com</p>
                </div>
            </div>
            <div>
                <?php echo do_shortcode('[contact-form-7 id="7652d2b" title="Formularz kontaktowy"]'); ?>
            </div>
        </div>
    </div>
</section>

<?php
function display_team_section($section_name, $prefix, $max_people = 4)
{
    ?>
    <div class="">
        <h3 class="text-2xl font-semibold mb-8"><?= esc_html($section_name); ?></h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
            <?php for ($i = 1; $i <= $max_people; $i++): ?>
                <?php
                $current_prefix = $prefix . $i . '_';
                $name = get_field($current_prefix . 'name');
                if (!$name)
                    continue;
                ?>
                <div class="team-member">
                    <h4 class="font-bold"><?= esc_html($name); ?></h4>
                    <p><?= esc_html(get_field($current_prefix . 'position')); ?></p>
                    <?php if ($location = get_field($current_prefix . 'location')): ?>
                        <p><?= esc_html($location); ?></p>
                    <?php endif; ?>
                    <?php if ($email = get_field($current_prefix . 'email')): ?>
                        <p><a href="mailto:<?= esc_attr($email); ?>"><?= esc_html($email); ?></a></p>
                    <?php endif; ?>
                    <?php if ($tel1 = get_field($current_prefix . 'tel1')): ?>
                        <p><?= esc_html($tel1); ?></p>
                    <?php endif; ?>
                    <?php if ($tel2 = get_field($current_prefix . 'tel2')): ?>
                        <p><?= esc_html($tel2); ?></p>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <?php
} ?>

<section class="py-24 bg-gray-3">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl xl:text-5xl font-medium mb-12">Nasz Zespół</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <?php
            display_team_section('Dział Handlowy', 'sales_person_', 4);
            display_team_section('Marketing i IT', 'marketing_person_', 4);
            display_team_section('Produkcja', 'production_person_', 4);
            display_team_section('Zarząd i Księgowość', 'management_person_', 4);
            ?>
        </div>
    </div>
</section>


<section>
<iframe style="filter: grayscale(.3)" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27663.196738566654!2d21.431264285022767!3d52.20514930104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471f29624c19937f%3A0xfb7f0db68570bebc!2sTrakt%20D%C4%99bski%2045%2C%2005-311%20D%C4%99be%20Wielkie!5e0!3m2!1spl!2spl!4v1745748537631!5m2!1spl!2spl" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<?php get_footer(); ?>