<section class="news-section">
    <div class="news-slider">
        <div class="container">
            <div class="slider-wrapper">

                <div class="news-slider__item slider__item">
                    <h2 class="news-slider__title title">Новости</h2>
                    <div class="slider-button-wrapper">
                        <div class="news-swiper-pagination"></div>
                        <div class="news-button-prev slider-arrow-prev">
                            <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.94922 17.2002L0.699219 8.9502L8.94922 0.700195" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="news-button-next slider-arrow-next">
                            <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.699219 17.2002L8.94922 8.9502L0.699219 0.700195" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="news-slider__item">
                    <div class="news-slider__swiper swiper">

                        <?php
                        $args = array(
                            'post_type'      => 'news',
                            'posts_per_page' => -1,
                            'post_status'    => 'publish',
                            'orderby'        => 'date',
                            'order'          => 'ASC',
                            'suppress_filters' => false, // ЭТА СТРОКА ОБЯЗАТЕЛЬНА ДЛЯ POLYLANG
                        );

                        $news_query = new WP_Query($args);

                        if ($news_query->have_posts()) : ?>

                            <div class="swiper-wrapper">
                                <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>

                                    <div class="swiper-slide news-card">
                                        <div class="news-card__image">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('medium'); ?>
                                            <?php else : ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/no-image.jpg" alt="Нет фото">
                                            <?php endif; ?>
                                        </div>

                                        <span class="news-card__date">
                                            <?php echo get_the_date('d.m.Y'); ?>
                                        </span>

                                        <h3 class="news-card__title">
                                            <?php the_title(); ?>
                                        </h3>


                                        <a href="<?php the_permalink(); ?>" class="news-card__link">
                                            <?php pll_e('Read more'); ?> <span>→</span>
                                        </a>


                                    </div>

                                <?php endwhile; ?>
                            </div>

                        <?php
                        else :
                            echo '<p class="swiper-no-posts">Новостей пока нет.</p>';
                        endif;

                        wp_reset_postdata();
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>