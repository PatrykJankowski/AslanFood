<?php
$page_id = 2;
$bg_color = !empty($args['bg_color']) ? $args['bg_color'] : 'bg-white';
?>

<section class="py-24 <?php echo $bg_color; ?>">
    <div class="container mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
        
        <div class="text-center md:text-left">
            <h2 class="text-3xl font-bold">Kontakt</h2>
            <p class="text-lg mt-2">Zadzwoń lub napisz do nas</p>
            <p class="text-xl mt-4 !mb-2 font-bold"><?php the_field('company', $page_id); ?></p>

            <p class="flex items-center justify-center md:justify-start !mb-0">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1.25 2.75C1.25 1.92157 1.92157 1.25 2.75 1.25H5.20943C5.53225 1.25 5.81886 1.45657 5.92094 1.76283L7.0443 5.13291C7.16233 5.48699 7.00203 5.87398 6.6682 6.0409L4.97525 6.88737C5.80194 8.72091 7.27909 10.1981 9.11263 11.0247L9.9591 9.3318C10.126 8.99796 10.513 8.83767 10.8671 8.9557L14.2372 10.0791C14.5434 10.1811 14.75 10.4677 14.75 10.7906V13.25C14.75 14.0784 14.0784 14.75 13.25 14.75H12.5C6.2868 14.75 1.25 9.7132 1.25 3.5V2.75Z"
                        stroke="#2C2F24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <a class="ml-1" href="tel:+48<?php echo preg_replace('/\D/', '', get_field('phone', $page_id)); ?>">
                    <?php the_field('phone', $page_id); ?>
                </a>
            </p>

            <p class="flex items-center justify-center md:justify-start !mb-0 mt-2">
                <span class="text-primary text-xl">
                    <svg width="16" height="12" viewBox="0 0 16 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.25 3L7.16795 6.9453C7.6718 7.2812 8.3282 7.2812 8.83205 6.9453L14.75 3M2.75 11.25H13.25C14.0784 11.25 14.75 10.5784 14.75 9.75V2.25C14.75 1.42157 14.0784 0.75 13.25 0.75H2.75C1.92157 0.75 1.25 1.42157 1.25 2.25V9.75C1.25 10.5784 1.92157 11.25 2.75 11.25Z"
                            stroke="#2C2F24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <a class="ml-1" href="mailto:<?php the_field('email', $page_id); ?>">
                    <?php the_field('email', $page_id); ?>
                </a>
            </p>
        </div>

        <div class="text-center md:text-right">
            <h3 class="text-2xl font-semibold">Poznaj nasze produkty</h3>
            <p class="text-lg mt-2">Naturalne składniki, świetna jakość</p>
            <a href="/sklep" class="mt-6 button button--primary">Przejdź do sklepu</a>
        </div>
    </div>
</section>
