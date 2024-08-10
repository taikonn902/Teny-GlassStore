<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="images/TG.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/custom-scroll.css">

    <link rel="stylesheet" href="css/outstanding.css">
    <link rel="stylesheet" href="css/animation.css">
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="css/pop-up.css">

    <title>TENY Shop</title>
</head>

<style>
    .main-top-page {
        width: 100%;
        overflow: hidden;
    }

    .main-top-page img {
        width: 100%;
        height: auto;
    }
</style>

<?php include "config/dir-config.php"; ?>

<body>
    <div class="popup" id="popup">
        <div class="popup-content">
            <img src="images/popup-web-01.png" alt="Popup Image">
            <button id="closePopup"><i class="fa-solid fa-circle-xmark"></i></button>
        </div>
    </div>

    <?php include "components/header.php"; ?>

    <section class="main-top-page">
        <img src="<?php echo ROOT_FE ?>images/T (1).jpg" alt="BANNER">
    </section>

    <section class="outstanding-product">
        <h2 class="outstanding-title">Sản Phẩm bán chạy</h2>
        <div class="product-list">
            <?php
            include 'components/outstanding.php';
            ?>
        </div>
    </section>
</body>

<script src="js/pop-up.js"></script>

</html>