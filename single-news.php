<?php get_header(); ?>

<main>

    <section>
        <div class="container">

            <a href="#" onclick="history.back(); return false;" class="news-back-btn">
                <span>
                    <svg width="21" height="11" viewBox="0 0 21 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.205219 5.64927C-0.0681477 5.3759 -0.0681477 4.93269 0.205219 4.65932L4.65999 0.204549C4.93336 -0.0688176 5.37657 -0.0688176 5.64994 0.204549C5.92331 0.477917 5.92331 0.921132 5.64994 1.1945L1.69014 5.1543L5.64994 9.11409C5.92331 9.38746 5.92331 9.83068 5.64994 10.104C5.37657 10.3774 4.93336 10.3774 4.65999 10.104L0.205219 5.64927ZM20.7002 5.8543H0.700193V4.4543H20.7002V5.8543Z" fill="#A2A2A2" />
                    </svg>
                </span> <?php pll_e('Back'); ?>
            </a>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


                    <article class="single-news">
                        <h1 class="single-news__title"><?php the_title(); ?></h1>
                        <span class="single-news__date"><?php echo get_the_date('d.m.Y'); ?></span>

                        <div class="single-news__row">
                            <div class="single-news__content">
                                <?php the_content(); ?>
                            </div>

                            <div class="single-news__image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>

            <?php endwhile;
            endif; ?>
        </div>
    </section>

    <section class="more-news">
        <div class="container">
            <h2 class="more-news__title">
                <?php pll_e('More news'); ?>
            </h2>

            <?php
            $current_post_id = get_the_ID();

            $args = array(
                'post_type'        => 'news',
                'posts_per_page'   => 4,
                'post_status'      => 'publish',
                'orderby'          => 'date',
                'order'            => 'DESC',
                'post__not_in'     => array($current_post_id),
                'suppress_filters' => false,
            );

            $more_news_query = new WP_Query($args);

            if ($more_news_query->have_posts()) : ?>
                <div class="more-news__row">
                    <?php while ($more_news_query->have_posts()) : $more_news_query->the_post(); ?>

                        <div class="news-card">


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
            <?php else : ?>
                <p><?php pll_e('No news available yet.'); ?></p>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>
    </section>


</main>

<?php get_footer(); ?>