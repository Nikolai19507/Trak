document.addEventListener('DOMContentLoaded', () => {

    const catalogBtn = document.querySelector('[data-catalog="btn"]');
    if (!catalogBtn) return;

    const catalogDropdown = document.querySelector('[data-catalog="dropdown"]');
    const burger = document.getElementById('burger');

    catalogBtn.addEventListener('mouseenter', () => {
        if (innerWidth > 768) {
            catalogBtn.classList.add('active');
            catalogDropdown.classList.add('active');
            burger.classList.add('active');
        }
    });
    catalogBtn.addEventListener('mouseleave', () => {
        if (innerWidth > 768) {
            catalogBtn.classList.remove('active');
            catalogDropdown.classList.remove('active');
            burger.classList.remove('active');
        }
    });


    catalogDropdown.addEventListener('mouseenter', () => {
        if (innerWidth > 768) {
            catalogBtn.classList.add('active');
            burger.classList.add('active');
        }
    });
    catalogDropdown.addEventListener('mouseleave', () => {
        if (innerWidth > 768) {
            catalogBtn.classList.remove('active');
            catalogDropdown.classList.remove('active');
            burger.classList.remove('active');
        }

    });


    catalogBtn.addEventListener('click', () => {

        if (window.innerWidth <= 768) {

            catalogBtn.classList.toggle('active');
            catalogDropdown.classList.toggle('active');
            burger.classList.toggle('active');
            if (!catalogBtn.classList.contains('active')) {
                hideSubMenu();
            };
        };

    });



    window.addEventListener('resize', () => {
        if (innerWidth > 768) {
            catalogBtn.classList.remove('active');
            catalogDropdown.classList.remove('active');
            burger.classList.remove('active');
            hideSubMenu();
        }
    })







    function initParentLinks() {

        const parentLinks = document.querySelectorAll('.js-mobile-menu > .menu-item-has-children > a');

        parentLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();

                    const parentLi = this.parentElement;
                    const subMenu = parentLi.querySelector('.sub-menu');

                    if (subMenu) {
                        // Переключаем класс на самом sub-menu (как вы и хотели)
                        subMenu.classList.toggle('is-open');

                        // Обязательно переключаем класс на li (чтобы подсветить ссылку или повернуть стрелочку)
                        parentLi.classList.toggle('is-active');
                    }
                }
            });
        });

    };
    initParentLinks();


    window.addEventListener('click', (e) => {

        const clickedOutside = !e.target.closest('[data-catalog="btn"]') && !e.target.closest('[data-catalog="dropdown"]');
        const isMenuOpen = catalogBtn.classList.contains('active');

        if (clickedOutside && isMenuOpen) {
            catalogBtn.classList.remove('active');
            catalogDropdown.classList.remove('active');
            burger.classList.remove('active');

            hideSubMenu();
        }
    });


    function hideSubMenu() {
        const activeItems = document.querySelectorAll('.js-mobile-menu .is-active');
        const openSubMenus = document.querySelectorAll('.js-mobile-menu .is-open');

        activeItems.forEach(e => e.classList.remove('is-active'));
        openSubMenus.forEach(e => e.classList.remove('is-open'));
    };

});




