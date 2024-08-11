<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="<?php echo ROOT_FE; ?>css/global.css">
<link rel="stylesheet" href="<?php echo ROOT_FE; ?>css/custom-scroll.css">
<link rel="stylesheet" href="<?php echo ROOT_FE; ?>css/animation.css">
<link rel="stylesheet" href="<?php echo ROOT_FE; ?>css/back-to-top.css">

<header id="header-page">
    <section class="header-top">
        <div class="header-top-left">
            <p>HÀNG NGÀN VOUCHER CHO KHÁCH HÀNG MỚI</p>
        </div>

        <div class="header-top-right">
            <div class="header-top-right-item">
                <a href="">Xem Đơn Hàng</a>
            </div>
            <div class="header-top-right-item hello-user">
                <a href="<?php echo ROOT_FE; ?>accounts/login.php" id="loginLink">
                    <i class="fa-solid fa-user"></i>

                    <?php
                    if (isset($_SESSION['user_name'])) {
                        $loggedInUsername = $_SESSION['user_name'];
                        echo '<span>' . htmlspecialchars($loggedInUsername) . '</span>';

                        echo '<div class="user-dropdown-content" id="dropdownContent">';
                        echo '<a class="user-link" href="#">Cài đặt</a>';
                        echo '<a class="user-link" href="' . ROOT_FE . 'accounts/logout.php">Đăng xuất</a>';

                        echo ' </div>';
                    } else {
                        echo '<span>Người Dùng</span>';
                    }
                    ?>
                </a>
            </div>
        </div>
    </section>

    <style>
        .logo-link {
            width: 50px;
            height: 50px;
        }

        .logo-link img {
            width: 50px;
            border-radius: 50%;
        }
    </style>

    <section class="header-bottom">
        <nav class="header-bottom-left">
            <a class="home-link" href="<?php echo ROOT_FE ?>index.php">
                <img class="logo-page" src="<?php echo ROOT_FE ?>images/logo-page.png" alt="LOGO">
            </a>

            <li class="header-bottom-left-item">
                <a class="header-bottom-link" href="<?php echo ROOT_FE ?>views/all-item.php">Sản Phẩm <i
                        class="fa-solid fa-angle-down"></i></a>
            </li>

            <li class="header-bottom-left-item">
                <a class="header-bottom-link" href="">Xem Thêm <i class="fa-solid fa-angle-down"></i></a>
            </li>

            <li class="header-bottom-left-item">
                <a class="header-bottom-link" href="">Tìm cửa hàng <i class="fa-solid fa-location-dot"></i></a>
            </li>
        </nav>

        <div class="header-bottom-right">
            <form method="POST" class="search-box">
                <input class="search-text" type="text" placeholder="Nhập nội dung cần tìm" required>
                <input type="file" id="search-image-input" name="search_image" accept="image/*" style="display:none;">
                <button type="button" class="search-image"
                    onclick="document.getElementById('search-image-input').click();"><i
                        class="fa-solid fa-camera"></i></button>
                <button type="submit" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

            <script>
                document.getElementById('search-image-input').addEventListener('change', function () {
                    if (this.files && this.files[0]) {
                        console.log("Image selected: ", this.files[0].name);

                        this.closest('form').submit();
                    }
                });
            </script>

            <a href="cart.php" class="shopping-cart-page">
                <p>Giỏ hàng</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="1.47381rem" height="1.44581rem" viewBox="0 0 24 24"
                    fill="none">
                    <path
                        d="M15.9218 5.78316C15.7027 5.78316 15.4926 5.69612 15.3376 5.54118C15.1827 5.38624 15.0956 5.1761 15.0956 4.95699C15.0956 4.08054 14.7475 3.23999 14.1277 2.62024C13.508 2.0005 12.6674 1.65233 11.791 1.65233C10.9145 1.65233 10.074 2.0005 9.45423 2.62024C8.83448 3.23999 8.48631 4.08054 8.48631 4.95699C8.48631 5.1761 8.39927 5.38624 8.24434 5.54118C8.0894 5.69612 7.87926 5.78316 7.66015 5.78316C7.44104 5.78316 7.2309 5.69612 7.07596 5.54118C6.92103 5.38624 6.83398 5.1761 6.83398 4.95699C6.83398 3.64232 7.35624 2.38149 8.28585 1.45187C9.21547 0.522253 10.4763 0 11.791 0C13.1057 0 14.3665 0.522253 15.2961 1.45187C16.2257 2.38149 16.748 3.64232 16.748 4.95699C16.748 5.1761 16.6609 5.38624 16.506 5.54118C16.3511 5.69612 16.1409 5.78316 15.9218 5.78316Z"
                        fill="white"></path>
                    <path
                        d="M17.6561 23.1327H5.92459C5.05912 23.1325 4.22083 22.8304 3.55423 22.2784C2.88763 21.7264 2.43449 20.9592 2.27294 20.1089L0.0670791 8.54259C-0.0365575 8.00506 -0.0199343 7.45124 0.115756 6.92089C0.251446 6.39054 0.50284 5.89679 0.8519 5.47508C1.20096 5.05336 1.63903 4.71413 2.13469 4.48173C2.63034 4.24932 3.1713 4.12951 3.71873 4.13087H19.862C20.4094 4.12951 20.9504 4.24932 21.446 4.48173C21.9417 4.71413 22.3798 5.05336 22.7288 5.47508C23.0779 5.89679 23.3293 6.39054 23.465 6.92089C23.6007 7.45124 23.6173 8.00506 23.5137 8.54259L21.3078 20.1089C21.1462 20.9592 20.6931 21.7264 20.0265 22.2784C19.3599 22.8304 18.5216 23.1325 17.6561 23.1327ZM1.68636 8.2617L3.89222 19.828C3.98918 20.2952 4.24428 20.7147 4.61451 21.0157C4.98474 21.3167 5.44744 21.4808 5.92459 21.4803H17.6561C18.1333 21.4808 18.596 21.3167 18.9662 21.0157C19.3365 20.7147 19.5916 20.2952 19.6885 19.828L21.8944 8.2617C21.9542 7.96107 21.9467 7.65091 21.8723 7.35355C21.7979 7.05619 21.6585 6.77903 21.4641 6.542C21.2697 6.30497 21.0252 6.11398 20.7482 5.98278C20.4712 5.85157 20.1685 5.78341 19.862 5.7832H3.71873C3.4122 5.78341 3.10954 5.85157 2.83251 5.98278C2.55549 6.11398 2.311 6.30497 2.11663 6.542C1.92227 6.77903 1.78287 7.05619 1.70848 7.35355C1.63408 7.65091 1.62652 7.96107 1.68636 8.2617Z"
                        fill="white"></path>
                    <path
                        d="M15.9218 9.91405H7.66015C7.44104 9.91405 7.2309 9.82701 7.07596 9.67207C6.92103 9.51713 6.83398 9.307 6.83398 9.08788C6.83398 8.86877 6.92103 8.65863 7.07596 8.5037C7.2309 8.34876 7.44104 8.26172 7.66015 8.26172H15.9218C16.1409 8.26172 16.3511 8.34876 16.506 8.5037C16.6609 8.65863 16.748 8.86877 16.748 9.08788C16.748 9.307 16.6609 9.51713 16.506 9.67207C16.3511 9.82701 16.1409 9.91405 15.9218 9.91405Z"
                        fill="white"></path>
                </svg>
                <div class="lenght-cart">0</div>
            </a>

            <div id="show-cart">
                <div class="cart-popup-top">
                    <p class="title-cart">Giỏ hàng</p>

                    <a class="see-cart" href="cart.php">Xem Giỏ <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <div class="cart-items">
                    <!-- item show here -->
                </div>

                <div class="cart-popup-bottom">
                    <p class="cart-total">Tổng tiền: <span>1.000.000đ</span></p>
                    <a href="checkout.html">
                        <span>Thanh Toán</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</header>

