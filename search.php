<?php get_header(); ?>

<main class="search-results-page" style="padding: 60px 0; background: #f9f9f9;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 15px;">

        <!-- Заголовок страницы с выводом того, что искал пользователь -->
        <h1 class="search-results-page__title" style="font-size: 28px; margin-bottom: 30px; font-weight: 700;">
            Результаты поиска по запросу:
            <span style="color: #FFC107;">«<?php echo get_search_query(); ?>»</span>
        </h1>

        <div class="search-results-page__grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px;">

            <?php
            // Стандартный цикл WordPress: если совпадения в базе данных есть
            if (have_posts()) :
                while (have_posts()) : the_post();
            ?>

                    <!-- Карточка одного найденного элемента (поста, страницы или товара) -->
                    <article class="product-card" style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); display: flex; flex-direction: column;">

                        <!-- Вывод миниатюры (главной картинки) поста -->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="product-card__image" style="margin-bottom: 15px; height: 180px; overflow: hidden; border-radius: 4px;">
                                <?php the_post_thumbnail('medium', ['style' => 'width: 100%; height: 100%; object-fit: contain;']); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Название статьи или товара -->
                        <h3 class="product-card__title" style="font-size: 18px; font-weight: 600; margin-bottom: 10px; line-height: 1.4;">
                            <a href="<?php the_permalink(); ?>" style="color: #000; text-decoration: none;">
                                <?php the_title(); ?>
                            </a>
                        </h3>

                        <!-- Краткое описание текста -->
                        <div class="product-card__excerpt" style="font-size: 14px; color: #666; line-height: 1.6; margin-bottom: 15px; flex-grow: 1;">
                            <?php the_excerpt(); ?>
                        </div>

                        <!-- Ссылка на полную страницу -->
                        <a href="<?php the_permalink(); ?>" style="display: inline-block; background: #FFC107; color: #000; text-decoration: none; padding: 10px 20px; text-align: center; border-radius: 4px; font-weight: 600; font-size: 14px; margin-top: auto;">
                            Подробнее
                        </a>

                    </article>

                <?php
                endwhile;

                // Вывод пагинации, если результатов очень много
                echo '<div style="grid-column: 1/-1; margin-top: 30px;">';
                the_posts_pagination();
                echo '</div>';

            else :
                ?>

                <!-- Если поиск ничего не нашёл в базе данных -->
                <div class="search-no-results">
                    <p style="font-size: 18px; color: #666; margin-bottom: 20px;">К сожалению, по вашему запросу ничего не найдено. Попробуйте ввести другое слово.</p>
                </div>

            <?php endif; ?>

        </div>
    </div>
</main>

<?php get_footer(); ?>