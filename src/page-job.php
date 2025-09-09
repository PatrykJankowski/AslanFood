<?php
/* Template Name: Job */
get_header();
?>

<?php $page_id = 2; ?>

<section class="py-24">
  <div class="container mx-auto px-6">
    <h2 class="text-3xl xl:text-5xl font-medium mb-4">Praca w Aslan Food</h2>
    <p class="mb-6 text-lg">Chcesz dołączyć do naszego zespołu?</p>
    <p class="mb-12 text-base max-w-3xl">
      Dołącz do nas i wspólnie kształtuj przyszłość zrównoważonego rozwoju i jakości w branży kebabów. Odkryj swoją
      kolejną szansę zawodową w Aslan Foods.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8 mb-10">
      <?php
      $oferty_pracy = new WP_Query([
        'category_name' => 'praca'
      ]);
      if ($oferty_pracy->have_posts()):
        while ($oferty_pracy->have_posts()):
          $oferty_pracy->the_post(); ?>
          <article class="border p-6 rounded-2xl shadow-md hover:shadow-lg transition-shadow duration-300">
            <h3 class="text-xl font-semibold mb-2"><?php the_title(); ?></h3>
            <div class="text-sm mb-4"><?php the_excerpt(); ?></div>
            <a href="<?php the_permalink(); ?>" class="text-primary font-medium hover:underline">Zobacz więcej</a>
          </article>
        <?php endwhile;
        wp_reset_postdata();
      else: ?>
        <p>Obecnie brak ofert pracy.</p>
      <?php endif; ?>
    </div>

    <div class="space-y-24 mt-24">
      <div class="flex flex-col md:flex-row items-center md:space-x-12">
        <div class="md:w-1/2">
          <img src="/wp-content/themes/aslanfood/img/praca.webp" alt="Możliwość rozwoju"
            class="rounded-lg shadow-md">
        </div>
        <div class="md:w-1/2 mt-6 md:mt-0">
          <h3 class="text-2xl font-semibold mb-4">Możliwość rozwoju</h3>
          <p class="mb-4">W Aslan Foods przykładamy dużą wagę do rozwoju zawodowego naszych pracowników. Oferujemy
            szeroki zakres szkoleń oraz możliwości awansu, które pomogą Ci doskonalić umiejętności i rozwijać karierę.
          </p>
          <p>Nasze zakłady są wyposażone w nowoczesne narzędzia edukacyjne, a my regularnie organizujemy szkolenia
            wewnętrzne i zewnętrzne – obejmujące m.in. bezpieczeństwo, zapobieganie pożarom czy umiejętności
            techniczne.</p>
            <h3 class="text-2xl font-semibold mb-4 mt-4">Zawsze w ruchu!</h3>
          <p class="mb-4">W Aslan Foods nie stoimy w miejscu – odważnie chwytamy każdą okazję. Klienci cenią nas za
            przedsiębiorczość, elastyczność i szybkość działania.</p>
          <p>To wszystko jest możliwe dzięki naszym wykwalifikowanym i zaangażowanym pracownikom! Dołącz do nas i
            wspólnie rozwijajmy się oraz osiągajmy sukcesy w świecie produkcji spożywczej.</p>
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