<button class="top-page-btn">
    <i class="fa-solid fa-angle-up"></i>
</button>

<div class="overlay" id="overlay"></div>
<div class="overlay-cart-popup" id="overlay-cart-popup"></div>

<!-- hello user -->
<style>
    .user-dropdown-content {
        z-index: 1000;
        position: absolute;
        background-color: #F58F5D;
        text-align: left;
        top: 200%;
        right: 0;
        width: 170px;
        transition: all ease-in-out 0.3s;
        visibility: hidden;
        opacity: 0;
        padding: 5px 0;
    }

    .user-dropdown-content.show {
        opacity: 1;
        visibility: visible;
        top: 135%;
    }

    .user-dropdown-content::before {
        content: '';
        position: absolute;
        top: -10px;
        left: 70%;
        transform: translateX(-50%);
        border-width: 0 10px 10px 10px;
        border-style: solid;
        border-color: transparent transparent #F58F5D transparent;
    }

    .user-link {
        padding: 10px 30px;
        border-bottom: 1px solid #ddd;
        cursor: pointer;
    }

    .user-link:last-child {
        border-bottom: none;
    }

    .user-link:hover {
        background-color: #55D5D2;
    }
</style>

<!-- header css -->
<style>
    #header-page {
        z-index: 1000;
        position: fixed;
        width: 95%;
        left: 2.5%;
        top: 0;
        transition: top 0.3s ease-in-out;
    }

    .header-top {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        color: #fff;
        font-weight: 600;
        align-items: center;
    }

    .header-top-left p {
        font-size: 13px;
        color: #221F20;
        text-transform: uppercase;
        transition: all ease-in-out 0.3s;
    }

    .header-top-right {
        display: flex;
        gap: 15px;
    }

    .header-top-right-item {
        background-color: rgba(150, 150, 150, 0.9);
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 14px;
        cursor: pointer;
        transition: all ease-in-out 0.3s;
        position: relative;
    }

    .header-top-right-item a {
        display: flex;
        gap: 7px;
        color: #fff;
        font-size: 13px;
    }

    .header-top-right-item:hover {
        background-color: #F58F5D;
    }

    /*-------------------------------------- phần bottom---------------------------------------------- */

    .header-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 5px 30px 5px 20px;
        background-color: rgba(128, 128, 128, 0.5);
        box-shadow: 0 0 30px rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(7.5px);
        border-radius: 35px;
        position: relative;
    }

    .header-bottom-left {
        display: flex;
        gap: 30px;
        align-items: center;
    }

    .home-link {
        width: 50px;
        height: 50px;
    }

    .logo-page {
        width: 50px;
        height: 50px;
    }

    .header-bottom-link {
        font-size: 15px;
        font-weight: 700;
        color: #fff;
        transition: all ease-in-out 0.3s;
        text-transform: capitalize;
    }

    .header-bottom-item:hover .header-bottom-link {
        color: #55d5d2;
    }

    .fa-location-dot {
        margin-left: 5px;
        display: inline-block;
        animation: jump 1s cubic-bezier(0.175, 0.885, 0.32, 1.275) infinite;
    }

    @keyframes jump {
        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }

    }

    /* ----------------------------phần dưới bên phải ---------------- */
    .header-bottom-right {
        display: flex;
        gap: 30px;
    }

    .search-box {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f1f1f1;
        border-radius: 25px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 0px 10px;
        max-width: 400px;
        width: 400px;
        position: relative;
    }

    .search-text {
        flex-grow: 1;
        border: none;
        background: transparent;
        padding: 5px 50px 5px 15px;
        ;
        font-size: 13px;
        border-radius: 25px 0 0 25px;
        outline: none;
    }

    .search-text::placeholder {
        color: #888;
        font-weight: 500;
    }

    .search-box:focus-within {
        border-color: #28a745;
        box-shadow: 0 0 0 2px #55D5D2;
    }

    .search-image {
        position: absolute;
        cursor: pointer;
        font-size: 15px;
        border: none;
        right: 13%;
        border-left: 1px solid #000;
        border-right: 1px solid #000;
        padding: 0 10px;
    }

    .search-btn {
        border: none;
        color: #221F20;
        padding: 10px;
        font-size: 15px;
        cursor: pointer;
        border-radius: 0 25px 25px 0;
        transition: background-color 0.3s ease;
    }

    .shopping-cart-page {
        display: flex;
        gap: 7px;
        position: relative;
        align-items: center;
        color: #fff;
        font-weight: 700;
        cursor: pointer;
        text-transform: capitalize;
        font-size: 15px;
        transition: all ease-in-out 0.3s;
    }

    .shopping-cart-page:hover p {
        color: #55d5d2;
    }

    .shopping-cart-page:hover svg path {
        fill: #55d5d2;
    }

    .shopping-cart-page .lenght-cart {
        background-color: #f58f5d;
        position: absolute;
        bottom: 0;
        right: -5px;
        width: 20px;
        height: 20px;
        text-align: center;
        line-height: 20px;
        border-radius: 50%;
        color: #FFF;
        font-weight: 500;
    }
