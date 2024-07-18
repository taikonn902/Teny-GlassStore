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

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/custom-scroll.css">

    <link rel="stylesheet" href="css/outstanding.css">
    <link rel="stylesheet" href="css/animation.css">
    <link rel="stylesheet" href="css/gallery.css">

    <title>Anna</title>
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

<body>
    <?php include "components/header.php"; ?>

    <section class="main-top-page">
        <img src="images/web-07.png" alt="">
    </section>
</body>

<script src="js/pop-up.js"></script>
</html>