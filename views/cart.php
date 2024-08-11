<?php
ob_start(); 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../images/TN.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/custom-scroll.css">

    <title>Giỏ Hàng</title>
</head>

<style>
    #main-cart-page {}

    .cart-page {
        width: 90%;
        margin: 20px auto;
    }

    .container-img-cart-page {
        height: 650px;
        position: relative;
    }

    .container-img-cart-page img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .container-img-cart-page p {
        position: absolute;
        bottom: 30%;
        left: 10%;
        color: #FFF;
        font-size: 50px;
        font-weight: 500;
        text-transform: uppercase;
    }

    .title-cart-page {
        text-transform: capitalize;
        text-align-last: left;
        position: absolute;
        left: 10%;
        bottom: 20%;
        color: #FFF;
        align-items: center;
        display: flex;
    }

    .title-cart-page i {
        margin: 0 15px;
        font-size: 10px;
        color: #81C8C2;
    }

    .title-cart-page a {
        position: relative;
        display: inline-block;
        color: #fff;
        text-decoration: none;
        padding: 10px 40px;
        transition: color 0.3s ease-in-out, background-position 0.3s ease-in-out;
        background: linear-gradient(to left, transparent 50%, #55D5D2 50%);
        background-size: 200% 100%;
        background-position: 100%;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        overflow: hidden;
    }

    .title-cart-page a:last-child {
        cursor: not-allowed;
    }

    .title-cart-page a:hover {
        background-position: 0%;
    }

    .title-cart-page a::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 5px;
        height: 100%;
        background-color: #55D5D2;
        transition: all ease-in-out 0.3s;
    }

    .container-cart-product {
        display: flex;
        gap: 20px;
        margin-top: 30px;
    }

    .cart-product-left {
        width: 75%;
        max-height: 500px;
        overflow-y: auto;
        padding-right: 5px;
    }

    .cart-product-left::-webkit-scrollbar {
        width: 5px;
        background: #f1f1f1;
    }

    .cart-product-left::-webkit-scrollbar-thumb {
        background: #888;
    }

    .cart-product-left::-webkit-scrollbar-thumb:hover {
        background: #555;
        cursor: pointer;
    }

    .cart-header,
    .cart-item {
        display: flex;
        align-items: center;
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
    }

    .cart-header div {
        font-weight: bold;
    }

    .cart-header .checkbox,
    .cart-item .checkbox {
        width: 5%;
        display: flex;
        justify-content: center;
    }

    .cart-header .product-info,
    .cart-item .product-info {
        width: 42.5%;
        display: flex;
        align-items: center;
    }

    .cart-header .product-info span,
    .cart-item .product-info img {
        margin-right: 10px;
    }

    .name {
        font-weight: 700;
        color: #dd9933;
        margin-bottom: 10px;
    }

    .size-color {
        font-size: 13px;
        font-weight: 600;
        margin-top: 10px;
    }

    .cart-item .price,
    .cart-item .total {
        color: #1E90FF;
        font-weight: 600;
    }

    .cart-header .price,
    .cart-item .price,
    .cart-header .quantity,
    .cart-header .total,
    .cart-item .total {
        text-align: left;
        padding: 10px 20px;
    }

    .cart-header .price,
    .cart-item .price {
        width: 25%;
        text-align: center;
    }

    .cart-header .quantity,
    .cart-item .quantity {
        width: 15%;
        text-align: center;
    }

    .cart-header .wherehouse,
    .cart-item .wherehouse {
        width: 7.5%;
        text-align: center;
    }



    .cart-header .total,
    .cart-item .total {
        width: 25%;
        text-align: center;
    }

    .cart-item img {
        width: 100px;
        height: auto;
    }

    .cart-header .quantity,
    .cart-item .quantity {
        text-align: center;
    }

    .cart-item .quantity {
        display: flex;
        border-radius: 25px;
        justify-content: space-around;
        background-color: #FFF;
        align-items: center;
        font-weight: 600;
        border: 1px solid #55D5D2;
        padding: 10px 0;
    }

    .quantity-btn {
        background: none;
        border: none;
        font-size: 15px;
        font-weight: 500;
        cursor: pointer;
        color: #55D5D2;
    }

    .container-btn-order-cart {
        display: flex;
        text-align: center;
        gap: 30px;
        margin-top: 20px;
    }

    .delete-product,
    .return-buy {
        padding: 10px 30px;
        font-weight: 600;
        border-radius: 20px;
        border: none;
        background: none;
        cursor: pointer;
    }

    .delete-product {
        background-color: #d9d9d9;
        color: #eee;
        cursor: no-drop;
    }

    .return-buy {
        background-color: #55D5D2;
        transition: all ease-in-out 0.3s;
    }

    .return-buy a {
        color: #FFF;
    }

    .return-buy:hover {
        background-color: #f58f5d;
    }

    .return-buy a i {
        display: inline-block;
        transform: rotate(45deg);
        transition: transform 0.3s ease;
        margin-right: 10px;
    }

    .return-buy:hover a i {
        transform: rotate(0deg);
    }

    .cart-product-right {
        width: 25%;
        padding: 50px 30px;
        background-color: #f3f3f3;
        height: auto;
    }

    .title-cart-order {
        text-align: center;
        margin-bottom: 20px;
    }

    .cart-product-order {
        width: 90%;
        margin: 0px auto;
    }

    .total-product,
    .provisional {
        padding: 20px 0px;
        display: flex;
        border-bottom: 1px dashed #333;
        justify-content: space-between;
        font-weight: 600;
    }

    .container-checkout-btn {
        margin: 40px 0;
        text-align: center;
        cursor: pointer;
    }

    .checkout {
        padding: 10px 30px;
        background-color: #55D5D2;
        border: none;
        border-radius: 20px;
        transition: all ease-in-out 0.3s;
    }

    .checkout a {
        color: #fff;
        font-weight: 600;
    }

    .checkout:hover {
        background-color: #f58f5d;
    }

    .checkout i {
        display: inline-block;
        transform: rotate(310deg);
        transition: transform 0.3s ease;
        margin-left: 10px;
    }

    .checkout:hover a i {
        transform: rotate(360deg);
    }
