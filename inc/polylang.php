<?php
add_action('after_setup_theme', function () {
    // Регистрируем текстовый домен Trak для WordPress
    load_theme_textdomain('Trak', get_template_directory() . '/languages');
});



add_action('init', function () {
    if (function_exists('pll_register_string')) {
        // Регистрируем строку для кнопки перевода
        pll_register_string('News Read More', 'Read more', 'Trak');
        pll_register_string('News No Photo', 'No photo', 'Trak');

        pll_register_string('News Back Button', 'Back', 'Trak');
        pll_register_string('News More Title', 'More news', 'Trak');

        pll_register_string('Status In Stock', 'In stock', 'Trak');
        pll_register_string('Status On Order', 'On order', 'Trak');
        pll_register_string('Status In Transit', 'In transit', 'Trak');


        pll_register_string('Product Favorite', 'Favorite button', 'single-product');
        pll_register_string('Product Share', 'Share button', 'single-product');

        pll_register_string('Button Specs More', 'See all specifications', 'single-product');

        pll_register_string('Link Terms Delivery', 'Terms of payment and delivery', 'single-product');
        pll_register_string('Link Terms Returns', 'Return policy', 'single-product');

        pll_register_string('Button Description More', 'See all Description', 'single-product');
    };
});
