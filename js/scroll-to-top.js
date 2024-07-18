function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

var topButton = document.querySelector('.top-page-btn');

topButton.addEventListener('click', scrollToTop);

window.addEventListener('scroll', function () {
    if (window.scrollY > 10) {
        topButton.style.opacity = '1';
        topButton.style.pointerEvents = 'auto';
        topButton.classList.add('visible');
    } else {
        topButton.style.opacity = '0';
        topButton.style.pointerEvents = 'none';
        topButton.classList.remove('visible');
    }
});