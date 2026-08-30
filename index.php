<?php
/*
Template Name: Головна
*/
get_header();
?>

<main>

    <?php get_template_part('template-parts/home/hero'); ?>
    <?php get_template_part('template-parts/home/categories'); ?>
    <?php get_template_part('template-parts/home/about'); ?>
    <?php get_template_part('template-parts/home/stats'); ?>
    <?php get_template_part('template-parts/home/about-short'); ?>
    <?php get_template_part('template-parts/home/products-slider'); ?>
    <?php get_template_part('template-parts/home/news-slider'); ?>
    <?php get_template_part('template-parts/home/partners'); ?>
    <?php get_template_part('template-parts/form-questions'); ?>

</main>
<?php get_footer(); ?>