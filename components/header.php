<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="css/global.css">
<link rel="stylesheet" href="css/custom-scroll.css">
<link rel="stylesheet" href="css/animation.css">
<link rel="stylesheet" href="css/pop-up.css">
<link rel="stylesheet" href="css/back-to-top.css">

<header id="header-page">
    <section class="header-top">
        <div class="header-top-left">
            <p>GIẢM NGAY 15% CHO ĐƠN HÀNG ĐẦU TIÊN</p>
        </div>

        <div class="header-top-right">
            <div class="header-top-right-item">
                <a href="">Chính Sách</a>
            </div>

            <div class="header-top-right-item">
                <a href="">Tra Cứu Đơn Hàng</a>
            </div>

            <div class="header-top-right-item hello-user">
                <a href="login.php" id="loginLink">
                    <i class="fa-solid fa-user"></i>

                    <?php
                    if (isset($_SESSION['user_name'])) {
                        $loggedInUsername = $_SESSION['user_name'];
                        echo '<span>' . htmlspecialchars($loggedInUsername) . '</span>';

                        echo '<div class="user-dropdown-content" id="dropdownContent">';
                        echo '<a class="user-link" href="#">Cài đặt</a>';
                        echo '<a class="user-link" href="logout.php">Đăng xuất</a>';
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
        .logo-link{
            width: 50px;
            height: 50px;
        }

        .logo-link img{
            width: 50px;
            border-radius: 50%;
        }
    </style>

    <section class="header-bottom">
        <li class="header-bottom-item">
            <a href="index.php" class="logo-link">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="2.8125rem" height="2.5rem" viewBox="0 0 45 40"
                    fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M27.0764 0.661244C24.9828 4.6627 20.0135 14.7584 20.0286 14.9802C20.0636 15.4937 20.985 16.9386 21.1295 16.7062C21.253 16.5072 25.0672 8.87351 26.6001 5.75713C26.9507 5.04451 27.3099 4.48583 27.3983 4.51563C27.5626 4.57063 37.7735 24.9026 38.011 25.6475L38.1417 26.057H33.6195C30.128 26.057 29.0982 26.1114 29.1005 26.2958C29.1023 26.4272 29.2993 26.8783 29.5384 27.2985L29.973 28.0625L35.5189 28.1133C38.569 28.1412 41.1279 28.0982 41.205 28.0178C41.2822 27.9374 38.2127 21.6004 34.3839 13.9357L27.4225 0L27.0764 0.661244ZM8.61908 18.6924C6.06921 23.7704 4.03548 27.9773 4.09995 28.0415C4.25326 28.1941 13.6293 28.193 14.7492 28.0401C15.541 27.9321 15.645 27.853 15.9973 27.0911C16.2085 26.6338 16.3355 26.2142 16.2795 26.1585C16.2235 26.1026 14.1629 26.057 11.7003 26.057C9.2379 26.057 7.22316 26.0163 7.22316 25.9665C7.22316 25.6128 13.2295 13.8462 13.367 13.9308C13.4629 13.9898 15.568 18.1175 18.0448 23.1035C20.5216 28.0896 22.6186 32.1669 22.7048 32.1643C22.8866 32.1589 30.0589 17.755 30.0526 17.4077C30.0453 17.0047 29.3166 15.552 29.1216 15.552C29.0192 15.552 27.571 18.3032 25.9036 21.6657C24.2364 25.0283 22.7878 27.7515 22.6846 27.7174C22.5816 27.6832 20.4636 23.6043 17.9782 18.6535C15.4928 13.7025 13.4134 9.60862 13.3574 9.55592C13.3013 9.50321 11.1692 13.6147 8.61908 18.6924ZM3.65383 31.765C1.88278 32.221 0.28692 33.7494 0.0514832 35.2153C-0.146152 36.4459 0.219569 37.4399 1.2467 38.4621C1.98218 39.1942 2.39011 39.4266 3.43393 39.7078C4.973 40.1225 6.11526 40.017 7.5302 39.3294C8.06824 39.0679 8.56481 38.854 8.63348 38.854C8.70202 38.854 8.75824 39.1174 8.75824 39.4391C8.75824 39.9841 8.80082 40.0201 9.38179 39.9643L10.0054 39.9045L10.0597 37.7517C10.0897 36.5678 10.0261 35.2739 9.9185 34.8766C9.65182 33.8905 8.56767 32.6833 7.49966 32.1837C6.53356 31.7316 4.60076 31.5211 3.65383 31.765ZM15.2821 31.7238C13.9417 32.178 12.6073 33.315 12.2235 34.3302C12.1117 34.6258 12.0202 35.9739 12.0202 37.3257C12.0202 39.6347 12.0439 39.7908 12.4131 39.9074C13.2144 40.1607 13.3633 39.7388 13.3633 37.2153V34.859L14.0828 34.1083C15.5423 32.5852 17.8426 32.5718 19.3551 34.0775L20.0791 34.7981V37.0989C20.0791 39.4641 20.2399 40 20.9495 40C21.5009 40 21.6611 39.2226 21.5752 36.9623C21.5073 35.1738 21.4109 34.5933 21.0748 33.9468C20.6033 33.0405 19.6539 32.2456 18.5924 31.8686C17.8888 31.6186 15.8549 31.5296 15.2821 31.7238ZM26.7093 31.7349C26.1847 31.8678 25.0509 32.6114 24.5495 33.1515C23.7328 34.0312 23.533 34.8671 23.533 37.4024C23.533 39.634 23.5575 39.791 23.9259 39.9074C24.708 40.1545 24.8761 39.724 24.8761 37.4748C24.8761 35.0387 25.1294 34.2964 26.2012 33.5914C27.1128 32.9916 28.7649 32.8 29.6731 33.1888C31.3467 33.905 31.7838 34.8371 31.7838 37.6889C31.7838 39.632 31.8122 39.7922 32.1767 39.9074C32.9721 40.1587 33.1269 39.734 33.1269 37.3006C33.1269 35.3875 33.063 34.8946 32.7215 34.1713C31.9491 32.5358 30.326 31.5935 28.3299 31.6224C27.6439 31.6323 26.9146 31.6829 26.7093 31.7349ZM38.1795 31.9379C36.183 32.6482 35.0457 34.0601 35.0457 35.8282C35.0457 38.4585 38.0296 40.4437 41.0601 39.8296C41.7096 39.698 42.5267 39.4247 42.8758 39.2223C43.6734 38.7594 43.6433 38.7539 43.7156 39.3792C43.7666 39.8222 43.8666 39.9045 44.3518 39.9045H44.9275L44.9866 37.6125C45.0562 34.902 44.877 34.1633 43.9173 33.2052C42.4835 31.7738 40.1125 31.2501 38.1795 31.9379ZM7.35925 33.7539C8.99327 34.8812 9.00704 36.7052 7.39014 37.8207C5.72248 38.9711 3.46041 38.7574 2.16216 37.327C1.34149 36.4229 1.24344 35.5344 1.85515 34.5489C2.47204 33.5554 3.60049 33.0921 5.2282 33.1639C6.34609 33.2132 6.72908 33.3194 7.35925 33.7539ZM42.4836 33.8273C42.8778 34.1438 43.3042 34.7103 43.431 35.0865C44.3406 37.7873 40.1334 39.7126 37.572 37.7678C35.8802 36.4833 36.1696 34.5126 38.2117 33.4122C38.6454 33.1786 39.1548 33.1206 40.2769 33.1771C41.5873 33.243 41.8524 33.3213 42.4836 33.8273Z"
                        fill="white"></path>
                </svg> -->

                <img src="images/logoX1 .png" alt="">
            </a>
        </li>

        <li class="header-bottom-item">
            <a class="header-bottom-link" href="">Sản Phẩm <i class="fa-solid fa-angle-down"></i></a>
        </li>

        <li class="header-bottom-item">
            <a class="header-bottom-link" href="">Tìm cửa hàng <i class="fa-solid fa-location-dot"></i></a>
        </li>

        <form action="action/search.php" method="post" class="search-box">
            <input class="search-text" type="text" placeholder="Nhập nội dung cần tìm" required>
            <button type="submit" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <li class="header-bottom-item">
            <a class="header-bottom-link" href="" class="header-bottom-item">Xem Thêm <i
                    class="fa-solid fa-angle-down"></i></a>

        </li>

        <li class="header-bottom-item">
            <a class="header-bottom-link" href="" class="header-bottom-item">Hành Trình tử tế</a>
        </li>

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
    </section>
</header>

<div class="popup" id="popup">
    <div class="popup-content">
        <img src="images/popup-web-01.png" alt="Popup Image">
        <button id="closePopup"><i class="fa-solid fa-circle-xmark"></i></button>
    </div>
</div>

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

    .header-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background-color: rgba(128, 128, 128, 0.5);
        box-shadow: 0 0 30px rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(7.5px);
        border-radius: 35px;
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

    @keyframes jump {
        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }

    }

    .fa-location-dot {
        margin-left: 5px;
        display: inline-block;
        animation: jump 1s cubic-bezier(0.175, 0.885, 0.32, 1.275) infinite;
    }

    .search-box {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f1f1f1;
        border-radius: 25px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 5px 10px;
        max-width: 500px;
        width: 500px;
    }

    .search-text {
        flex-grow: 1;
        border: none;
        background: transparent;
        padding: 10px;
        font-size: 14px;
        border-radius: 25px 0 0 25px;
        outline: none;
    }

    .search-text::placeholder {
        color: #888;
    }

    .search-box:focus-within {
        border-color: #28a745;
        box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.3);
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
        bottom: 10px;
        right: -10px;
        width: 20px;
        height: 20px;
        text-align: center;
        line-height: 20px;
        border-radius: 50%;
        color: #FFF;
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

<script src="js/show-cart.js"></script>
<script src="js/scroll-to-top.js"></script>
<script src="js/header.js"></script>

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
    document.addEventListener("DOMContentLoaded", function() {
        var loginLink = document.getElementById('loginLink');

        <?php if (isset($_SESSION['user_name'])): ?>
            loginLink.addEventListener('click', function(event) {
                event.preventDefault();
            });
        <?php endif; ?>
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var cartItems = [];
    var cartItemsContainer = document.querySelector('.cart-items');
    var cartLength = document.querySelector('.shopping-cart-page .lenght-cart');
    var totalCartPrice = document.querySelector('.cart-popup-bottom .cart-total span');
    var selectedColor = '';
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
                cartItemsContainer.innerHTML = '<img class="cart-item-null" src="images/cart-item-null.jpeg">';
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

</script>