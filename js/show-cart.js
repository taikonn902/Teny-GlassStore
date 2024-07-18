document.addEventListener("DOMContentLoaded", function() {
    const shoppingCart = document.querySelector('.shopping-cart-page');
    const colorShoppingCart = document.querySelector('.shopping-cart-page p');
    const showCart = document.getElementById('show-cart');
    const overlayCartPopup = document.getElementById('overlay-cart-popup');
    const svgIcon = document.querySelector('.shopping-cart-page svg');
    headerTopP = document.querySelector('.header-top-left p');


    let timeoutId;

    shoppingCart.addEventListener('mouseenter', function() {
        clearTimeout(timeoutId);
        showCart.classList.add('show');
        colorShoppingCart.style.color = "#55D5D2";
        overlayCartPopup.style.display = 'block';
        headerTopP.style.color = '#FFF';
        if (svgIcon) {
            svgIcon.querySelectorAll('path').forEach(function(path) {
                path.setAttribute('fill', '#55D5D2');
            });
        }
    });

    shoppingCart.addEventListener('mouseleave', function() {
        timeoutId = setTimeout(function() {
            showCart.classList.remove('show');
            colorShoppingCart.style.color = "#FFF";
            overlayCartPopup.style.display = 'none';
            headerTopP.style.color = '#000';
        }, 1000); 
    });

    showCart.addEventListener('mouseenter', function() {
        clearTimeout(timeoutId);
    });

    showCart.addEventListener('mouseleave', function() {
        timeoutId = setTimeout(function() {
            showCart.classList.remove('show');
            colorShoppingCart.style.color = "#FFF";
            overlayCartPopup.style.display = 'none';
            headerTopP.style.color = '#000';
            
            if (svgIcon) {
                svgIcon.querySelectorAll('path').forEach(function(path) {
                    path.setAttribute('fill', 'white');
                });
            }
        }, 1000); 
    });
});
