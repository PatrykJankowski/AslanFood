<?php
/* Template Name: Partnership */
get_header();
?>

<?php $page_id = 2; ?>

<?php get_template_part('partials/section-baner', null, ['bg' => '/wp-content/themes/aslanfood/img/bg-hero.jpg']); ?>

<section class="text-center py-24 bg-gray-3">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div class="text-left">
                <h2 class="text-3xl xl:text-5xl mb-6">
                    Współpraca
                </h2>
                <p>W Aslan Food wierzymy, że silne partnerstwo to fundament skutecznego biznesu. Dlatego oferujemy różne
                    modele współpracy, dopasowane do potrzeb naszych kontrahentów – od sprzedaży hurtowej, przez rozwój
                    sieci franczyzowej, po produkcję na zamówienie pod marką własną.</p>
                <div class="flex flex-col gap-6 mt-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-2">Sprzedaż B2B</h3>
                        <p class="text-black text-base">
                            Współpracujemy z hurtowniami, sklepami, sieciami handlowymi i HoReCa. Oferujemy szeroki
                            wybór wysokiej jakości produktów w atrakcyjnych cenach, z gwarancją stałych dostaw i
                            jakości.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-2">Franczyza</h3>
                        <p class="text-black text-base">
                            Oferujemy model franczyzowy oparty na sprzedaży kanapek i przekąsek pod marką Kebok.
                            Zapewniamy pełne wsparcie operacyjne, logistyczne i marketingowe.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-2">Marka własna</h3>
                        <p class="text-black text-base">
                            Produkujemy herbaty, zboża i gotowe dania pod marką klienta. Wspieramy w recepturze,
                            opakowaniu, produkcji i logistyce – idealne dla firm chcących wprowadzić własną linię
                            produktów.
                        </p>
                    </div>
                </div>

                <hr class="my-6">

                <p>Jeśli są Państwo zainteresowani współpracą lub chcą poznać szczegóły oferty, zapraszamy do kontaktu.
                    Chętnie przygotujemy indywidualną propozycję dopasowaną do profilu Państwa działalności.</p>

                <a href="/kontakt" class="button button--secondary mt-6">Skontaktuj się</a>
            </div>

            <img src="/wp-content/themes/aslanfood/img/partnership.webp" alt="Partnership"
                class="h-full object-cover rounded-xl">
        </div>
    </div>
</section>

<?php get_template_part('partials/section-contact'); ?>


<?php get_footer(); ?>