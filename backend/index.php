<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/backend-global.css">
    <link rel="stylesheet" href="css/custom-scroll.css">

    <title>Admin Management</title>
</head>

<style>
    .top-content-container {
        display: flex;
        justify-content: space-between;
        position: sticky;
        background: url("images/BacksAndBeyond_Images_Learning_2-2000x700-1-1400x490.jpg");
        object-fit: cover;
        background-position-y: 100px;
    }

    .hello-user {
        display: flex;
        gap: 20px;
        align-items: center;
        padding-right: 15px;
        color: #FFF;
    }

    .hello-user-left p {
        text-align: right;
    }

    .hello-user-right {
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px dashed #FFF;
        border-radius: 50%;
        width: 50px;
        height: 50px;
    }
</style>

<body>
<?php include_once 'backend-components/sidebar.php'; ?>

    <section class="home">
        <div class="top-content-container">
            <div class="toggle-sidebar">
                <i class="fa-solid fa-circle-chevron-right"></i>
            </div>

            <div class="hello-user">
                <div class="hello-user-left">
                    <p>Hi</p>
                    <h3>Admin</h3>
                </div>
                <div class="hello-user-right">A</div>
            </div>
        </div>

        <div class="content-container">
            <!-- show here -->
        </div>
    </section>
</body>

</html>