</style>

<!-- cart popup css -->
<style>
    #show-cart {
        position: absolute;
        width: 350px;
        height: 550px;
        background-color: #fff;
        top: 140%;
        right: 0;
        border-radius: 20px;
        padding: 10px;
        opacity: 0;
        visibility: hidden;
        transition: all 0.5s ease-in-out;
        z-index: 1001;
    }

    #show-cart.show {
        opacity: 1;
        top: 120%;
        visibility: inherit;
    }

    #show-cart::after {
        content: "";
        position: absolute;
        top: -13px;
        right: 15%;
        border-width: 0 20px 20px 20px;
        border-style: solid;
        border-color: transparent transparent #fff transparent;
    }

    .cart-popup-top {
        height: 10%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px dashed #221F20;
        padding: 0px 5px 5px 5px;
    }

    .title-cart {
        font-weight: 500;
        text-transform: uppercase;
        font-size: 20px;
        align-items: center;
    }

    .title-cart span {
        font-size: medium;
    }

    .see-cart {
        color: #55D5D2;
        font-size: 13px;
        position: relative;
        padding: 0 10px;
        font-weight: 600;
    }

    .cart-popup-top a i {
        margin-left: 5px;
        display: inline-block;
        transition: transform 0.3s ease;
    }

    .cart-popup-top a:hover i {
        transform: translateX(5px);
    }

    /* middle */
    .cart-items {
        height: 75%;
        position: relative;
        overflow-y: auto;
        padding: 10px 0;
    }

    .cart-items::-webkit-scrollbar {
        width: 0;
    }

    .cart-item-null {
        width: 100%;
        height: auto;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    /* bottom */

    .cart-popup-bottom {
        display: block;
        height: 15%;
        padding: 10px 0 0 0;
        border-top: 1px dashed #221F20;
        text-align: center;
        justify-content: center;
    }

    .cart-popup-bottom .cart-total {
        text-align: right;
        padding: 0 10px;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .cart-popup-bottom a {
        padding: 10px 30px;
        background-color: #55D5D2;
        border-radius: 20px;
        transition: all ease-in-out 0.3s;
        width: 60%;
        justify-content: center;
        font-weight: 700;
        color: #FFF;
    }

    .cart-popup-bottom a i {
        margin-left: 10px;
        display: inline-block;
        transform: rotate(310deg);
        transition: transform 0.3s ease;
    }

    .cart-popup-bottom a:hover {
        background-color: #F58F5D;
    }

    .cart-popup-bottom a:hover i {
        transform: rotate(360deg);
    }


    /* item trong giỏ */

    .cart-item {
        display: flex;
        gap: 10px;
        position: relative;
        padding: 10px 0;
        border-bottom: 1px solid #000;
    }

    .cart-item:first-child {
        padding-top: 0;
    }

    .cart-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .cart-item-img {
        width: 110px;
        height: 110px;
        border-radius: 10px;
    }

    .cart-item-info {
        position: relative;
    }

    .cart-item-name {
        font-weight: 600;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.2;
    }

    .cart-item-color {
        margin-top: 10px;
        font-weight: 500;
        font-size: 15px;
    }

    .cart-item-quantity-price {
        display: flex;
        position: absolute;
        bottom: 0;
        left: 0;
        font-weight: 600;
        align-items: flex-end;
        color: #55D5D2;
    }

    .cart-item-quantity {
        margin-right: 10px;
        font-size: 13px;
    }

    .cart-item-price {
        font-size: 17px;
    }


    .delete-cart-item {
        position: absolute;
        right: 0;
        bottom: 0;
        width: 35px;
        height: 35px;
        font-size: 20px;
        cursor: pointer;
        border: none;
        background-color: #55D5D2;
        color: #fff;
        border-radius: 10px;
        transition: all ease-in-out 0.3s;
    }

    .delete-cart-item:hover {
        background-color: #F58F5D;
    }
</style>

<script src="<?php echo ROOT_FE; ?>js/show-cart.js"></script>
<script src="<?php echo ROOT_FE; ?>js/scroll-to-top.js"></script>

<!-- show user-link js -->
<script>
    const helloUser = document.querySelector('.hello-user');
    const dropdownContent = document.querySelector('.user-dropdown-content');

    helloUser.addEventListener('mouseenter', function () {
        dropdownContent.classList.add('show');
    });

    helloUser.addEventListener('mouseleave', function () {
        dropdownContent.classList.remove('show');
    });
</script>

<!-- chặn tới login khi đăng nhập rồi -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var loginLink = document.getElementById('loginLink');

    <? php if (isset($_SESSION['user_name'])): ?>
            loginLink.addEventListener('click', function (event) {
                event.preventDefault();
            });
    <? php endif; ?>
});
</script>

