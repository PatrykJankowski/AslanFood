<?php
/* Template Name: About Us */
get_header();
?>

<?php $page_id = 2; ?>

<section>
    <video autoplay muted loop playsinline class="w-full object-cover max-h-[800px]">
      <source src="/wp-content/themes/aslanfood/img/video.mp4" type="video/mp4">
      Twój przeglądarka nie obsługuje odtwarzania wideo.
    </video>
</section>


<section class="text-center py-24">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <!-- Lewa kolumna: Obraz -->
            <div class="relative mb-12">
                <div class="pr-12">
                    <img src="/wp-content/themes/aslanfood/img/mardin.webp" alt="Delicious Wraps"
                        class="object-cover rounded-xl">
                </div>
                <div
                    class="absolute -bottom-12 right-0 text-white bg-gray-2 p-8 sm:p-12 rounded-xl max-w-xs flex flex-col gap-4">
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
                <h2 class="text-3xl xl:text-5xl font-medium mb-6">
                    Aslan Food – łączymy tradycję ze zrównoważonym biznesem
                </h2>
                <p class="text-lg font-medium text-black">
                    Aslan Food Sp. z o.o. to rodzinna firma działająca w branży spożywczej, obecna na rynku od 2020
                    roku. Nasza siedziba mieści się w centralnej Polsce, jednak zasięg działalności obejmuje zarówno
                    rynek krajowy, jak i międzynarodowy. Specjalizujemy się w pozyskiwaniu, imporcie, eksporcie oraz
                    sprzedaży hurtowej i detalicznej produktów spożywczych najwyższej jakości.
                </p>
                <p class="mt-6">
                    Założycielem firmy jest Hasan Arslan Malik, pochodzi z malowniczego Mardin w Turcji — miejsca, gdzie
                    od wieków spotykają się smaki Bliskiego Wschodu. Z pasji do tradycyjnej kuchni i z troski o zdrowe
                    żywienie stworzył Aslan Food, łącząc bogactwo orientalnych produktów z nowoczesnym podejściem do
                    diety. Jego wizją jest oferowanie produktów, które nie tylko przypominają o kulinarnych korzeniach,
                    ale też wpisują się w świadome wybory współczesnych klientów. Aslan Food to firma budowana na
                    wartościach: jakości, autentyczności i zrównoważonym podejściu do biznesu.
                </p>
                <a href="/nasze-marki" class="button mt-6">Nasze marki</a>
            </div>
        </div>
    </div>
</section>


<section class="text-center py-24 bg-gray-3">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div class="text-left">
                <h2 class="text-3xl xl:text-5xl font-medium mb-6">
                    Aslan Food Sp. z o. o. dostarcza swoim klientom produkty, które spełniają najwyższe standardy jakości, świeżości i bezpieczeństwa żywności.
                </h2>
                <p class="text-lg font-medium text-black">
                    Współpracujemy z zaufanymi dostawcami z Polski i Turcji co pozwala nam oferować konkurencyjne
                    warunki oraz niezawodność w realizacji zamówień.
                </p>
                <p class="mt-6">
                    W ofercie firmy znajdują się starannie wyselekcjonowane herbaty, zboża, rośliny strączkowe, orzechy,
                    suszone owoce czy cukier pochodzące zarówno z upraw konwencjonalnych, jak i ekologicznych. Kluczowym
                    elementem asortymentu jest mięso kebabowe premium z certyfikatem Halal – produkt wyróżniający się
                    intensywnym smakiem i wysoką jakością, stworzony z myślą o gastronomii oraz wymagających klientach.
                    Aslan Food to również producent gotowych dań i przekąsek, takich jak klasyczne kanapki kebabowe,
                    warianty Adana i Kofta, burgery oraz panierowane produkty drobiowe.
                </p>
                <p class="mt-2">Obsługujemy zarówno klientów indywidualnych, jak i odbiorców instytucjonalnych –
                    hurtownie, sklepy, sieci handlowe oraz firmy z sektora HoReCa. Elastyczność, terminowość oraz
                    partnerskie podejście do współpracy stanowią fundament naszej działalności.
                </p>
                <p class="mt-2">Jako firma zorientowana na długofalowy rozwój, stawiamy na przejrzystość,
                    odpowiedzialność biznesową oraz budowanie trwałych relacji z naszymi kontrahentami. Nieustannie
                    poszukujemy nowych możliwości poszerzania oferty i podnoszenia jakości usług, aby jeszcze lepiej
                    odpowiadać na potrzeby dynamicznie zmieniającego się rynku spożywczego.
                </p>
            </div>

            <img src="/wp-content/themes/aslanfood/img/onas.webp" alt="O nas"
                class="w-full h-full object-cover rounded-xl">
        </div>
    </div>
</section>

<section class="py-24">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <img src="/wp-content/themes/aslanfood/img/praca2.webp" alt="O nas"
                class="w-full h-full object-cover rounded-xl">

            <div class="text-left md:order-last">
                <h2 class="text-3xl xl:text-5xl font-medium mb-6">Nasze wartości</h2>
                <p class="text-lg leading-relaxed">
                    Zrównoważony rozwój stanowi podstawę wszystkich naszych działań, ponieważ wierzymy, że lepsza przyszłość dla
                    kolejnych pokoleń zaczyna się już dziś. Zobowiązujemy się do produkcji wysokiej jakości produktów Aslan Food
                    w sposób przyjazny dla środowiska, z poszanowaniem dobrostanu naszych pracowników oraz społeczeństwa.
                </p>
                <p class="text-lg leading-relaxed mt-6">
                    Nasze zaangażowanie w społeczną odpowiedzialność biznesu (CSR) widać na każdym etapie działalności. Stawiamy
                    na surowce pochodzące ze zrównoważonych źródeł i maksymalne wykorzystanie ekologicznych zasobów.
                </p>
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