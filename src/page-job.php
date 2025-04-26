<?php
/* Template Name: Job */
get_header();
?>

<?php $page_id = 2; ?>

<?php get_template_part('partials/section-baner', null, ['bg' => '/wp-content/themes/aslanfood/img/bg-hero.jpg']); ?>

<section class="py-24">
  <div class="container mx-auto px-6">
    <h2 class="text-3xl font-bold mb-4">PRACA W ASLAN FOOD</h2>
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
      <!-- Sekcja 1: Możliwość rozwoju -->
      <div class="flex flex-col md:flex-row items-center md:space-x-12">
        <div class="md:w-1/2">
          <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f" alt="Możliwość rozwoju"
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
        </div>
      </div>

      <!-- Sekcja 2: Zawsze w ruchu! -->
      <div class="flex flex-col md:flex-row-reverse items-center md:space-x-12 md:space-x-reverse">
        <div class="md:w-1/2">
          <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d" alt="Zawsze w ruchu!"
            class="rounded-lg shadow-md">
        </div>
        <div class="md:w-1/2 mt-6 md:mt-0">
          <h3 class="text-2xl font-semibold mb-4">Zawsze w ruchu!</h3>
          <p class="mb-4">W Aslan Foods nie stoimy w miejscu – odważnie chwytamy każdą okazję. Klienci cenią nas za
            przedsiębiorczość, elastyczność i szybkość działania.</p>
          <p>To wszystko jest możliwe dzięki naszym wykwalifikowanym i zaangażowanym pracownikom! Dołącz do nas i
            wspólnie rozwijajmy się oraz osiągajmy sukcesy w świecie produkcji spożywczej.</p>
        </div>
      </div>

      <!-- Sekcja 3: Zrównoważone przedsiębiorstwo -->
      <div class="flex flex-col md:flex-row items-center md:space-x-12">
        <div class="md:w-1/2">
          <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6" alt="Zrównoważone przedsiębiorstwo"
            class="rounded-lg shadow-md">
        </div>
        <div class="md:w-1/2 mt-6 md:mt-0">
          <h3 class="text-2xl font-semibold mb-4">Zrównoważone przedsiębiorstwo</h3>
          <p class="mb-4">W Aslan Foods myślimy nie w perspektywie lat, lecz pokoleń. Nasza strategia zrównoważonego
            rozwoju opiera się na odpowiedzialnym zarządzaniu całym łańcuchem wartości.</p>
          <p>Organizujemy nasze procesy tak, aby pozostać zdrową firmą rodzinną i minimalizować wpływ na środowisko,
            produkując żywność o wysokiej wartości odżywczej.</p>
        </div>
      </div>

      <!-- Sekcja 4: Od start-upu do lidera -->
      <div class="flex flex-col md:flex-row-reverse items-center md:space-x-12 md:space-x-reverse">
        <div class="md:w-1/2">
          <img
            src="https://images.unsplash.com/photo-1592878995758-02b32ddabdd3?q=80&w=3126&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Od start-upu do lidera" class="rounded-lg shadow-md">
        </div>
        <div class="md:w-1/2 mt-6 md:mt-0">
          <h3 class="text-2xl font-semibold mb-4">Od start-upu do lidera</h3>
          <p class="mb-4">Od 2020 roku przeszliśmy drogę od lokalnego start-upu do międzynarodowego lidera rynku
            spożywczego. Działamy jak rodzina i stale się rozwijamy.</p>
          <p>Codziennie produkujemy m.in. 1200 ton kebabu i eksportujemy nasze produkty do krajów Europy.
            Innowacyjność i jakość to nasza codzienność.</p>
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