<!-- hide-show header js -->
<script>
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
</script>





<!-- add to cart js -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var cartItems = [];
        var cartItemsContainer = document.querySelector('.cart-items');
        var cartLength = document.querySelector('.shopping-cart-page .lenght-cart');
        var totalCartPrice = document.querySelector('.cart-popup-bottom .cart-total span');
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
                    cartItemsContainer.innerHTML =
                        '<img class="cart-item-null" src="<?php echo ROOT_FE; ?>/images/cart-item-null.jpeg">';
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
            cartItems.forEach(function (item) {
                total += item.quantity;
            });
            return total;
        }

        var selectedColor = '';
        const colorBoxes = document.querySelectorAll('.color-box');
        colorBoxes.forEach(function (box) {
            box.addEventListener('click', function () {
                colorBoxes.forEach(function (b) {
                    b.classList.remove('color-select');
                });

                this.classList.add('color-select');
                selectedColor = this.dataset.color;
            });
        });

        var addToCartBtn = document.querySelector('.add-to-cart-detail');
        addToCartBtn.addEventListener('click', function () {
            if (selectedColor === '') {
                errorAlert.classList.add('show');
                setTimeout(function () {
                    errorAlert.classList.remove('show');
                }, 2000);
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

            var existingItemIndex = cartItems.findIndex(function (item) {
                return item.name === productInfo.name && item.color === productInfo.color;
            });

            if (existingItemIndex !== -1) {
                cartItems[existingItemIndex].quantity += productInfo.quantity;
                cartItems[existingItemIndex].totalPrice += productInfo.totalPrice;
            } else {
                cartItems.push(productInfo);
            }

            localStorage.setItem('cartItems', JSON.stringify(cartItems));

            updateCartLength();
            renderCartItems();

            alertSuccess.classList.add('show');
            setTimeout(function () {
                alertSuccess.classList.remove('show');
            }, 2000);
        });

        function renderCartItems() {
            if (cartItemsContainer) {
                cartItemsContainer.innerHTML = '';

                cartItems.forEach(function (item, index) {
                    var itemHTML = `
                    <div class="cart-item">
                        <img class="cart-item-img" src="${item.image}" alt="product-img">
                        <div class="cart-item-info">
                            <p class="cart-item-name">${item.name}</p>
                            <p class="cart-item-color">${item.color}</p>
                            <p class="cart-item-quantity-price"><span class="cart-item-quantity">${item.quantity} x</span><span class="cart-item-price">${formatCurrency(item.totalPrice)}</span></p>
                            <button class="delete-cart-item" data-index="${index}"><i class="fa-regular fa-trash-can"></i></button>
                        </div>
                    </div>
                `;
                    cartItemsContainer.innerHTML += itemHTML;
                });

                var deleteButtons = document.querySelectorAll('.delete-cart-item');
                deleteButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        var index = parseInt(button.dataset.index);
                        cartItems.splice(index, 1);
                        localStorage.setItem('cartItems', JSON.stringify(cartItems));
                        updateCartLength();
                        renderCartItems();
                        checkCartEmpty();

                        if (deleteSuccess) {
                            deleteSuccess.classList.add('show');
                            setTimeout(function () {
                                deleteSuccess.classList.remove('show');
                            }, 2000);
                        }
                    });
                });
            };
        };

        function formatCurrency(amount) {
            return amount.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        }

    });
</script>