<?php

/**
 * Настройка подключения Vite
 */

function my_theme_scripts()
{
    $vite_server = 'http://localhost:5173';

    // 1. Проверяем режим: если константа IS_VITE_DEVELOPMENT = true — работаем через Vite
    $is_development = (defined('IS_VITE_DEVELOPMENT') && IS_VITE_DEVELOPMENT === true);

    if ($is_development) {
        // --- РЕЖИМ РАЗРАБОТКИ --- ПОДКЛЮЧЕНИЕ ШРИФТОВ
        wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;800&display=swap', [], null);
        // --------
        wp_enqueue_script('vite-client', $vite_server . '/@vite/client', [], null, true);
        wp_enqueue_script('my-theme-main', $vite_server . '/src/assets/js/main.js', [], null, true);
    } else {
        // --- РЕЖИМ ПРОДАКШЕНА (БИЛД) ---
        $manifest_path = get_template_directory() . '/dist/.vite/manifest.json';

        if (file_exists($manifest_path)) {
            $manifest = json_decode(file_get_contents($manifest_path), true);
            $entry_point = 'src/assets/js/main.js';

            if (isset($manifest[$entry_point])) {
                // Подключаем JS
                wp_enqueue_script('my-theme-main', get_template_directory_uri() . '/dist/' . $manifest[$entry_point]['file'], [], null, true);

                // Подключаем CSS
                if (isset($manifest[$entry_point]['css'])) {
                    foreach ($manifest[$entry_point]['css'] as $css_file) {
                        wp_enqueue_style('my-theme-style', get_template_directory_uri() . '/dist/' . $css_file);
                    }
                }
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');

/**
 * Добавляем type="module" для всех скриптов Vite
 */
add_filter('script_loader_tag', function ($tag, $handle, $src) {
    if (in_array($handle, ['vite-client', 'my-theme-main'])) {
        return '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}, 10, 3);
