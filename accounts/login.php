<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/custom-scroll.css">
    <link rel="stylesheet" href="../css/back-to-top.css">
    <link rel="stylesheet" href="../css/hide.css">

    <title>Đăng Nhập | TENY</title>
</head>

<style>
    .container-background {
        padding: 70px 0px 0px 0px;
        background: linear-gradient(to top right, #D7F8F8 0%, #FFFFFF 50%, #FFFFFF 70%, #FFC8B0 120%);
    }

    .container-login-form {
        display: flex;
        width: 90%;
        margin: 30px auto;
        height: 600px;
    }

    .login-form-left {
        flex-grow: 1;
        overflow: hidden;
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
        height: 100%;
        display: flex;
        align-items: center;
        width: 50%;
    }

    .login-form-left img {
       border-radius: 20px;
        width: 100%;
        height: 65%;
        object-fit: cover;
    }

    .login-form-right {
        flex-grow: 1;
        /* padding-left: 100px; */
        height: 100%;
        border-top-right-radius: 30px;
        border-bottom-right-radius: 30px;
        display: flex;
        align-items: center;
    }

    .login-form {
        width: 70%;
        margin: 0px auto;
    }

    .login-form h1 {
        text-align: center;
        font-size: 30px;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .login-form p {
        margin-bottom: 30px;
        text-align: center;
        font-size: 15px;
        line-height: 1.5;
    }

    .form-group {
        position: relative;
        margin-bottom: 30px;
    }

    .form-group-last {
        margin-bottom: 15px !important;
    }

    .form-group input {
        width: 100%;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 10px;
        height: 50px;
        outline: none;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    .form-group input:focus {
        border-color: #55D5D2;
    }

    .form-group label {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        background: #fff;
        padding: 0 5px;
        color: #aaa;
        font-size: 16px;
        pointer-events: none;
        transition: all 0.3s;
    }

    .form-group input:focus+label,
    .form-group input:not(:placeholder-shown)+label {
        top: 0px;
        font-size: 12px;
        color: #221F20;
        font-weight: 600;
    }

    .form-group input:focus+label {
        color: #221F20;
        font-weight: 600;
    }

    .form-group input:not(:placeholder-shown)+label {
        color: #333;
    }

    .show-hide-password {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
    }

    .show-hide-password i {
        font-size: 16px;
        color: #aaa;
    }

    .remember-forgot {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
        font-size: 18px;
    }

    .container-remember {
        display: flex;
        align-items: center;
        font-size: 16px;
        color: #333;
        margin-bottom: 15px;
        cursor: pointer;
    }

    .container-remember input[type="checkbox"] {
        appearance: none;
        width: 20px;
        height: 20px;
        border: 2px solid #333;
        border-radius: 3px;
        margin-right: 10px;
    }

    .container-remember input[type="checkbox"]:checked {
        background-color: #333;
    }

    .container-remember label {
        cursor: pointer;
    }

    .forgot-password {
        color: #81C8C2;
        text-decoration: underline;
        font-weight: 600;
        transition: all ease-in-out 0.3s;
    }

    .forgot-password:hover {
        color: #F58F5D;
    }

    .login-button {
        padding: 15px;
        width: 100%;
        font-weight: 600;
        font-size: 18px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        background-color: #55D5D2;
        color: #fff;
        transition: all ease-in-out 0.3s;
    }

    .login-button i {
        margin-left: 10px;
        display: inline-block;
        transform: rotate(310deg);
        transition: transform 0.3s ease;
    }

    .login-button:hover {
        background-color: #F58F5D;
    }

    .login-button:hover i {
        transform: rotate(360deg);
    }


    .register-link {
        margin-top: 40px;
        transition: all ease-in-out 0.3s;
        font-weight: 600;
        font-size: 13px;
    }

    .register-link span {
        color: #81C8C2;
        font-weight: 600;
        text-decoration: underline;
        cursor: pointer;
    }

    .register-link span:hover {
        color: #F58F5D;
    }
</style>

<?php include "../config/dir-config.php";?>

<body>
    <?php include "../components/header.php"; ?>
    <div class="container-background">
        <div class="container-login-form">
            <div class="login-form-left">
                <img src="<?php echo ROOT_FE?>images/login-img.jpg" alt="img-login">
            </div>

            <div class="login-form-right">
                <form id="loginForm" method="POST" class="login-form">
                    <h1>Đăng Nhập</h1>
                    <p>Hãy đăng nhập TENY để được hưởng đặc quyền và ưu đãi riêng dành cho bạn !!!</p>

                    <div class="form-group">
                        <input type="text" id="username" name="user_name" required placeholder=" ">
                        <label for="name">Tài Khoản</label>
                    </div>
                    <div class="form-group form-group-last">
                        <input type="password" id="password" name="pass_word" required placeholder=" ">
                        <label for="address">Mật Khẩu</label>
                        <button class="show-hide-password" type="button" onclick="togglePassword()">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>

                    <div class="remember-forgot">
                        <div class="container-remmember">
                            <input type="checkbox" id="remember-me">
                            <label for="remember-me">Ghi nhớ đăng nhập</label>
                        </div>
                        <a href="#" class="forgot-password">Bạn quên mật khẩu?</a>
                    </div>

                    <button type="submit" class="login-button">Đăng Nhập <i
                            class="fa-solid fa-arrow-right"></i></button>
                    <div id="message"></div>
                    <div class="register-link">
                        <p>Bạn chưa có tài khoản TENY? <a href="register.php"><span>Đăng ký ngay</span></a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="../js/login.js"></script>

<script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault(); 
        
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        
        var xhr = new XMLHttpRequest();
        var url = '<?php echo ROOT_FE?>action-user/login-action.php';
        var params = 'user_name=' + encodeURIComponent(username) + '&pass_word=' + encodeURIComponent(password);

        xhr.open('POST', url, true);

        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    var response = xhr.responseText.trim();
                    console.log('Response from server:', response); 

                    if (response.startsWith('http://')) {
                        window.location.replace(response);
                    } else {
                        document.getElementById('message').innerHTML = response; 
                    }
                } else {
                    console.error('Đã xảy ra lỗi: ' + xhr.status);
                    alert('Đã xảy ra lỗi khi gửi yêu cầu đăng nhập. Vui lòng thử lại sau.');
                }
            }
        };

        xhr.send(params);
    });
</script>

<script src="../js/scroll-to-top.js"></script>

</html>