<?php

if (has_custom_logo()) {
    $logo_id = get_theme_mod('custom_logo');
    $logo_img = wp_get_attachment_image($logo_id, 'full', false, array('class' => 'custom-logo'));
?>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link" rel="home">
        <?php echo $logo_img; ?>
        <span><?php bloginfo('name'); ?></span>
    </a>
<?php
} else {
?>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link" rel="home">
        <span><?php bloginfo('name'); ?></span>
    </a>
<?php
}
