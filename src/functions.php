<?php

$includes = [
    'inc/cleanup.php',
    'inc/theme-and-seo.php',
    'inc/woocommerce.php',
    'inc/dashboard.php'
];

foreach ($includes as $file) {
    require_once get_template_directory() . '/' . $file;
}