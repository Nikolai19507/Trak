<footer class="footer">
    <div class="container">
        <div class="footer__rows">
            <div class="footer__contact">
                <a class="footer__phone" href="tel:000000">Тел/факс: 8(831)225-00-55</a>
                <a class="footer__email" href="#">Email: info@rtrf.ru</a>
                <address class="footer__adress">Нижний Новгород, ул. Торфяная, 35</address>
                <button class="footer__btn btn btn--fill">Заказать звонок</button>
            </div>
            <?php
            wp_nav_menu([
                'theme_location'  => 'bottom-menu',
                'container'       => 'nav',
                'container_class' => 'footer__menu',
                'container_id'    => '',
                'menu_class'      => 'footer__menu-list js-mobile-menu',
                'menu_id'         => '',
                'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                'link_before'     => '<span class="footer__menu-parent-link">',
                'link_after'      => '</span>',
            ]);
            ?>

            <div class="footer__copyright test">
                <p> Информация на сайте не является публичной офертой и носит исключительно информационный характер</p>
                <p> 2009 - 2021 © Rus - Track</p>
            </div>
            <div class="footer__social">
                <ul class="footer__links">
                    <li class="footer__link"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/svg/facebook.svg" alt=""></a></li>
                    <li class="footer__link"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/svg/twitter.svg" alt=""></a></li>
                    <li class="footer__link"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/svg/google.svg" alt=""></a></li>
                    <li class="footer__link"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/svg/inst.svg" alt=""></a></li>
                    <li class="footer__link"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/svg/youtube.svg" alt=""></a></li>
                </ul>
            </div>

        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>