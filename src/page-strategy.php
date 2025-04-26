<?php
/* Template Name: Strategy */
get_header();
?>

<?php $page_id = 2; ?>  

<?php get_template_part('partials/section-baner', null, ['bg' => '/wp-content/themes/aslanfood/img/bg-hero.jpg']); ?>

<section class="py-24 bg-gray-3">
  <div class="container mx-auto px-6">
    <h2 class="text-3xl xl:text-5xl font-medium mb-12">Zrównoważony rozwój i innowacje</h2>

    <div>
      <div class="mb-6">
        <h3 class="text-2xl font-semibold mb-4">Innowacyjne technologie</h3>
        <p class="text-lg leading-relaxed">
          Wdrożyliśmy innowacyjne systemy odzysku ciepła i chłodzenia, dzięki którym osiągamy aż 80% oszczędności w zużyciu wody i energii. Nasze działania przyczyniają się do ochrony środowiska i tworzenia czystszej planety. Technologie te zostały zaprojektowane z myślą o maksymalnej wydajności i minimalizacji odpadów, co pomaga ograniczać nasz ślad ekologiczny.
        </p>
      </div>

      <div class="mb-6">
        <h3 class="text-2xl font-semibold mb-4">Zrównoważone surowce</h3>
        <p class="text-lg leading-relaxed">
          Nasze zaangażowanie w zrównoważony rozwój zaczyna się już u źródła. Dbamy o to, aby pozyskiwane przez nas surowce były produkowane w sposób odpowiedzialny i zrównoważony. Współpracujemy wyłącznie z dostawcami przestrzegającymi wysokich standardów zarządzania środowiskowego i etycznych praktyk produkcyjnych. Nasi dostawcy kierują się zasadami rolnictwa zrównoważonego i etycznej produkcji.
        </p>
      </div>

      <div class="mb-6">
        <h3 class="text-2xl font-semibold mb-4">Wizja przyszłości</h3>
        <p class="text-lg leading-relaxed">
          Nasza pasja do zrównoważonego rozwoju motywuje nas do nieustannego poszukiwania nowych sposobów na minimalizowanie wpływu na środowisko przy jednoczesnym utrzymaniu najwyższej jakości produktów. Dzięki temu budujemy lepszą przyszłość – nie tylko dla nas, lecz także dla przyszłych pokoleń.
        </p>
      </div>

      <div>
        <h3 class="text-2xl font-semibold mb-4">Produkcja ekologiczna</h3>
        <p class="text-lg leading-relaxed">
          W dziedzinie produkcji ekologicznej wyznaczamy wysokie standardy. Przestrzegając rygorystycznych regulacji dotyczących produkcji organicznej, zapewniamy niezawodność i jakość naszych ekologicznych produktów. Nasze zaangażowanie w procesy organiczne zostało potwierdzone uzyskaniem certyfikatu BIO – świadectwa naszej dbałości o jakość i zrównoważony rozwój.
        </p>
      </div>
    </div>
  </div>
</section>


<?php get_template_part('partials/section-contact'); ?>


<?php get_footer(); ?>