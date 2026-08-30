<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>

    <style>
        :root {
            --theme-color: <?php echo function_exists('get_field') ? (get_field('main_color', 'option') ?: '#ff0000') : '#ff0000'; ?>;
            --bg-color: <?php echo function_exists('get_field') ? (get_field('site_bg', 'option') ?: '#antiquewhite') : '#antiquewhite'; ?>;
        }
    </style>
    
</head>

<body <?php body_class(); ?>>

    <header class="header">

        <!-- Верхняя линия (телефон, инфо, меню самописное) -->
        <div class="header__top ">
            <div class="container">
                <div class="header__top-row">
                    <div class="header__logo logo">
                        <?php require get_template_directory() . '/inc/logo.php'; ?>
                        <span class="header__logo-subtext">производство и продажа
                            автоспецтехники</span>
                    </div>

                    <div class="header__info">
                        <div class="header__info-item">
                            <div class="work-time">
                                <div class="work-time__label">Время работы
                                    <span class="work-time__svg">
                                        <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 9L12 0H0L6 9Z" fill="#FEC80B" />
                                        </svg>
                                    </span>
                                </div>
                                <ul class="work-time__list">
                                    <li>Пн-пт: с 8:00 до 18:00</li>
                                    <li>Сб-вс: с 10:00 до 16:00</li>
                                </ul>
                                <div class="work-time__adress">г. Нижний Новгород ул. Торфяная, 35</div>
                            </div>
                        </div>

                        <div class="header__info-item">
                            <div class="item-phone-wrap">
                                <div class="item-phone">Для регионов: 8 (800) 77-77-210</div>
                                <div class="item-phone">Нижний Новгород: 8 (831) 225-00-55</div>
                            </div>
                            <div class="header__callback callback">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M23.9993 17.9686V21.5816C24.0006 21.917 23.9318 22.249 23.7971 22.5563C23.6625 22.8636 23.465 23.1395 23.2174 23.3662C22.9698 23.593 22.6774 23.7656 22.359 23.8731C22.0407 23.9805 21.7033 24.0204 21.3686 23.9902C17.6554 23.5875 14.0885 22.3212 10.9547 20.293C8.03906 18.4439 5.56712 15.9769 3.7144 13.067C1.67503 9.92519 0.40589 6.34809 0.00979454 2.62554C-0.0203606 2.29251 0.0192973 1.95685 0.126243 1.63995C0.233188 1.32305 0.405079 1.03185 0.63097 0.784879C0.85686 0.537911 1.1318 0.34059 1.43829 0.20548C1.74478 0.0703704 2.0761 0.000431667 2.41115 0.000116762H6.03129C6.61692 -0.00563562 7.18466 0.201333 7.6287 0.582446C8.07273 0.963559 8.36276 1.49281 8.44472 2.07155C8.59752 3.22778 8.88089 4.36305 9.28942 5.4557C9.45178 5.88675 9.48691 6.35522 9.39067 6.8056C9.29443 7.25597 9.07084 7.66938 8.7464 7.99682L7.21387 9.52631C8.9317 12.5414 11.4331 15.0378 14.4542 16.7522L15.9867 15.2228C16.3148 14.899 16.729 14.6758 17.1803 14.5798C17.6315 14.4837 18.1009 14.5188 18.5328 14.6808C19.6277 15.0885 20.7652 15.3713 21.9237 15.5238C22.5099 15.6064 23.0452 15.901 23.4279 16.3518C23.8106 16.8026 24.0139 17.378 23.9993 17.9686Z" fill="black" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Нижняя линия (логотип, поиск, каталог) -->
        <div class="header__bottom">
            <div class="container">
                <div class="header__bottom-wrapper">
                    <div class="header__catalog">
                        <div class="catalog">
                            <button data-catalog="btn" class="catalog__btn btn">
                                <div id="burger" class="catalog__btn-burger">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <span class="catalog__btn-text">Каталог</span>
                            </button>
                            <div data-catalog="dropdown" class="catalog__dropdown">
                                <div class="catalog__columns">
                                    <?php
                                    wp_nav_menu([
                                        'theme_location'  => 'catalog-main-menu',
                                        'container'       => 'nav',
                                        'container_class' => 'catalog-main-menu',
                                        'container_id'    => '',
                                        'menu_class'      => 'catalog-main-menu__list js-mobile-menu',
                                        'menu_id'         => '',
                                        'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                                        'link_before'     => '<span class="catalog-main-menu__first-link">',
                                        'link_after'      => '</span>',
                                    ]);
                                    wp_nav_menu([
                                        'theme_location'  => 'catalog-side-menu',
                                        'container'       => 'nav',
                                        'container_class' => 'catalog-side-menu',
                                        'container_id'    => '',
                                        'menu_class'      => 'catalog-side-menu__list',
                                        'menu_id'         => '',
                                        'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header__logo logo header__bottom-logo">
                        <?php require get_template_directory() . '/inc/logo.php'; ?>
                    </div>
                    <div class="header__bottom-menu">
                        <?php
                        wp_nav_menu([
                            'theme_location'  => 'top-menu',
                            'container'       => 'nav',
                            'container_class' => 'header-nav',
                            'container_id'    => '',
                            'menu_class'      => 'header-nav__list',
                            'menu_id'         => '',
                            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                        ]);
                        ?>
                    </div>
                    <div class="header__bottom-search">
                        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                            <label class="search-form__label">
                                <input type="search" class="search-form__field" placeholder="Поиск по сайту..." value="<?php echo get_search_query(); ?>" name="s" />
                            </label>
                            <button type="submit" class="search-form__submit">
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.59159 0.875C4.32984 0.875 0.875 4.40334 0.875 8.75578C0.875 13.1082 4.32984 16.6366 8.59159 16.6366C10.4417 16.6366 12.1397 15.9716 13.469 14.863L18.7766 19.9056C19.1009 20.2137 19.6084 20.195 19.9102 19.8638C20.2119 19.5326 20.1936 19.0142 19.8692 18.7061L14.6006 13.7005C15.6687 12.3483 16.3082 10.6283 16.3082 8.75578C16.3082 4.40335 12.8534 0.875 8.59159 0.875ZM2.47917 8.75578C2.47917 5.30815 5.21579 2.5133 8.59159 2.5133C11.9674 2.5133 14.704 5.30815 14.704 8.75578C14.704 12.2034 11.9674 14.9983 8.59159 14.9983C5.21579 14.9983 2.47917 12.2034 2.47917 8.75578Z" fill="black" />
                                </svg>
                            </button>
                        </form>
                        <div class="search-toggle-mob">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.59159 0.875C4.32984 0.875 0.875 4.40334 0.875 8.75578C0.875 13.1082 4.32984 16.6366 8.59159 16.6366C10.4417 16.6366 12.1397 15.9716 13.469 14.863L18.7766 19.9056C19.1009 20.2137 19.6084 20.195 19.9102 19.8638C20.2119 19.5326 20.1936 19.0142 19.8692 18.7061L14.6006 13.7005C15.6687 12.3483 16.3082 10.6283 16.3082 8.75578C16.3082 4.40335 12.8534 0.875 8.59159 0.875ZM2.47917 8.75578C2.47917 5.30815 5.21579 2.5133 8.59159 2.5133C11.9674 2.5133 14.704 5.30815 14.704 8.75578C14.704 12.2034 11.9674 14.9983 8.59159 14.9983C5.21579 14.9983 2.47917 12.2034 2.47917 8.75578Z" fill="black" />
                            </svg>
                        </div>
                    </div>
                    <div class="header__bottom-favorite">
                        <svg class="favorite" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.1035 1.9502C23.0434 1.9502 23.9753 2.14446 24.8457 2.52344C25.6074 2.85515 26.3104 3.32277 26.9229 3.90625L27.1797 4.16406C27.8497 4.86798 28.3836 5.70555 28.748 6.62988C29.1124 7.55424 29.2998 8.5464 29.2998 9.54883C29.2998 10.5513 29.1125 11.5434 28.748 12.4678C28.4292 13.2765 27.9807 14.0186 27.4248 14.6631L27.1797 14.9336L25.6582 16.5322L14.999 27.7344L4.34082 16.5322L2.81934 14.9336C1.46596 13.5111 0.700231 11.5747 0.700195 9.54883C0.700195 7.52298 1.46601 5.58655 2.81934 4.16406C4.17173 2.74273 5.99871 1.95117 7.89551 1.95117C9.79224 1.9512 11.6183 2.7428 12.9707 4.16406H12.9717L14.4922 5.7627C14.6243 5.90156 14.8083 5.98047 15 5.98047C15.1915 5.98036 15.3748 5.90146 15.5068 5.7627L17.0283 4.16406C17.698 3.45993 18.4909 2.90254 19.3613 2.52344C20.2317 2.14442 21.1636 1.95024 22.1035 1.9502Z" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="header__callback callback pc-hidden">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.9993 17.9686V21.5816C24.0006 21.917 23.9318 22.249 23.7971 22.5563C23.6625 22.8636 23.465 23.1395 23.2174 23.3662C22.9698 23.593 22.6774 23.7656 22.359 23.8731C22.0407 23.9805 21.7033 24.0204 21.3686 23.9902C17.6554 23.5875 14.0885 22.3212 10.9547 20.293C8.03906 18.4439 5.56712 15.9769 3.7144 13.067C1.67503 9.92519 0.40589 6.34809 0.00979454 2.62554C-0.0203606 2.29251 0.0192973 1.95685 0.126243 1.63995C0.233188 1.32305 0.405079 1.03185 0.63097 0.784879C0.85686 0.537911 1.1318 0.34059 1.43829 0.20548C1.74478 0.0703704 2.0761 0.000431667 2.41115 0.000116762H6.03129C6.61692 -0.00563562 7.18466 0.201333 7.6287 0.582446C8.07273 0.963559 8.36276 1.49281 8.44472 2.07155C8.59752 3.22778 8.88089 4.36305 9.28942 5.4557C9.45178 5.88675 9.48691 6.35522 9.39067 6.8056C9.29443 7.25597 9.07084 7.66938 8.7464 7.99682L7.21387 9.52631C8.9317 12.5414 11.4331 15.0378 14.4542 16.7522L15.9867 15.2228C16.3148 14.899 16.729 14.6758 17.1803 14.5798C17.6315 14.4837 18.1009 14.5188 18.5328 14.6808C19.6277 15.0885 20.7652 15.3713 21.9237 15.5238C22.5099 15.6064 23.0452 15.901 23.4279 16.3518C23.8106 16.8026 24.0139 17.378 23.9993 17.9686Z" fill="black" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </header>