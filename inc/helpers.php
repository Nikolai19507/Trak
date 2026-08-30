<?php

function add_svg_to_upload_mimes($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'add_svg_to_upload_mimes');

// НАШ НОВЫЙ ХЕЛПЕР ДЛЯ ВЫВОДА КНОПОК
function render_theme_btn($text, $link = '', $modifier = 'btn--fill', $extra_classes = '')
{
    $classes = 'btn ' . $modifier . ' ' . $extra_classes;
    $classes = trim(esc_attr($classes));

    $arrow_svg = '
    <svg class="btn-arrow" width="21" height="11" viewBox="0 0 21 11" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20.495 5.64927C20.7683 5.3759 20.7683 4.93269 20.495 4.65932L16.0402 0.204549C15.7668 -0.0688176 15.3236 -0.0688176 15.0503 0.204549C14.7769 0.477917 14.7769 0.921132 15.0503 1.1945L19.0101 5.1543L15.0503 9.11409C14.7769 9.38746 14.7769 9.83068 15.0503 10.104C15.3236 10.3774 15.7668 10.3774 16.0402 10.104L20.495 5.64927ZM0 5.8543H20V4.4543H0V5.8543Z" fill="black"/>
    </svg>';

    // Текст + стрелка внутри
    $inner_html = esc_html($text) . $arrow_svg;

    // Если ссылки нет — выводим <button>, если есть — <a>
    if (empty($link)) {
        return '<button class="' . $classes . '">' . $inner_html . '</button>';
    }

    return '<a href="' . esc_url($link) . '" class="' . $classes . '">' . $inner_html . '</a>';
}
