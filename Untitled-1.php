<?php
include "../backend-config/connectDB.php";

date_default_timezone_set('Asia/Ho_Chi_Minh');

// Hàm tạo ID sản phẩm duy nhất
function generateUniqueId($conn) {
    do {
        $product_id = 'TENY-PD-' . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $sql = "SELECT COUNT(*) FROM products WHERE product_id = '$product_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_array();
    } while ($row[0] > 0);
    
    return $product_id;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $conn->real_escape_string($_POST['product_name']);
    $brand_id = intval($_POST['brand_name']);
    $category_id = intval($_POST['category_name']);
    $product_des = $conn->real_escape_string($_POST['product_des']);
    $create_time = date('Y-m-d H:i:s');

    // Tạo ID sản phẩm duy nhất
    $product_id = generateUniqueId($conn);

    // Xử lý hình ảnh chính
    $target_dir = "./product-img/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $main_image = '';
    if (isset($_FILES["main_product_img"]) && $_FILES["main_product_img"]["error"] == 0) {
        $target_file = $target_dir . basename($_FILES["main_product_img"]["name"]);
        if (move_uploaded_file($_FILES["main_product_img"]["tmp_name"], $target_file)) {
            $main_image = basename($_FILES["main_product_img"]["name"]);
        } else {
            die("Lỗi khi di chuyển tập tin tải lên hình ảnh chính.");
        }
    }

    $sql = "INSERT INTO products (product_id, product_name, brand_id, category_id, product_des, product_main_img, create_time)
            VALUES ('$product_id', '$product_name', $brand_id, $category_id, '$product_des', '$main_image', '$create_time')";

if ($conn->query($sql) === TRUE) {
    // Thêm chi tiết sản phẩm vào bảng product_details
    if (isset($_POST['materials']) && isset($_POST['shapes']) && isset($_POST['colors'])) {
        foreach ($_POST['materials'] as $material_id) {
            $material_id = intval($material_id);

            foreach ($_POST['shapes'] as $shape_id) {
                $shape_id = intval($shape_id);

                foreach ($_POST['colors'] as $color_id) {
                    $color_id = intval($color_id);

                    // Lấy giá trị nguyên từ ô input
                    $product_quantity = isset($_POST['quantity_' . $color_id]) ? $_POST['quantity_' . $color_id] : '0';
                    $product_price = isset($_POST['product_price_' . $material_id]) ? $_POST['product_price_' . $material_id] : '0';

                    // Hiển thị giá trị để kiểm tra
                    echo "Product Price: " . htmlspecialchars($product_price) . "<br>";
                    echo "Product Quantity: " . htmlspecialchars($product_quantity) . "<br>";

                    $color_image = '';
                    $color_image_field = 'color_image_' . $color_id;
                    if (isset($_FILES[$color_image_field]) && $_FILES[$color_image_field]['error'] == 0) {
                        $target_file_color = $target_dir . basename($_FILES[$color_image_field]['name']);
                        if (move_uploaded_file($_FILES[$color_image_field]['tmp_name'], $target_file_color)) {
                            $color_image = basename($_FILES[$color_image_field]['name']);
                        } else {
                            die("Lỗi khi di chuyển tập tin tải lên hình ảnh màu.");
                        }
                    }

                    // Thực hiện chèn dữ liệu vào cơ sở dữ liệu nếu mọi thứ đều ổn
                    $sql_detail = "INSERT INTO product_details (product_id, material_id, shape_id, color_id, product_price, product_quantity, product_img)
                                   VALUES ('$product_id', $material_id, $shape_id, $color_id, '$product_price', '$product_quantity', '$color_image')";

                    if (!$conn->query($sql_detail)) {
                        echo "Lỗi: " . $sql_detail . "<br>" . $conn->error;
                    }
                }
            }
        }
    }

    echo "Sản phẩm đã được thêm thành công!";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}


    $conn->close();
} else {
    echo "Form chưa được gửi.";
}
?>