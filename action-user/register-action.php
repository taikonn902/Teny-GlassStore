<?php
include "../database/connectDB.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['tell'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $tell = $_POST['tell'];
        $role_id = '3'; 

        // Mã hóa mật khẩu
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (user_id, email, tell, user_name, pass_word, role_id) VALUES (?, ?, ?, ?, ?, ?)");
        $user_id = "ANNAUS" . sprintf("%05d", mt_rand(1, 99999)); 

        $stmt->bind_param("sssssi", $user_id, $email, $tell, $username, $hashed_password, $role_id);

        if ($stmt->execute()) {
            echo "Thêm người dùng thành công!";
        } else {
            echo "Lỗi khi thêm người dùng: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Vui lòng nhập đầy đủ thông tin người dùng.";
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}

$conn->close();
?>
