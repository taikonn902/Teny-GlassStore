document.addEventListener('DOMContentLoaded', function() {
    var cartItems = [];
    var cartItemsContainer = document.querySelector('.cart-items');
    var cartLength = document.querySelector('.shopping-cart-page .lenght-cart');
    var totalCartPrice = document.querySelector('.cart-popup-bottom .cart-total span');
    var selectedColor = '';
    var productPrice = parseInt(document.querySelector('.product-single-price-detail').textContent.replace('đ', '').replace('.', ''));
    var quantityDisplay = document.querySelector('.quantity-product-detail');
    var alertSuccess = document.querySelector('.alert-success');
    var deleteSuccess = document.querySelector('.delete-success');
    var errorAlert = document.querySelector('.error-alert');

    checkCartEmpty();

    if (localStorage.getItem('cartItems')) {
        cartItems = JSON.parse(localStorage.getItem('cartItems'));
        updateCartLength();
        renderCartItems();
        checkCartEmpty();
    } else {
        cartLength.textContent = '0';
        totalCartPrice.textContent = '0đ';
        checkCartEmpty();
    }

    function checkCartEmpty() {
        if (cartItems.length === 0) {
            if (cartItemsContainer) {
                cartItemsContainer.innerHTML = '<img class="cart-item-null" src="../images/cart-item-null.jpeg">';
            } else {
                console.error('Không tìm thấy phần tử có lớp ".cart-item .cart-popup-mid"');
            }
        }
    }

    function updateCartLength() {
        var totalQuantity = calculateTotalQuantity();
        cartLength.textContent = totalQuantity;
    }

    function calculateTotalQuantity() {
        var total = 0;
        cartItems.forEach(function(item) {
            total += item.quantity;
        });
        return total;
    }

    var colorBoxes = document.querySelectorAll('.color-box');
    colorBoxes.forEach(function(box) {
        box.addEventListener('click', function() {
            colorBoxes.forEach(function(b) {
                b.classList.remove('selected');
            });

            this.classList.add('selected');
            selectedColor = this.dataset.color;
        });
    });

    var addToCartBtn = document.querySelector('.add-to-cart-detail');
    addToCartBtn.addEventListener('click', function() {
        if (selectedColor === '') {
            errorAlert.classList.add('show');
            setTimeout(function() {
                errorAlert.classList.remove('show');
            }, 2000); // 2 giây sau đó ẩn đi
            return;
        }

        var productInfo = {
            image: document.querySelector('.container-main-img img').src,
            name: document.querySelector('.product-name-detail').textContent,
            color: selectedColor,
            quantity: parseInt(quantityDisplay.textContent),
            price: productPrice,
            totalPrice: productPrice * parseInt(quantityDisplay.textContent)
        };

        var existingItemIndex = cartItems.findIndex(function(item) {
            return item.name === productInfo.name && item.color === productInfo.color;
        });

        if (existingItemIndex !== -1) {
            cartItems[existingItemIndex].quantity += productInfo.quantity;
            cartItems[existingItemIndex].totalPrice += productInfo.totalPrice;
        } else {
            cartItems.push(productInfo);
        }

        localStorage.setItem('cartItems', JSON.stringify(cartItems));

        // Update cart length and render cart items
        updateCartLength();
        renderCartItems();

        // Hiển thị thông báo thêm thành công
        alertSuccess.classList.add('show');
        setTimeout(function() {
            alertSuccess.classList.remove('show');
        }, 2000); // 2 giây sau đó ẩn đi
    });

    function renderCartItems() {
        if (cartItemsContainer) {
            cartItemsContainer.innerHTML = '';

            cartItems.forEach(function(item, index) {
                var itemHTML = `
                    <div class="cart-item">
                        <img class="cart-item-img" src="${item.image}" alt="product-img">
                        <div class="cart-item-info">
                            <p class="cart-item-name">${item.name}</p>
                            <p class="cart-item-color">Màu: ${item.color}</p>
                            <p class="cart-item-quantity-price"><span class="cart-item-quantity">${item.quantity} x</span><span class="cart-item-price">${formatCurrency(item.totalPrice)}</span></p>
                            <button class="delete-cart-item" data-index="${index}"><i class="fa-regular fa-trash-can"></i></button>
                        </div>
                    </div>
                `;
                cartItemsContainer.innerHTML += itemHTML;
            });

            var deleteButtons = document.querySelectorAll('.delete-cart-item');
            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var index = parseInt(button.dataset.index);

                    cartItems.splice(index, 1);
                    localStorage.setItem('cartItems', JSON.stringify(cartItems));
                    updateCartLength();
                    renderCartItems();
                    checkCartEmpty();

                    // Hiển thị thông báo xóa thành công
                    deleteSuccess.classList.add('show');
                    setTimeout(function() {
                        deleteSuccess.classList.remove('show');
                    }, 2000); // 2 giây sau đó ẩn đi
                });
            });
        }
    }

    function formatCurrency(amount) {
        return amount.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    }
});
