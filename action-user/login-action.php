<?php

session_start();
include('../config/connectDB.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'];
    $pass_word = $_POST['pass_word'];

    $user_name = mysqli_real_escape_string($conn, $user_name);

    $query = "SELECT * FROM users WHERE user_name = '$user_name'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($pass_word, $user['pass_word'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['role_id'] = $user['role_id'];

            $base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/teny-shop';
            if ($user['role_id'] == 1 || $user['role_id'] == 2) {
                $redirect_url = $base_url . '/backend/index.php';
            } elseif ($user['role_id'] == 3) {
                $redirect_url = $base_url . '/index.php';
            }

            echo $redirect_url;
        } else {
            echo 'Tài khoản hoặc mật khẩu không đúng!';
        }
    } else {
        echo 'Tài khoản hoặc mật khẩu không đúng!';
    }

    $conn->close();
} else {
    echo 'Yêu cầu không hợp lệ.';
}
?>
