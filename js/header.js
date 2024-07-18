document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("header-page").classList.add("animate-slide-top");
});

// document.addEventListener('DOMContentLoaded', function () {
//     const header = document.getElementById('header-page');
//     let lastScrollTop = 0;

//     window.addEventListener('scroll', function () {
//         let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

//         if (currentScroll > lastScrollTop) {
//             header.style.transform = 'translateY(-100%)';
//         } else {
//             header.style.transform = 'translateY(0)';
//         }
        
//         lastScrollTop = currentScroll;
//     });
// });

const header = document.getElementById('header-page');
let lastScrollTop = 0;
const delta = 10; // Độ nhạy của sự kiện scroll

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



