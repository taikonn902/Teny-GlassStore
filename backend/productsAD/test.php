<?php
include "../backend-config/connectDB.php";

// Kiểm tra kết nối cơ sở dữ liệu
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn để lấy tất cả sản phẩm từ bảng `products` và tên tương ứng từ bảng `brands` và `categories`
$sql = "SELECT p.product_id, p.product_name, p.product_des, p.product_main_img, p.create_time 
        FROM products p";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Hiển thị thông tin của từng sản phẩm
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<h2>" . htmlspecialchars($row["product_name"]) . "</h2>";
        echo "<p>ID: " . htmlspecialchars($row["product_id"]) . "</p>";
        echo "<p>Description:</p>";
        echo "<div class='product-description'>" . htmlspecialchars($row["product_des"]) . "</div>";
        if (!empty($row["product_main_img"])) {
            echo "<img src='./product-img/" . htmlspecialchars($row["product_main_img"]) . "' alt='Image' style='max-width: 200px; height: auto;'>";
        }
        echo "<p>Create Time: " . htmlspecialchars($row["create_time"]) . "</p>";

        // Truy vấn để lấy thông tin chi tiết từ bảng `product_details` và tên tương ứng từ các bảng liên quan
        $product_id = $row["product_id"];
        $sql_details = "SELECT pd.color_id, pd.product_price, pd.product_quantity, pd.product_img, 
                               c.color_name, c.color_code 
                        FROM product_details pd 
                        JOIN colors c ON pd.color_id = c.color_id 
                        WHERE pd.product_id = '$product_id'";
        $result_details = $conn->query($sql_details);

        if ($result_details->num_rows > 0) {
            echo "<h3>Chi tiết sản phẩm:</h3>";
            while ($detail = $result_details->fetch_assoc()) {
                echo "<div class='product-detail'>";
                echo "<p>Màu sắc: " . htmlspecialchars($detail["color_name"]) . " (ID: " . htmlspecialchars($detail["color_id"]) . ")";
                echo "<div class='color-demo' style='background-color: " . htmlspecialchars($detail["color_code"]) . "; width: 20px; height: 20px; display: inline-block;'></div>";
                echo "</p>";
                echo "<p>Giá: " . htmlspecialchars($detail["product_price"]) . " VND</p>";
                echo "<p>Số lượng: " . htmlspecialchars($detail["product_quantity"]) . "</p>";
                if (!empty($detail["product_img"])) {
                    echo "<img src='./product-img/" . htmlspecialchars($detail["product_img"]) . "' alt='Product Image' style='max-width: 100px; height: auto;'>";
                }
                echo "</div>";
            }
        } else {
            echo "<p>Không có chi tiết sản phẩm nào.</p>";
        }

        echo "</div>";
    }
} else {
    echo "Không có sản phẩm nào.";
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
