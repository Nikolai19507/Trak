console.log('animation-js');



const header = document.querySelector('.header');
const headerTop = document.querySelector('.header__top');
const headerBottom = document.querySelector('.header__bottom');

window.addEventListener('scroll', () => {

    if (window.scrollY > 100) {

        header.classList.add('active');
        headerTop.classList.add('hidden');
        headerBottom.classList.add('active');
    } else {
        headerTop.classList.remove('hidden');
        header.classList.remove('active');
        headerBottom.classList.remove('active');

    }
});


