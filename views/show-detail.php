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

    <title>Product Detail</title>
</head>

<style>
    #main-product-detail {
        padding: 120px 0 80px 0;
        background: linear-gradient(to top right, #D7F8F8 0%, #FFFFFF 50%, #FFFFFF 70%, #FFC8B0 120%);
    }
</style>

<body>
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
    document.addEventListener('DOMContentLoaded', function () {
        var colorBoxes = document.querySelectorAll('.color-box');

        colorBoxes.forEach(function (box) {
            if (box.style.backgroundColor === 'rgb(255, 255, 255)') {
                box.style.border = '1px solid #000';
            }
        });
    });
</script>

</html>