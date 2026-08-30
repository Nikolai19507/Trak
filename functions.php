<?php

define('IS_VITE_DEVELOPMENT', true);   // Режим разработки - (true) | Продакшн - (false) 


require get_template_directory() . '/inc/vite.php';
require get_template_directory() . '/inc/theme-setup.php';
require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/polylang.php';


// Временный скрипт для генерации дубликатов
add_action('init', function () {
    $original_id = 147; // Вставьте сюда ID вашего поста!

    for ($i = 1; $i <= 5; $i++) {
        $post = get_post($original_id, ARRAY_A);
        unset($post['ID']); // Удаляем ID, чтобы WP создал новую запись
        $post['post_title'] = $post['post_title'] . ' (Дубликат ' . $i . ')';
        wp_insert_post($post);
    }
});
