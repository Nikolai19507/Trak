<?php
add_action('after_setup_theme', function () {

    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 400,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    register_nav_menus([
        'top-menu'    => 'Header Menu',
        'bottom-menu' => 'Bottom Menu',
        'category-menu' => 'Сategory Menu',
        'about-menu' => 'About Menu',
        'media-menu' => 'Media Menu',
        'catalog-main-menu' => 'Catalog main menu',
        'catalog-side-menu' => 'Catalog side menu',
    ]);

    add_theme_support("title-tag");
    add_theme_support('post-thumbnails');
});



// add_filter('nav_menu_css_class', function ($classes) {
//     return array_intersect($classes, ['current-menu-item']);
// }, 10);

// add_filter('nav_menu_item_id', '__return_empty_string');

// Исправленная очистка классов: сохраняем только нужное --------------NEW
add_filter('nav_menu_css_class', function ($classes, $item) {
    // Белый список системных классов, которые нам точно нужны
    $allowed_classes = [
        'current-menu-item',      // Активная страница
        'menu-item-has-children'  // Род. элемент (нужен для вашего JS/CSS мегаменю)
    ];

    // Оставляем только классы из белого списка + кастомные классы, которые вы ввели в админке
    return array_intersect($classes, array_merge($allowed_classes, $item->classes));
}, 10, 2); // Обратите внимание на цифру 2 в конце (передаем 2 аргумента)

// Удаление ID элементов (оставляем, это полезно)
add_filter('nav_menu_item_id', '__return_empty_string');






    /**
     * Вывод превью (миниатюры) в таблицу списка записей типа "news"
     */

    // 1. Регистрируем новую колонку
    add_filter('manage_news_posts_columns', 'register_news_preview_column');
    function register_news_preview_column($columns) {
        $new_columns = array();
        
        foreach($columns as $key => $title) {
            // Вставляем колонку "Превью" прямо перед заголовком
            if ($key == 'title') {
                $new_columns['news_preview_col'] = 'Превью'; 
            }
            $new_columns[$key] = $title;
        }
        
        return $new_columns;
    }

    // 2. Наполняем созданную колонку картинками из базы данных
    add_action('manage_news_posts_custom_column', 'display_news_preview_column', 10, 2);
    function display_news_preview_column($column_name, $post_id) {
        if ($column_name == 'news_preview_col') {
            // Проверяем, загружена ли стандартная миниатюра ( Featured Image )
            if (has_post_thumbnail($post_id)) {
                // Выводим картинку в размере 55x55 пикселей со скруглением
                echo get_the_post_thumbnail($post_id, array(55, 55), array(
                    'style' => 'border-radius: 6px; object-fit: cover; width: 55px; height: 55px; display: block;'
                ));
            } else {
                // Если картинка не задана, выводим аккуратную серую заглушку
                echo '<span style="color: #b4b9be; font-size: 11px; font-style: italic;">Нет фото</span>';
            }
        }
    }
