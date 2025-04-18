<?php
/* Template Name: Brands */
get_header();
?>

<?php $page_id = 2; ?>

<?php get_template_part('partials/section-baner', null, ['bg' => '/wp-content/themes/aslanfood/img/bg-hero.jpg']); ?>


<section class="py-24">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl xl:text-5xl mb-16">Nasze marki</h2>

        <div class="space-y-24">
            <div class="md:grid md:grid-cols-12 md:gap-12 items-start">
                <div class="flex justify-center items-center md:col-span-2 mb-6 md:mb-0 h-full">
                    <img src="/wp-content/themes/aslanfood/img/kebok.png" alt="Logo Kebok" class="h-16">
                </div>
                <div class="md:col-span-10">
                    <h3 class="text-2xl font-semibold mb-2">Kebok</h3>
                    <p class="italic mb-4">Smak oparty na jakości. Produkty, którym możesz zaufać.</p>
                    <p class="leading-relaxed text-gray-800">
                        Kebok to wiodąca marka własna Aslan Food, obejmująca szeroką gamę produktów spożywczych. Pod tym
                        szyldem oferujemy zarówno chłodzone i mrożone kanapki, jak i najwyższej jakości rośliny
                        strączkowe
                        oraz produkty sypkie. Marka powstała z myślą o klientach szukających sprawdzonych rozwiązań –
                        zarówno
                        w handlu detalicznym, jak i profesjonalnej gastronomii. Każdy produkt sygnowany logotypem Kebok
                        to
                        gwarancja powtarzalności smaku, bezpieczeństwa surowca i efektywnej logistyki.
                    </p>
                    <a href="/marka/kebok/" class="button mt-4">Zobacz w sklepie</a>
                </div>
            </div>

            <div class="md:grid md:grid-cols-12 md:gap-12 items-start">
                <div class="flex justify-center items-center md:col-span-2 mb-6 md:mb-0 h-full">
                    <img src="/wp-content/themes/aslanfood/img/marida.png" alt="Logo Marida" class="h-16">
                </div>
                <div class="md:col-span-10">
                    <h3 class="text-2xl font-semibold mb-2">Marida</h3>
                    <p class="italic mb-4">Z upraw pełnych słońca. Dla chwil pełnych smaku.</p>
                    <p class="leading-relaxed text-gray-800">
                        Marida to marka wysokiej jakości herbat pochodzących z wybranych plantacji na Sri Lance –
                        regionu o
                        wyjątkowych warunkach uprawy, słynącego z tradycji i czystości natury. W ofercie znajdują się
                        klasyczne
                        czarne i zielone herbaty w wielu smakach i aromatach, tworzone z naturalnych składników, bez
                        sztucznych
                        dodatków. To codzienna chwila spokoju zamknięta w aromatycznej filiżance. Herbaty Marida łączą
                        głębię
                        smaku z autentycznym pochodzeniem – oferując przyjemność, która zakorzeniona jest w tradycji.
                    </p>
                    <a href="/marka/marida/" class="button mt-4">Zobacz w sklepie</a>
                </div>
            </div>

            <div class="md:grid md:grid-cols-12 md:gap-12 items-start">
                <div class="flex justify-center items-center md:col-span-2 mb-6 md:mb-0 h-full">
                    <img src="/wp-content/themes/aslanfood/img/aslan.png" alt="Logo Aslan" class="h-16">
                </div>
                <div class="md:col-span-10">
                    <h3 class="text-2xl font-semibold mb-2">Aslan</h3>
                    <p class="italic mb-4">Jakość, która wyrasta z natury.</p>
                    <p class="leading-relaxed text-gray-800">
                        Marka Aslan obejmuje starannie wyselekcjonowane produkty sypkie – rośliny strączkowe, zboża oraz
                        inne
                        surowce pochodzenia roślinnego, które znajdują szerokie zastosowanie w kuchniach całego świata.
                        To linia
                        stworzona z myślą o klientach ceniących jakość, przejrzystość pochodzenia i bezpieczeństwo
                        żywności.
                        Produkty Aslan łączą tradycję i nowoczesność – idealne zarówno dla sektora gastronomicznego, jak
                        i
                        odbiorców detalicznych, którzy szukają sprawdzonych i wartościowych składników.
                    </p>
                    <a href="/marka/aslan/" class="button mt-4">Zobacz w sklepie</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$args = array(
    'bg_color' => 'bg-gray-3',
);
get_template_part('partials/section-contact', null, $args);
?>

<?php get_footer(); ?>