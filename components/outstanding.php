<?php
include "config/connectDB.php";

// Truy vấn dữ liệu sản phẩm và giá nhỏ nhất
$sql = "
    SELECT p.product_id, p.product_name, p.product_main_img, MIN(pd.product_price) AS min_price
    FROM products p
    JOIN product_details pd ON p.product_id = pd.product_id
    GROUP BY p.product_id, p.product_name, p.product_main_img
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($product = $result->fetch_assoc()) {
        $product_id = htmlspecialchars($product['product_id']);
        $product_name = htmlspecialchars($product['product_name']);
        $product_main_img = htmlspecialchars($product['product_main_img']);
        $min_price = htmlspecialchars($product['min_price']);

        // Hiển thị thông tin sản phẩm
        echo '<a href="views/show-detail.php?product_id=' . $product_id . '" class="product-item">';
        echo '    <div class="container-img">';
        echo '        <img class="product-img" src="backend/productsAD/product-img/' . $product_main_img . '" alt="img">';
        echo '    </div>';

        echo '    <div class="product-info">';
        echo '        <p class="product-name">' . $product_name . '</p>';
        echo '        <div class="product-price">';
        echo '            <span>' . $min_price . '</span>';
        echo '            <i class="fa-solid fa-arrow-right"></i>';
        echo '        </div>';
        echo '    </div>';
        echo '</a>';
    }
} else {
    echo 'No products found.';
}

$conn->close();
?>
