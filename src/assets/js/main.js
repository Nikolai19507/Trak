import '../scss/main.scss';
import './modules/animation';
import './modules/swiper';
import './modules/menu';
import './modules/product-share';
import './modules/single-product';

console.log('Vite + WP: Полет нормальный!');


document.addEventListener('DOMContentLoaded', () => {
    const svgTrack = document.querySelector('.about-short__points');
    const pointGroups = document.querySelectorAll('.about-short__point-group');

    pointGroups.forEach(group => {
        // Мышка зашла на группу (не важно, на текст или на круг)
        group.addEventListener('mouseenter', () => {
            group.classList.add('is-hovered');
            svgTrack.classList.add('has-hovered-child');
        });

        // Мышка ушла с группы
        group.addEventListener('mouseleave', () => {
            group.classList.remove('is-hovered');
            svgTrack.classList.remove('has-hovered-child');
        });
    });
});



const singleProductSkuBtn = document.querySelectorAll('.copy-sku-btn');

singleProductSkuBtn.forEach(btn => {
    btn.addEventListener('click', () => {
        const skuText = btn.dataset.sku;
        navigator.clipboard.writeText(skuText);

        const copySkuIcon = btn.querySelector('.copy-sku-icon');

        if (copySkuIcon) {
            copySkuIcon.classList.add('active');

            setTimeout(() => {
                copySkuIcon.classList.remove('active');
            }, 2000);
        }
    });
});