</style>

<body>
    <?php include "components/header.php"; ?>

    <main id="main-cart-page">
        <section class="container-img-cart-page">
            <img src="images/bg-banner-about-us.jpeg" alt="">
            <p>Giỏ hàng</p>

            <h3 class="title-cart-page">
                <a href="index.php">Trang chủ</a> <i class="fa-solid fa-circle"></i> <a class="second-link" href="#">Giỏ
                    Hàng</a>
            </h3>
        </section>

        <section class="cart-page">
            <div class="container-cart-product">
                <div class="cart-product-left">
                    <div class="cart-header">
                        <div class="checkbox"><input type="checkbox" id="select-all"></div>
                        <div class="product-info"><span>Thông tin sản phẩm</span></div>
                        <div class="price"><span>Đơn giá</span></div>
                        <div class="quantity"><span>SL</span></div>
                        <div class="wherehouse"><span>Kho</span></div>
                        <div class="total"><span>Thành tiền</span></div>
                    </div>

                    <div class="container-cart-item">
                        <!-- Cart items show here -->
                    </div>
                </div>

                <div class="cart-product-right">
                    <h3 class="title-cart-order">Tóm Tắt Đơn Hàng</h3>

                    <div class="cart-product-order">
                        <div class="total-product">
                            <h4>Sản phẩm</h4>
                            <span></span>
                        </div>
                        <div class="provisional">
                            <h4>Tạm tính</h4>
                            <span></span>
                        </div>

                        <div class="container-checkout-btn">
                            <button class="checkout">
                                <a href="checkout.php">Thanh toán <i class="fa-solid fa-arrow-right"></i></a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-btn-order-cart">
                <button class="delete-product">Xoá Sản phẩm đã chọn</button>
                <button class="return-buy"><a href="list-item.html"><i class="fa-solid fa-arrow-left"></i> Tiếp tục mua
                        hàng</a></button>
            </div>
        </section>
    </main>
</body>

<script>
    document.querySelector('.second-link').addEventListener('click', function (event) {
        event.preventDefault();
    });
</script>

</html>t