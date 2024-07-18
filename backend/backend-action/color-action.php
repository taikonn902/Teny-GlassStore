<?php
include "backend-database/connectDB.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $color_name = $_POST['colorName'];
    $color_code = $_POST['colorCode'];
    $color_data = $_POST['colorData'];

    $sql = "INSERT INTO colors (color_name, color_code, color_data) VALUES ('$color_name', '$color_code', '$color_data')";

    if ($conn->query($sql) === TRUE) {
        echo "Thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
