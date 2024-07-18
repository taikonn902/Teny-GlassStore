document.addEventListener('DOMContentLoaded', function() {
var decreaseBtn = document.querySelector('.decrease-detail-page-btn');
var increaseBtn = document.querySelector('.increase-detail-page-btn');
var quantityDisplay = document.querySelector('.quantity-product-detail');

var remainingStock = parseInt(document.querySelector('.remaining-stock').textContent);
var productPrice = parseFloat(document.querySelector('.product-single-price-detail').textContent.replace('đ', '').replace('.', ''));
var showPriceDetail = document.querySelector('.show-price-detail');

function updateButtonStates() {
    var quantity = parseInt(quantityDisplay.textContent);
    if (quantity <= 1) {
        decreaseBtn.style.cursor = 'not-allowed';
        decreaseBtn.disabled = true;
    } else {
        decreaseBtn.style.cursor = 'pointer';
        decreaseBtn.disabled = false;
    }

    if (quantity >= remainingStock) {
        increaseBtn.style.cursor = 'not-allowed';
        increaseBtn.disabled = true;
    } else {
        increaseBtn.style.cursor = 'pointer';
        increaseBtn.disabled = false;
    }
}

decreaseBtn.addEventListener('click', function() {
    var quantity = parseInt(quantityDisplay.textContent);
    if (quantity > 1) {
        quantity--;
        quantityDisplay.textContent = quantity;
        updatePriceDetail(quantity);
    }
    updateButtonStates();
});

increaseBtn.addEventListener('click', function() {
    var quantity = parseInt(quantityDisplay.textContent);
    if (quantity < remainingStock) {
        quantity++;
        quantityDisplay.textContent = quantity;
        updatePriceDetail(quantity);
    }
    updateButtonStates();
});

function updatePriceDetail(quantity) {
    var totalPrice = productPrice * quantity;
    showPriceDetail.textContent = formatCurrency(totalPrice);
}

updateButtonStates();


function formatCurrency(amount) {
    return amount.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
}

});