<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../css/show-detail.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/custom-scroll.css">

</head>

<style>
#main-product-detail {
    padding: 140px 0 80px 0;
    background: linear-gradient(to top right, #D7F8F8 0%, #FFFFFF 50%, #FFFFFF 70%, #FFC8B0 120%);
}
</style>

<body>
    <div class="alert-success">
        <div class="alert-left">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <div class="alert-right">
            <h3>Thành Công!</h3>
            <p>Bạn đã thêm sản phẩm vào giỏ hàng</p>
        </div>
    </div>

    <div class="delete-success">
        <div class="alert-left">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <div class="alert-right">
            <h3>Thành Công!</h3>
            <p>Bạn đã xoá sản phẩm khỏi giỏ hàng</p>
        </div>
    </div>

    <div class="error-alert">
        <div class="alert-left">
            <i class="fa-solid fa-circle-xmark"></i>
        </div>
        <div class="alert-right">
            <h3>Thất Bại!</h3>
            <p>Vui lòng chọn màu sản phẩm</p>
        </div>
    </div>
    <?php
    include "../config/dir-config.php";
    include "../components/header.php";
    ?>

    <main id="main-product-detail">
        <?php
        include dirname(__DIR__) . '/components/details.php';
        ?>

    </main>
</body>

<script src="<?php echo ROOT_FE; ?>js/update-add-to-cart.js"></script>
<script src="<?php echo ROOT_FE; ?>js/extra-des.js"></script>
<script src="<?php echo ROOT_FE; ?>js/header.js"></script>

<!-- add border for data color = #FFF -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    var colorBoxes = document.querySelectorAll('.color-box');

    colorBoxes.forEach(function(box) {
        if (box.style.backgroundColor === 'rgb(255, 255, 255)') {
            box.style.border = '1px solid #000';
        }
    });
});
</script>

<!-- add to cart js -->
<script>

</script>

<style> 
.color-box {
    transition: transform 0.3s, opacity 0.3s, border 0.3s;
}

.color-select {
    border: 2px solid #55D5D2;
    transform: scale(1.3);
    opacity: 1;
}

.color-box:not(.color-select) {
    transform: scale(0.7);
    opacity: 0.5;
}
</style>

<!-- ok alert -->
<style>
.alert-success,
.delete-success,
.error-alert {
    position: fixed;
    left: 50%;
    top: -200px;
    transform: translate(-50%);
    display: flex;
    gap: 20px;
    align-items: center;
    background-color: #FFF;
    padding: 10px 30px;
    border-radius: 15px;
    overflow: hidden;
    width: 550px;
    -webkit-animation: shadow-drop-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    animation: shadow-drop-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    opacity: 0;
    visibility: hidden;
    transition: all ease-in-out 0.3s;
    z-index: 1001;
}

.alert-success.show,
.delete-success.show,
.error-alert.show {
    top: 20px;
    transform: translate(-50%);
    opacity: 1;
    visibility: visible;
}

.alert-success::after,
.delete-success::after,
.error-alert::after {
    content: "";
    left: 0;
    width: 10px;
    height: 100%;
    position: absolute;
    background-color: #55D5D2;
}

.error-alert::after {
    content: "";
    left: 0;
    width: 10px;
    height: 100%;
    position: absolute;
    background-color: red;
}

.alert-left {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 30px;
    width: 50px;
    height: 50px;
    color: #55D5D2;
}

.alert-right h3 {
    margin-bottom: 5px;
    font-weight: 600;
}

.alert-right p {
    font-weight: 500;
}

.error-alert .alert-left {
    color: red;
}
</style>

</html>