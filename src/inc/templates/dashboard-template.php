<div class="wrap" style="margin: 20px 20px 20px 0px;">

    <!-- SVG Logo -->
    <div style="margin-bottom: 30px;">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Aslan Food" style="height: 60px;">
    </div>

    <h1 style="font-size: 32px; font-weight: 600; margin-bottom: 30px;">Panel administratora</h1>

    <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-bottom: 30px;">
        <!-- Do realizacji -->
        <div style="flex: 1; min-width: 280px; background: #fff; border: 1px solid #eee; padding: 24px; border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.06);">
            <h2 style="margin: 0; font-size: 20px; color: #ffb900;">Do realizacji</h2>
            <div style="font-size: 36px; line-height: 1; font-weight: 700; margin: 12px 0; color: #ffb900;">
                <?php echo $stats['processing_orders']; ?>
            </div>
            <a href="/wp-admin/edit.php?post_type=shop_order&status=processing" class="button">Zobacz zamówienia</a>
        </div>

        <!-- Zrealizowane -->
        <div style="flex: 1; min-width: 280px; background: #fff; border: 1px solid #eee; padding: 24px; border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.06);">
            <h2 style="margin: 0; font-size: 20px; color: #00a32a;">Zrealizowane</h2>
            <div style="font-size: 36px; line-height: 1; font-weight: 700; margin: 12px 0; color: #00a32a;">
                <?php echo $stats['completed_orders']; ?>
            </div>
            <a href="/wp-admin/edit.php?post_type=shop_order&status=completed" class="button">Zobacz zamówienia</a>
        </div>
    </div>

    <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-bottom: 30px;">
        <!-- Produkty -->
        <div style="flex: 1; min-width: 280px; background: #fff; border: 1px solid #eee; padding: 24px; border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.06);">
            <h2 style="margin-top: 0;">Produkty</h2>
            <p>Zarządzaj asortymentem sklepu</p>
            <a href="/wp-admin/edit.php?post_type=product" class="button button-primary">Przejdź do produktów</a>
            <a href="/wp-admin/post-new.php?post_type=product" class="button" style="margin-left: 10px;">Dodaj nowy</a>
        </div>

        <!-- Analityka -->
        <div style="flex: 1; min-width: 280px; background: #fff; border: 1px solid #eee; padding: 24px; border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.06);">
            <h2 style="margin-top: 0;">Analityka</h2>
            <p>Pełne statystyki i raporty</p>
            <a href="/wp-admin/admin.php?page=wc-admin&path=%2Fanalytics%2Foverview" class="button button-primary">Przejdź do analityki</a>
        </div>
    </div>

    <!-- Szybkie akcje -->
    <div style="background: #fff; border: 1px solid #eee; padding: 24px; border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.06);">
        <h2 style="margin-top: 0;">🚀 Szybkie akcje</h2>
        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <a href="https://panel.tpay.com/" target="_blank" class="button">Sprawdź płatności w Tpay</a>
            <a href="/wp-admin/users.php?role=customer" class="button">Klienci</a>
            <a href="/wp-admin/edit.php?post_type=post&cat=1" class="button">Aktualności</a>
            <a href="/wp-admin/edit.php?post_type=post&cat=70" class="button">Oferty pracy</a>
        </div>
    </div>

</div>
