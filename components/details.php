<?php
include "../config/connectDB.php";

$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';

if (empty($product_id)) {
    echo 'Sản phẩm không hợp lệ.';
    exit();
}

// Truy vấn dữ liệu chi tiết sản phẩm và các thông tin liên quan
$sql = "
SELECT p.product_id, p.product_name, p.product_main_img, MIN(pd.product_price) AS min_price,
       GROUP_CONCAT(DISTINCT pd.product_price ORDER BY pd.product_price ASC) AS all_prices,
       GROUP_CONCAT(DISTINCT pd.product_img ORDER BY pd.product_price ASC) AS all_images,
       p.product_des, c.category_name, SUM(pd.product_quantity) AS total_quantity
FROM products p
JOIN product_details pd ON p.product_id = pd.product_id
JOIN categorys c ON p.category_id = c.category_id
WHERE p.product_id = ?
GROUP BY p.product_id, p.product_name, p.product_main_img, p.product_des, c.category_name
";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $product_id = htmlspecialchars($product['product_id']);
        $product_name = htmlspecialchars($product['product_name']);
        $product_main_img = htmlspecialchars($product['product_main_img']);
        $min_price = htmlspecialchars($product['min_price']);
        $all_prices = explode(',', $product['all_prices']);
        $all_images = explode(',', $product['all_images']);
        $product_des = htmlspecialchars($product['product_des']);
        $category_name = htmlspecialchars($product['category_name']);
        $total_quantity = htmlspecialchars($product['total_quantity']);

        echo '<title>' . htmlspecialchars($product['product_name']) . '</title>';
        
        // Truy vấn để lấy tất cả các màu sắc
        $color_sql = "
        SELECT DISTINCT c.color_name, c.color_code
        FROM product_details pd
        JOIN colors c ON pd.color_id = c.color_id
        WHERE pd.product_id = ?
        ";

        if ($color_stmt = $conn->prepare($color_sql)) {
            $color_stmt->bind_param("s", $product_id);
            $color_stmt->execute();
            $color_result = $color_stmt->get_result();
            $colors = [];

            while ($color = $color_result->fetch_assoc()) {
                $colors[] = $color;
            }

            $color_stmt->close();
        } else {
            echo 'Lỗi chuẩn bị câu lệnh SQL cho màu sắc.';
        }

        // Hiển thị thông tin sản phẩm
        echo '<section class="container-product-detail">';
        echo '    <div class="product-detail-left">';
        echo '        <div class="container-main-img">';
        echo '            <img src="../backend/productsAD/product-img/' . $product_main_img . '" alt="product-img">';
        echo '            <button class="add-favorite">';
        echo '                <i class="fa-regular fa-heart"></i>';
        echo '            </button>';
        echo '        </div>';

        echo '        <div class="container-second-img">';
        foreach ($all_images as $img) {
            echo '            <img src="../backend/productsAD/product-img/' . htmlspecialchars($img) . '" alt="">';
        }
        echo '        </div>';
        echo '    </div>';

        echo '    <div class="product-detail-right">';
        echo '        <div class="container-detail-sticky">';
        echo '            <p class="category-product-detail">' . $category_name . '</p>';
        echo '            <p class="product-name-detail">' . $product_name . '</p>';
        echo '            <p class="product-single-price-detail">' . $min_price . '</p>';

        echo '            <div class="product-color-detail">';
        foreach ($colors as $color) {
            echo '                <div class="color-box" style="background-color: ' . htmlspecialchars($color['color_code']) . '; border: 1px solid ' . htmlspecialchars($color['color_code']) . ';" data-color="' . htmlspecialchars($color['color_name']) . '"></div>';
        }
        echo '            </div>';

        echo '            <div class="product-des-detail">' . $product_des . '</div>';

        echo '            <div class="container-action-detail">';
        echo '                <div class="action-left-detail">';
        echo '                    <button type="button" class="decrease-detail-page-btn"><i class="fa-solid fa-minus"></i></button>';
        echo '                    <span class="quantity-product-detail">1</span>';
        echo '                    <button type="button" class="increase-detail-page-btn"><i class="fa-solid fa-plus"></i></button>';
        echo '                </div>';

        echo '                <div class="action-right-detail">';
        echo '                    <button type="submit" class="add-to-cart-detail">';
        echo '                        <span>Thêm Vào Giỏ</span>';
        echo '                        <i class="fa-solid fa-circle dot-add-to-cart-btn"></i>';
        echo '                        <span class="show-price-detail">' . $min_price . '</span>';
        echo '                    </button>';
        echo '                </div>';
        echo '            </div>';

        echo '            <div class="check-warehouse-detail">';
        echo '                <p>Còn <span class="remaining-stock">' . $total_quantity . '</span> sản phẩm</p>';
        echo '                <a class="see-similar-detail">Xem sản phẩm tương tự <i class="fa-solid fa-arrow-up"></i></a>';
        echo '            </div>';

        echo '            <div class="suplementary-details">';
        echo '                <div class="suplementary-detail-item">';
        echo '                    <div class="suplementary-detail-item-top">';
        echo '                        <p>Thông tin bổ sung</p>';
        echo '                        <button type="button"><i class="fa-solid fa-plus"></i></button>';
        echo '                    </div>';
        echo '                    <span></span>';
        echo '                </div>';

        echo '                <div class="suplementary-detail-item">';
        echo '                    <div class="suplementary-detail-item-top">';
        echo '                        <p>Vận chuyển</p>';
        echo '                        <button type="button"><i class="fa-solid fa-plus"></i></button>';
        echo '                    </div>';
        echo '                    <span>Thời gian giao hàng dao động từ 2-4 ngày đối với đơn gọng kính, 3-5 ngày đối với đơn cắt cận.</span>';
        echo '                </div>';

        echo '                <div class="suplementary-detail-item">';
        echo '                    <div class="suplementary-detail-item-top">';
        echo '                        <p>Đổi trả</p>';
        echo '                        <button type="button"><i class="fa-solid fa-plus"></i></button>';
        echo '                    </div>';
        echo '                    <span>1. Bảo hành 1 đổi 1 trong 180 ngày sau khi mua hàng nếu lớp váng dầu của tròng kính gặp vấn đề về kỹ thuật như xô váng, mất váng mà không phải do nhiệt hay tác động vật lý như trầy xước, nứt, vỡ. <br> <br> 2. Anna bảo hành cho cả lỗi người dùng nếu không may làm gẫy hoặc mất kính. Trợ giá 50% giá niêm yết khi khách hàng sử dụng lại sản phẩm cũ. Trong trường hợp sản phẩm cũ hết hàng có thể thay thế sang sản phẩm có giá trị bằng hoặc thấp hơn. Áp dụng 1 lần duy nhất trên tổng hóa đơn trong 60 ngày kể từ khi mua hàng</span>';
        echo '                </div>';
        echo '            </div>';
        echo '        </div>';
        echo '    </div>';
        echo '</section>';
    } else {
        echo 'Sản phẩm không tồn tại hoặc không tìm thấy thông tin.';
    }

    $stmt->close();
    $conn->close();
}
?>