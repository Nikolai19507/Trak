<section>
    <div class="brands">
        <div class="brands__marquee">
            <?php
            // 1. Создаем массив со всеми вашими логотипами (всего 5 штук, пишем один раз)
            $logos = ['foton-logo.png', 'mercedes.svg', 'isuzu.svg', 'hyundai.svg', 'hino.svg', 'man.svg', 'jac.svg'];

            // Получаем базовый путь к папке картинок, чтобы не дублировать длинную функцию
            $img_path = get_template_directory_uri() . '/src/assets/images/svg/';

            // 2. Делаем цикл для создания двух одинаковых дорожек (основной и бесшовной)
            for ($i = 1; $i <= 2; $i++) :
                // Для второго трека добавляем атрибут скрытия от скринридеров
                $aria_hidden = ($i === 2) ? ' aria-hidden="true"' : '';
            ?>
                <div class="brands__track" <?php echo $aria_hidden; ?>>
                    <?php
                    // Чтобы дорожка была длинной и не было швов, выводим массив логотипов дважды внутри трека
                    for ($repeat = 0; $repeat < 2; $repeat++) {
                        foreach ($logos as $logo) {
                            echo '<img src="' . $img_path . $logo . '" alt="">';
                        }
                    }
                    ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>