<?php get_header(); ?>

<?php

$images = get_field('product_gallery');
$status = get_field('product_availability');
$kp_file = get_field('product_kp_file');

?>

<!-- 1. ОТКРЫВАЕМ ЦИКЛ В НАЧАЛЕ СТРАНИЦЫ -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <main class="">

            <div class="btn-back">
                <div class="container">
                    <a href="#" onclick="history.back(); return false;" class="news-back-btn">
                        <span>
                            <svg width="21" height="11" viewBox="0 0 21 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.205219 5.64927C-0.0681477 5.3759 -0.0681477 4.93269 0.205219 4.65932L4.65999 0.204549C4.93336 -0.0688176 5.37657 -0.0688176 5.64994 0.204549C5.92331 0.477917 5.92331 0.921132 5.64994 1.1945L1.69014 5.1543L5.64994 9.11409C5.92331 9.38746 5.92331 9.83068 5.64994 10.104C5.37657 10.3774 4.93336 10.3774 4.65999 10.104L0.205219 5.64927ZM20.7002 5.8543H0.700193V4.4543H20.7002V5.8543Z" fill="#A2A2A2" />
                            </svg>
                        </span> <?php pll_e('Back'); ?>
                    </a>
                </div>
            </div>

            <section>
                <div class="container">
                    <div class="single-product">

                        <h1 class="single-product__title subtitle"><?php the_title(); ?></h1>
                        <div class="product-sku-block">
                            <span class="sku-label">Код товара:</span>
                            <span class="sku-value"><?php the_field('product_sku'); ?></span>

                            <button class="copy-sku-btn" data-sku="<?php echo esc_attr(get_field('product_sku')); ?>">
                                <svg class="copy-sku-icon" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.75 0H5.62496V2.65381H2.25V17.25H12.375V14.5962H15.75V0ZM12.375 13.601H14.6647V0.995213H6.70931V2.65381H12.375V13.601ZM3.33508 3.649H11.2905V16.2548H3.33508V3.649Z" fill="#A2A2A2" />
                                </svg>
                            </button>
                        </div>

                        <div class="single-product-hero">
                            <div class="single-product__slider">
                                <div thumbsSlider="" class="product-gallery">
                                    <div class="swiper-wrapper swiper-custom-wrapper">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="swiper-slide">
                                                <?php the_post_thumbnail('thumbnail'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php
                                        if ($images) :
                                            foreach ($images as $image_id) : ?>
                                                <div class="swiper-slide">
                                                    <?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?>
                                                </div>
                                        <?php endforeach;
                                        endif; ?>

                                        <div class="single-product__next">
                                            <svg width="24" height="13" viewBox="0 0 24 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M23 1L12 12L1 1" stroke="#A2A2A2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-thumbs">
                                    <div class="swiper-wrapper">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="swiper-slide">
                                                <?php the_post_thumbnail('large'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php
                                        if ($images) :
                                            foreach ($images as $image_id) : ?>
                                                <div class="swiper-slide">
                                                    <?php echo wp_get_attachment_image($image_id, 'large'); ?>
                                                </div>
                                        <?php endforeach;
                                        endif; ?>
                                    </div>
                                </div>


                            </div>

                            <div class="product-info">
                                <div class="product-info__status">
                                    <?php
                                    if ($status) :
                                        $status_text = ($status === 'in_stock') ? 'In stock' : (($status === 'on_order') ? 'On order' : 'In transit');
                                    ?>
                                        <span class="product-status product-status--<?php echo esc_attr($status); ?>">
                                            <?php pll_e($status_text); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="product-info__buttons">

                                    <div class="info-button-main">
                                        <div class="info-button-callback">
                                            <button class="info-button popup-callback">
                                                <span>
                                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M23.9993 17.9686V21.5816C24.0006 21.917 23.9318 22.249 23.7971 22.5563C23.6625 22.8636 23.465 23.1395 23.2174 23.3662C22.9698 23.593 22.6774 23.7656 22.359 23.8731C22.0407 23.9805 21.7033 24.0204 21.3686 23.9902C17.6554 23.5875 14.0885 22.3212 10.9547 20.293C8.03906 18.4439 5.56712 15.9769 3.7144 13.067C1.67503 9.92519 0.40589 6.34809 0.00979454 2.62554C-0.0203606 2.29251 0.0192973 1.95685 0.126243 1.63995C0.233188 1.32305 0.405079 1.03185 0.63097 0.784879C0.85686 0.537911 1.1318 0.34059 1.43829 0.20548C1.74478 0.0703704 2.0761 0.000431667 2.41115 0.000116762H6.03129C6.61692 -0.00563562 7.18466 0.201333 7.6287 0.582446C8.07273 0.963559 8.36276 1.49281 8.44472 2.07155C8.59752 3.22778 8.88089 4.36305 9.28942 5.4557C9.45178 5.88675 9.48691 6.35522 9.39067 6.8056C9.29443 7.25597 9.07084 7.66938 8.7464 7.99682L7.21387 9.52631C8.9317 12.5414 11.4331 15.0378 14.4542 16.7522L15.9867 15.2228C16.3148 14.899 16.729 14.6758 17.1803 14.5798C17.6315 14.4837 18.1009 14.5188 18.5328 14.6808C19.6277 15.0885 20.7652 15.3713 21.9237 15.5238C22.5099 15.6064 23.0452 15.901 23.4279 16.3518C23.8106 16.8026 24.0139 17.378 23.9993 17.9686Z" fill="black" />
                                                    </svg>
                                                </span>
                                                <span>
                                                    <?php the_field('product_callback'); ?>
                                                </span>
                                            </button>
                                        </div>

                                        <div class="info-button-kp">

                                            <?php if ($kp_file) : ?>
                                                <a class="info-button" download
                                                    href="<?php echo esc_url($kp_file['url']); ?>">
                                                    <span>
                                                        <svg class="" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.2045 20.1691L3.3295 13.3602C2.89017 12.9803 2.89017 12.3644 3.3295 11.9846C3.76883 11.6047 4.48116 11.6047 4.92049 11.9846L10.875 17.133V1.97268C10.875 1.43548 11.3787 1 12 1C12.6213 1 13.125 1.43548 13.125 1.97268V17.133L19.0795 11.9846C19.5188 11.6047 20.2312 11.6047 20.6705 11.9846C21.1098 12.3644 21.1098 12.9803 20.6705 13.3602L12.7955 20.1691C12.7695 20.1915 12.7415 20.2133 12.7131 20.2335C12.7044 20.2397 12.6954 20.2453 12.6864 20.2509C12.6819 20.2538 12.6774 20.2566 12.6729 20.2595C12.6569 20.2698 12.6413 20.2805 12.6247 20.2902C12.6128 20.297 12.6006 20.3032 12.5884 20.3094C12.5841 20.3116 12.5798 20.3137 12.5756 20.3159C12.5709 20.3183 12.5663 20.3207 12.5617 20.3232C12.5514 20.3286 12.541 20.3341 12.5303 20.339C12.5176 20.3449 12.5048 20.35 12.4918 20.3552C12.4876 20.3569 12.4834 20.3586 12.4791 20.3603C12.475 20.362 12.4709 20.3637 12.4668 20.3655C12.4548 20.3705 12.4428 20.3754 12.4305 20.3799C12.4185 20.3841 12.4064 20.3878 12.3942 20.3915C12.3895 20.3929 12.3848 20.3943 12.38 20.3958C12.3623 20.4013 12.3448 20.4072 12.3266 20.412C12.3145 20.4151 12.3022 20.4177 12.2899 20.4203C12.2851 20.4213 12.2803 20.4223 12.2755 20.4233C12.2709 20.4243 12.2662 20.4254 12.2616 20.4264C12.2478 20.4295 12.234 20.4326 12.2198 20.4351C12.205 20.4376 12.1901 20.4394 12.1751 20.4411C12.1702 20.4417 12.1652 20.4423 12.1602 20.4429C12.1548 20.4436 12.1493 20.4443 12.1439 20.4451C12.133 20.4466 12.1221 20.4481 12.111 20.4491C12.0372 20.4554 11.9628 20.4554 11.889 20.4491C11.8782 20.4482 11.8677 20.4467 11.8572 20.4452C11.8514 20.4444 11.8456 20.4436 11.8398 20.4429C11.8348 20.4423 11.8298 20.4417 11.8249 20.4411C11.8099 20.4394 11.795 20.4376 11.7802 20.4351C11.766 20.4326 11.7522 20.4295 11.7384 20.4264C11.7338 20.4254 11.7291 20.4243 11.7245 20.4233C11.7198 20.4223 11.7151 20.4213 11.7105 20.4203C11.698 20.4178 11.6856 20.4152 11.6734 20.412C11.6598 20.4084 11.6466 20.4042 11.6333 20.4C11.6289 20.3986 11.6244 20.3972 11.62 20.3958C11.6158 20.3945 11.6116 20.3933 11.6074 20.392C11.5947 20.3882 11.582 20.3843 11.5695 20.3799C11.5572 20.3754 11.5452 20.3705 11.5332 20.3655C11.5291 20.3637 11.525 20.362 11.5209 20.3603C11.5037 20.3534 11.4865 20.3468 11.4697 20.339C11.4586 20.3339 11.4479 20.3283 11.4372 20.3226C11.4329 20.3204 11.4287 20.3181 11.4244 20.3159C11.4202 20.3137 11.4159 20.3116 11.4116 20.3094C11.3994 20.3032 11.3872 20.297 11.3753 20.2902C11.3629 20.283 11.351 20.2751 11.339 20.2673C11.3351 20.2647 11.3311 20.2621 11.3271 20.2595C11.3224 20.2564 11.3176 20.2535 11.3129 20.2505C11.3041 20.245 11.2954 20.2395 11.2869 20.2335C11.2585 20.2133 11.2305 20.1915 11.2045 20.1691Z" fill="black" />
                                                            <path d="M4.12498 22.1762H19.875C20.4963 22.1762 21 22.5845 21 23.0881C21 23.5917 20.4963 24 19.875 24H4.12498C3.50367 24 3 23.5917 3 23.0881C3 22.5845 3.50367 22.1762 4.12498 22.1762Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <?= esc_html(get_field('product_kp_file_text')) ?>
                                                </a>
                                            <?php endif; ?>

                                        </div>
                                    </div>

                                    <div class="info-button-sub">
                                        <button class="info-button-favorite info-btn-sub muted-action">
                                            <span>
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_17347_12793)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.9951 5.50233C17.9984 5.57793 18 5.65367 18 5.72949L17.9941 5.97363C17.9675 6.54399 17.8481 7.10609 17.6396 7.63477L17.5449 7.8584C17.3125 8.37447 16.9974 8.84552 16.6123 9.25L15.6992 10.209L9 17.25L2.2998 10.209L1.3877 9.25C0.554921 8.37477 0.0640486 7.20694 0.00585938 5.97656L0 5.72949C0 4.49158 0.438735 3.30099 1.22559 2.3877L1.3877 2.20898C2.2761 1.27529 3.48091 0.75 4.7373 0.75L4.97168 0.756836C6.14272 0.817772 7.25392 1.33353 8.08691 2.20898L9 3.16797L9.91211 2.20898C10.3519 1.74653 10.8745 1.3792 11.4492 1.12891C12.021 0.87989 12.6343 0.751315 13.2532 0.75001C12.7458 1.16072 12.3598 1.71558 12.1576 2.3523C12.1073 2.37125 12.0574 2.39151 12.0078 2.41309C11.608 2.58727 11.2398 2.84465 10.9268 3.17383L10.0137 4.13281C9.74946 4.41048 9.38328 4.5683 9 4.56836C8.61663 4.56836 8.24962 4.41055 7.98535 4.13281L7.07227 3.17383C6.44047 2.50993 5.59919 2.15041 4.7373 2.15039C3.87531 2.15039 3.0332 2.50978 2.40137 3.17383C1.76741 3.84022 1.40039 4.75862 1.40039 5.72949C1.40046 6.70015 1.7676 7.61787 2.40137 8.28418L3.31445 9.24414L8.99902 15.2187L14.6846 9.24414L15.5977 8.28418C15.9111 7.95487 16.1637 7.56038 16.3369 7.12109C16.4093 6.93737 16.4671 6.74774 16.5099 6.55421C17.0971 6.34458 17.6093 5.97687 17.9951 5.50233Z" fill="#A2A2A2" />
                                                        <path d="M15.9949 0.731445H14.9074V2.90646H12.7324V3.99396H14.9074V6.16897H15.9949V3.99396H18.1699V2.90646H15.9949V0.731445Z" fill="#A2A2A2" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_17347_12793">
                                                            <rect width="18" height="18" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </span>
                                            <span>
                                                <?php pll_e('Favorite button'); ?>
                                            </span>
                                        </button>

                                        <button type="button"
                                            class="info-button-share info-btn-sub muted-action"
                                            id="native-share-btn"
                                            data-url="<?php echo esc_url(get_permalink()); ?>"
                                            data-title="<?php echo esc_attr(get_the_title()); ?>">
                                            <span>
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_17347_12746)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.051 6.33333C13.1154 6.33333 12.2735 5.93569 11.6886 5.30181L6.99045 8.01583C7.09268 8.32561 7.14796 8.65642 7.14796 9C7.14796 9.34333 7.09277 9.67389 6.99068 9.98347L11.6915 12.6951C12.2763 12.063 13.1169 11.6667 14.051 11.6667C15.8178 11.6667 17.25 13.0844 17.25 14.8333C17.25 16.5822 15.8178 18 14.051 18C12.2843 18 10.852 16.5822 10.852 14.8333C10.852 14.4884 10.9077 14.1564 11.0107 13.8456L6.31162 11.135C5.72665 11.7689 4.88473 12.1667 3.94898 12.1667C2.18223 12.1667 0.75 10.7489 0.75 9C0.75 7.2511 2.18223 5.83333 3.94898 5.83333C4.88447 5.83333 5.72616 6.23083 6.31112 6.8645L11.0094 4.15038C10.9073 3.84073 10.852 3.51008 10.852 3.16667C10.852 1.41776 12.2843 0 14.051 0C15.8178 0 17.25 1.41776 17.25 3.16667C17.25 4.91557 15.8178 6.33333 14.051 6.33333ZM12.199 3.16667C12.199 2.15414 13.0282 1.33333 14.051 1.33333C15.0739 1.33333 15.9031 2.15414 15.9031 3.16667C15.9031 4.17919 15.0739 5 14.051 5C13.3839 5 12.7992 4.65084 12.4731 4.12706C12.4666 4.11417 12.4596 4.10141 12.4522 4.08879C12.4447 4.0761 12.4369 4.06376 12.4287 4.05175C12.2823 3.78935 12.199 3.48764 12.199 3.16667ZM5.54754 8.07749C5.54006 8.06481 5.53306 8.05199 5.52652 8.03904C5.20042 7.51558 4.61586 7.16667 3.94898 7.16667C2.92613 7.16667 2.09694 7.98748 2.09694 9C2.09694 10.0125 2.92613 10.8333 3.94898 10.8333C4.61517 10.8333 5.19921 10.4851 5.52551 9.96258C5.53227 9.94908 5.53954 9.9357 5.54732 9.92249C5.5553 9.90893 5.56369 9.89577 5.57246 9.88298C5.71814 9.62107 5.80102 9.32012 5.80102 9C5.80102 8.67903 5.71769 8.37732 5.57129 8.11492C5.56302 8.10279 5.5551 8.09031 5.54754 8.07749ZM12.4064 13.9895C12.2739 14.242 12.199 14.529 12.199 14.8333C12.199 15.8459 13.0282 16.6667 14.051 16.6667C15.0739 16.6667 15.9031 15.8459 15.9031 14.8333C15.9031 13.8208 15.0739 13 14.051 13C13.4032 13 12.8331 13.3292 12.5021 13.8279C12.4904 13.8559 12.4767 13.8835 12.4608 13.9105C12.4444 13.9384 12.4262 13.9648 12.4064 13.9895Z" fill="#A2A2A2" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_17347_12746">
                                                            <rect width="18" height="18" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </span>
                                            <?php pll_e('Share button'); ?>
                                        </button>
                                    </div>

                                </div>

                                <div class="product-info__specs">
                                    <div class="product-specs-wrapper" id="specs-container">
                                        <?php if (have_rows('product_specs')) : ?>
                                            <ul class="product-specs-list">
                                                <?php while (have_rows('product_specs')) : the_row();
                                                    $label =  get_sub_field('spec_label');
                                                    $value =  get_sub_field('spec_value');
                                                ?>
                                                    <li class="product-specs-item">
                                                        <span class="product-specs-label"><?php echo esc_html($label) ?></span>
                                                        <!-- <span class="product-specs-line"></span> -->
                                                        <span class="product-specs-value"><?php echo esc_html($value); ?></span>
                                                    </li>
                                                <?php endwhile ?>
                                            </ul>
                                        <?php endif ?>
                                        <div class="product-specs-overlay"></div>
                                    </div>
                                    <button type="button" class="specs-show-more-btn muted-action muted-action-underline" id="specs-btn">
                                        <?php pll_e('See all specifications'); ?>
                                    </button>
                                </div>

                                <div class="product-info__body-manufacturers">
                                    <?php if (have_rows('product_body_manufacturers')) : ?>
                                        <ul class="product-body-manufacturers">
                                            <?php while (have_rows('product_body_manufacturers')) : the_row();
                                                $label = get_sub_field("label");
                                                $icon =     get_sub_field("icon");
                                            ?>
                                                <li>
                                                    <span><?= esc_html($label) ?></span>
                                                    <span><?= wp_get_attachment_image($icon, 'thumbnail', false); ?>
                                                    </span>
                                                </li>
                                            <?php endwhile ?>
                                        </ul>
                                    <?php endif ?>
                                </div>

                                <div class="product-info__terms">
                                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('delivery-and-payment'))); ?>" class="muted-action muted-action-underline">
                                        <?php pll_e('Terms of payment and delivery'); ?>
                                    </a>
                                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('returns'))); ?>" class="muted-action muted-action-underline">
                                        <?php pll_e('Return policy'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section style="display: none;">
                <div class="single-product-description">
                    <div class="single-product-description__banner">

                        <svg class="single-product-description__bg" viewBox="0 0 154 280" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M275.318 151.304C281.561 145.061 281.561 134.939 275.318 128.696L151.304 4.68234C145.061 -1.56078 134.939 -1.56078 128.696 4.68234L4.68234 128.696C-1.56078 134.939 -1.56078 145.061 4.68234 151.304L128.696 275.318C134.939 281.561 145.061 281.561 151.304 275.318L275.318 151.304ZM222.035 151.304C228.278 145.061 228.278 134.939 222.035 128.696L151.304 57.9652C145.061 51.722 134.939 51.722 128.696 57.9652L57.9652 128.696C51.722 134.939 51.7221 145.061 57.9652 151.304L128.696 222.035C134.939 228.278 145.061 228.278 151.304 222.035L222.035 151.304Z" fill="white" />
                        </svg>

                        <div class="single-product-description__contaier container">
                            <div class="single-product-description__info">
                                <h3 class="single-product-description__info-title subtitle"><?php the_field('#описание'); ?> Описание</h3>
                                <div
                                    class="single-product-description__info-text"
                                    id="js-descr-text"
                                    data-limit="<?= esc_attr(get_field('product_description_limit')) ?: 220 ?>">
                                    <?= wp_kses_post(get_field('product_full_info')); ?>
                                    <div class="product-description-overlay"></div>
                                </div>
                                <button type="button" class="desc-show-more-btn muted-action muted-action-underline" id="desc-more-btn">
                                    <?php pll_e('See all Description');
                                    ?>
                                </button>
                            </div>

                            <div class="single-product-description__features">
                                <?php if (have_rows('product_description_features')) : ?>
                                    <ul class="single-product-description__features-list">

                                        <?php while (have_rows('product_description_features')) : the_row();
                                            $features_icon = get_sub_field('features_icon');
                                            $features_text = get_sub_field('features_text');
                                        ?>
                                            <li>
                                                <?php if (!empty($features_icon) && is_array($features_icon)) : ?>
                                                    <span class="feature-icon">
                                                        <?php
                                                        echo wp_get_attachment_image($features_icon['id'], 'full');
                                                        ?>
                                                    </span>
                                                <?php endif; ?>

                                                <?php if ($features_text) : ?>
                                                    <span class="feature-text">
                                                        <?php echo esc_html($features_text); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </li>

                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </section>




            <section style="display: none;">
                <div class="schematic-slider">
                    <div class="container">
                        <div class="schematic-slider__title">ACF Название категории, вид сбоку</div>
                        <div class="schematic-slider__title">plagin ACF Image Hotspots Field</div>

                        <?php
                        if (have_rows('schematic_slides')) : ?>
                            <div class="schematic-gallery__slider">

                                <div class="swiper schematic-thumbs">
                                    <div class="swiper-wrapper">
                                        <?php
                                        while (have_rows('schematic_slides')) : the_row();
                                            $image = get_sub_field('schematic_img');
                                            $img_id = is_array($image) ? $image['id'] : $image;
                                        ?>
                                            <div class="swiper-slide">
                                                <div class="schematic-wrapper">

                                                    <?php if ($img_id) echo wp_get_attachment_image($img_id, 'full', false, ['class' => 'schematic-img']); ?>

                                                    <?php if (have_rows('hotspots_list')) : ?>
                                                        <?php while (have_rows('hotspots_list')) : the_row();
                                                            $text   = get_sub_field('hotspot_text');
                                                            $coords = get_sub_field('hotspot_coords');

                                                            $posX   = get_sub_field('tooltip_x');
                                                            $posY   = get_sub_field('tooltip_y');

                                                            $posX   = !empty($posX) ? $posX : 'left';
                                                            $posY   = !empty($posY) ? $posY : 'top';

                                                            if ($coords) :
                                                                list($left, $top) = explode(',', $coords);
                                                        ?>
                                                                <div class="hotspot hotspot--x-<?php echo esc_attr($posX); ?> hotspot--y-<?php echo esc_attr($posY); ?>" style="left: <?php echo esc_attr($left); ?>; top: <?php echo esc_attr($top); ?>;">
                                                                    <button type="button" class="hotspot__btn"></button>
                                                                    <div class="hotspot__tooltip"><?php echo wp_kses_post($text); ?></div>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endwhile; ?>
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>

                                <div thumbsSlider="" class="swiper product-gallery_1 schematic-gallery">
                                    <div class="swiper-wrapper swiper-custom-wrapper">
                                        <?php
                                        // reset_rows('schematic_slides'); //?

                                        while (have_rows('schematic_slides')) : the_row();
                                            $image = get_sub_field('schematic_img');
                                            $img_id = is_array($image) ? $image['id'] : $image;
                                        ?>
                                            <div class="swiper-slide">
                                                <?php if ($img_id) echo wp_get_attachment_image($img_id, 'thumbnail'); ?>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>

                            </div>
                        <?php endif; ?>

                    </div>
                </div>



            </section>

            <section style="display: none;">
                <div class="product-characteristics">
                    <div class="container">
                        <div class="product-characteristics__top">
                            <h3 class="product-characteristics__title subtitle">ACF Характеристики</h3>
                            <div class="info-button-kp">
                                <?php if ($kp_file) : ?>
                                    <a class="info-button" download
                                        href="<?php echo esc_url($kp_file['url']); ?>">
                                        <span>
                                            <svg class="" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.2045 20.1691L3.3295 13.3602C2.89017 12.9803 2.89017 12.3644 3.3295 11.9846C3.76883 11.6047 4.48116 11.6047 4.92049 11.9846L10.875 17.133V1.97268C10.875 1.43548 11.3787 1 12 1C12.6213 1 13.125 1.43548 13.125 1.97268V17.133L19.0795 11.9846C19.5188 11.6047 20.2312 11.6047 20.6705 11.9846C21.1098 12.3644 21.1098 12.9803 20.6705 13.3602L12.7955 20.1691C12.7695 20.1915 12.7415 20.2133 12.7131 20.2335C12.7044 20.2397 12.6954 20.2453 12.6864 20.2509C12.6819 20.2538 12.6774 20.2566 12.6729 20.2595C12.6569 20.2698 12.6413 20.2805 12.6247 20.2902C12.6128 20.297 12.6006 20.3032 12.5884 20.3094C12.5841 20.3116 12.5798 20.3137 12.5756 20.3159C12.5709 20.3183 12.5663 20.3207 12.5617 20.3232C12.5514 20.3286 12.541 20.3341 12.5303 20.339C12.5176 20.3449 12.5048 20.35 12.4918 20.3552C12.4876 20.3569 12.4834 20.3586 12.4791 20.3603C12.475 20.362 12.4709 20.3637 12.4668 20.3655C12.4548 20.3705 12.4428 20.3754 12.4305 20.3799C12.4185 20.3841 12.4064 20.3878 12.3942 20.3915C12.3895 20.3929 12.3848 20.3943 12.38 20.3958C12.3623 20.4013 12.3448 20.4072 12.3266 20.412C12.3145 20.4151 12.3022 20.4177 12.2899 20.4203C12.2851 20.4213 12.2803 20.4223 12.2755 20.4233C12.2709 20.4243 12.2662 20.4254 12.2616 20.4264C12.2478 20.4295 12.234 20.4326 12.2198 20.4351C12.205 20.4376 12.1901 20.4394 12.1751 20.4411C12.1702 20.4417 12.1652 20.4423 12.1602 20.4429C12.1548 20.4436 12.1493 20.4443 12.1439 20.4451C12.133 20.4466 12.1221 20.4481 12.111 20.4491C12.0372 20.4554 11.9628 20.4554 11.889 20.4491C11.8782 20.4482 11.8677 20.4467 11.8572 20.4452C11.8514 20.4444 11.8456 20.4436 11.8398 20.4429C11.8348 20.4423 11.8298 20.4417 11.8249 20.4411C11.8099 20.4394 11.795 20.4376 11.7802 20.4351C11.766 20.4326 11.7522 20.4295 11.7384 20.4264C11.7338 20.4254 11.7291 20.4243 11.7245 20.4233C11.7198 20.4223 11.7151 20.4213 11.7105 20.4203C11.698 20.4178 11.6856 20.4152 11.6734 20.412C11.6598 20.4084 11.6466 20.4042 11.6333 20.4C11.6289 20.3986 11.6244 20.3972 11.62 20.3958C11.6158 20.3945 11.6116 20.3933 11.6074 20.392C11.5947 20.3882 11.582 20.3843 11.5695 20.3799C11.5572 20.3754 11.5452 20.3705 11.5332 20.3655C11.5291 20.3637 11.525 20.362 11.5209 20.3603C11.5037 20.3534 11.4865 20.3468 11.4697 20.339C11.4586 20.3339 11.4479 20.3283 11.4372 20.3226C11.4329 20.3204 11.4287 20.3181 11.4244 20.3159C11.4202 20.3137 11.4159 20.3116 11.4116 20.3094C11.3994 20.3032 11.3872 20.297 11.3753 20.2902C11.3629 20.283 11.351 20.2751 11.339 20.2673C11.3351 20.2647 11.3311 20.2621 11.3271 20.2595C11.3224 20.2564 11.3176 20.2535 11.3129 20.2505C11.3041 20.245 11.2954 20.2395 11.2869 20.2335C11.2585 20.2133 11.2305 20.1915 11.2045 20.1691Z" fill="black" />
                                                <path d="M4.12498 22.1762H19.875C20.4963 22.1762 21 22.5845 21 23.0881C21 23.5917 20.4963 24 19.875 24H4.12498C3.50367 24 3 23.5917 3 23.0881C3 22.5845 3.50367 22.1762 4.12498 22.1762Z" fill="black" />
                                            </svg>
                                        </span>
                                        <?= esc_html(get_field('product_kp_file_text')) ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="product-characteristics__columns">

                            <div class="product-characteristics__column">
                                <h4 class="product-characteristics__column-subtitle">ACF Название группы характеристик</h4>
                                <?php
                                reset_rows();
                                if (have_rows('product_specs')) : ?>
                                    <ul class="product-specs-list">
                                        <?php while (have_rows('product_specs')) : the_row();
                                            $label = get_sub_field('spec_label');
                                            $value = get_sub_field('spec_value');
                                        ?>
                                            <li class="product-specs-item">
                                                <span class="product-specs-label"><?= esc_html($label) ?></span>
                                                <span class="product-specs-value"><?= esc_html($value) ?></span>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>

                            <div class="product-characteristics__column">
                                <h4 class="product-characteristics__column-subtitle">ACF Название группы характеристик</h4>
                                <?php if (have_rows('specs_technical')) : ?>
                                    <ul class="product-specs-list">
                                        <?php while (have_rows('specs_technical')) : the_row();
                                            $label = get_sub_field('specs_technical_label');
                                            $value = get_sub_field('specs_technical_value');
                                        ?>
                                            <li class="product-specs-item">
                                                <span class="product-specs-label"><?= esc_html($label) ?></span>
                                                <span class="product-specs-value"><?= esc_html($value) ?></span>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>

                            <div class="product-characteristics__column">
                                <h4 class="product-characteristics__column-subtitle">ACF Название группы характеристик</h4>
                                <?php if (have_rows('specs_dimensions')) : ?>
                                    <ul class="product-specs-list">
                                        <?php while (have_rows('specs_dimensions')) : the_row();
                                            $label = get_sub_field('specs_dimensions_label');
                                            $value = get_sub_field('specs_dimensions_value');
                                        ?>
                                            <li class="product-specs-item">
                                                <span class="product-specs-label"><?= esc_html($label) ?></span>
                                                <span class="product-specs-value"><?= esc_html($value) ?></span>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>



            </section>




            <?php
            $related_products = get_field('related_products');
            if ($related_products) : ?>
                <section style="display: none;">
                    <div class="similar-products">
                        <div class="container">
                            <h2 class="similar-products__title">acf <?php pll_e('Похожие товары'); ?></h2>

                            <div class="similar-slider swiper">
                                <div class="similar-slider-wrapper swiper-wrapper">

                                    <?php foreach ($related_products as $related_post) :
                                        // Подготавливаем глобальные данные для связанного товара
                                        setup_postdata($related_post);

                                        $title = get_the_title($related_post);
                                        $permalink = get_the_permalink($related_post);
                                    ?>
                                        <!-- КАЖДЫЙ СЛАЙД — ЭТО КАРТОЧКА -->
                                        <div class="similar-slide swiper-slide">
                                            <div class="similar-card">
                                                <a href="<?= esc_url($permalink) ?>" class="similar-card__image-link">
                                                    <div class="similar-card__image">
                                                        <?php if (has_post_thumbnail($related_post)) : ?>
                                                            <?= get_the_post_thumbnail($related_post, 'medium', ['class' => 'similar-card__img']) ?>
                                                        <?php else : ?>
                                                            <div class="similar-card__placeholder"></div>
                                                        <?php endif; ?>

                                                        <?php
                                                        // Читаем статус наличия из вашего поля product_availability
                                                        $availability = get_field('product_availability', $related_post->ID);

                                                        if ($availability) :
                                                            $status_text = ($availability === 'in_stock') ? 'In stock' : (($availability === 'on_order') ? 'On order' : 'In transit');
                                                        ?>
                                                            <!-- Плашка статуса с БЭМ-модификатором -->
                                                            <span class="product-status product-status--<?= esc_attr($availability); ?>">
                                                                <?php pll_e($status_text); ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </a>
                                                <h3 class="similar-card__title">
                                                    <a href="<?= esc_url($permalink) ?>"><?= esc_html($title) ?></a>
                                                </h3>

                                                <div class="similar-card__actions">
                                                    <a href="<?= esc_url($permalink) ?>" class="similar-card__btn-more btn-card "><?php pll_e('Детальніше'); ?></a>
                                                    <button class="similar-card__btn-favorite favorite" aria-label="Add to favorite">
                                                        <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M17.6826 0.5C18.4428 0.5 19.1966 0.657433 19.9004 0.963867C20.6042 1.27037 21.2459 1.72011 21.7871 2.28906V2.29004C22.3286 2.85886 22.7594 3.53572 23.0537 4.28223C23.348 5.02866 23.5 5.82938 23.5 6.63867C23.5 7.44816 23.3481 8.2495 23.0537 8.99609C22.7594 9.74262 22.3286 10.4195 21.7871 10.9883L20.5703 12.2676L12 21.2744L3.42969 12.2676L2.21191 10.9883C1.1183 9.83883 0.5 8.27437 0.5 6.63867C0.50007 5.00317 1.11849 3.4394 2.21191 2.29004C3.30482 1.14142 4.78207 0.500977 6.31641 0.500977C7.85072 0.500998 9.32801 1.14144 10.4209 2.29004L11.6377 3.56836C11.7321 3.66755 11.8631 3.72363 12 3.72363C12.1368 3.72355 12.268 3.66748 12.3623 3.56836L13.5791 2.29004V2.28906C14.1203 1.72013 14.762 1.27036 15.4658 0.963867C16.1694 0.657517 16.9226 0.500061 17.6826 0.5Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                    <?php
                                    // Сбрасываем глобальные данные поста, возвращаясь к основной странице
                                    wp_reset_postdata();
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php get_template_part('template-parts/form-questions1'); ?>

        </main>

        <!-- 2. ЗАКРЫВАЕМ ЦИКЛ В КОНЦЕ СТРАНИЦЫ нахуя он тут в конце -->
<?php endwhile;
endif; ?>

<?php get_footer(); ?>