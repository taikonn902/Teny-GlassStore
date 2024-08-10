document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("header-page").classList.add("animate-slide-top");

    const header = document.getElementById('header-page');
    let lastScrollTop = 0;
    const delta = 10;

    window.addEventListener('scroll', () => {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (Math.abs(lastScrollTop - scrollTop) <= delta)
            return;

        if (scrollTop > lastScrollTop) {
            header.style.top = '-105px';
        } else {
            header.style.top = '0';
        }

        lastScrollTop = scrollTop;
    });
});



