(function () {
    const specsContainer = document.getElementById('specs-container');
    const specsBtn = document.getElementById('specs-btn');

    const textContainer = document.getElementById('js-descr-text');
    const seeMoreBtn = document.getElementById('desc-more-btn');

    function handleShowMore(btn, container) {

        if (!btn || !container) return

        container.classList.add('is-open');
        btn.classList.add('is-hidden');

        btn.addEventListener('transitionend', () => {
            btn.remove();
        }, { once: true });
    }


    if (specsBtn && specsContainer) {
        specsBtn.addEventListener('click', () => {
            handleShowMore(specsBtn, specsContainer)
        });
    }

    if (seeMoreBtn && textContainer) {
        seeMoreBtn.addEventListener('click', () => {
            handleShowMore(seeMoreBtn, textContainer);
        });
    }
})();




(function () {
    const overlay = document.querySelector('.product-specs-overlay');

    if (overlay) {

        let bodyBg = window.getComputedStyle(document.body).backgroundColor;
        // Удаляем все пробелы, чтобы сравнение сработало в любом браузере
        let cleanBg = bodyBg.replace(/\s/g, '');

        // Если фон прозрачный или равен transparent
        if (cleanBg === 'rgba(0,0,0,0)' || cleanBg === 'transparent' || !cleanBg) {
            // Включаем стандартный белый градиент
            overlay.style.background = 'linear-gradient(to bottom, rgba(255, 255, 255, 0), rgb(255, 255, 255))';
        } else {
            // Если задан реальный цвет — подставляем его в финал градиента
            overlay.style.background = `linear-gradient(to bottom, rgba(255, 255, 255, 0), ${bodyBg})`;
        }
    };
})();





function initHotspotClicks() {

    const hotspots = document.querySelectorAll('.hotspot');

    hotspots.forEach(e => {
        let btn = e.querySelector('.hotspot__btn');

        let tooltip = e.querySelector('.hotspot__tooltip');

        if (!btn || !tooltip) return;

        btn.addEventListener('click', (event) => {

            if (window.matchMedia('(hover: hover)').matches) {
                return;
            }

            event.stopPropagation();

            btn.classList.toggle('is-active');
            tooltip.classList.toggle('is-active');
        });


    });

    document.addEventListener('click', (event) => {
        if (!event.target.closest('.hotspot')) {

            document.querySelectorAll('.hotspot__btn.is-active, .hotspot__tooltip.is-active').forEach(activeElem => {
                activeElem.classList.remove('is-active');
            });
        };
    });

};

document.addEventListener('DOMContentLoaded', initHotspotClicks);


