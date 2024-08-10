<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />


    <link rel="stylesheet" href="../css/backend-global.css">

    <link rel="stylesheet" href="../css/test.css">

    <title>Products Management</title>
</head>

<style>
    .top-content-container {
        display: flex;
        justify-content: space-between;
        position: sticky;
        background: url("../images/BacksAndBeyond_Images_Learning_2-2000x700-1-1400x490.jpg");
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

<?php
// include "../backend-components/sidebar.php";
include "../backend-config/connectDB.php";

$sql_categories = "SELECT * FROM categorys ORDER BY category_id DESC";
$result_categories = $conn->query($sql_categories);

// Truy vấn bảng `brands`
$sql_brands = "SELECT * FROM brands ORDER BY brand_id DESC";
$result_brands = $conn->query($sql_brands);

// Truy vấn bảng `materials`
$sql_materials = "SELECT * FROM materials ORDER BY material_id DESC";
$result_materials = $conn->query($sql_materials);

// Truy vấn bảng `shapes`
$sql_shapes = "SELECT * FROM shapes ORDER BY shape_id DESC";
$result_shapes = $conn->query($sql_shapes);

// Truy vấn bảng `color`
$sql_colors = "SELECT * FROM colors ORDER BY color_id DESC";
$result_colors = $conn->query($sql_colors);
?>

<!-- ss-3 css -->
<style>
    .ss-3 {
        width: 90%;
        margin: 20px auto;
    }

    .ss-3 h3 {
        margin-bottom: 10px;
        font-size: 18px;
        color: #333;
    }

    .checkbox-group {
        margin-left: 20px;
        margin-bottom: 20px;
        cursor: pointer;
        align-items: center;
    }

    .checkbox-group input[type="checkbox"] {
        margin-right: 5px;
        cursor: pointer;
    }

    .checkbox-group label {
        cursor: pointer;
        align-items: center;
    }

    .material-item {
        padding: 10px 0 0 0;
    }

    .price-group {
        width: 90%;
        margin: 10px auto;
        display: block;
        transition: max-height 0.3s ease-out;
        max-height: 0;
        overflow: hidden;
    }

    .price-group.show {
        overflow: unset;
        max-height: 50px;
        margin-top: 20px;
    }
</style>

<!-- ss-4 css -->
<style>
    .ss-4 {
        width: 90%;
        margin: 0px auto;
    }

    .checkbox-group {
        p
    }
</style>

<!-- ss-5 css -->
<style>
    /* .color-item {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        
    } */

    .color-demo {
        width: 40px;
        height: 40px;
        border-radius: 5px;
        margin-right: 10px;
        border: 1px solid #ccc;
    }

    .color-item label {
        font-size: 16px;
        color: #555;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .color-item input[type="checkbox"] {
        margin-right: 10px;
        cursor: pointer;
    }

    .checkbox-group p {
        font-size: 16px;
        color: #888;
        width: 100%;
    }
</style>

<!-- ss-6 css -->
<style>
    .ss-6 {
        width: 90%;
        margin: 10px auto;
    }
</style>

<!-- ss-7 css -->
<style>
    .ss-7 {
        margin: 20px 0;
    }

    .ss-7 label {
        display: block;
        margin-bottom: 8px;
        font-size: 18px;
        color: #333;
        font-weight: bold;
    }

    .ss-7 textarea {
        width: 100%;
        height: 150px;
        padding: 10px;
        font-size: 16px;
        color: #555;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        resize: vertical;
        outline: none;
    }

    .ss-7 textarea:focus {
        border-color: #55D5D2;
        box-shadow: 0 0 5px rgba(102, 175, 233, 0.6);
    }
</style>

<!-- ss-8 css -->
<style>

</style>

<section class="home">
    <?php include "../backend-components/hello-user.php"; ?>

    <div class="content-container">
        <div class="top-content">
            <button type="button">Thêm mới sản phẩm</button>

            <form class="search-product-form">
                <input type="text" placeholder="Nhập tên sản phẩm...">
                <button type="submit">Tìm kiếm</button>
            </form>
        </div>

        <form class="add-new-product-form" method="POST" enctype="multipart/form-data">
            <h2>Thêm Sản Phẩm Mới</h2>

            <div class="scroll-add-product-form">
                <div class="ss-1">
                    <div class="product-name-group">
                        <input type="text" id="product-name" name="product_name" required placeholder=" ">
                        <label for="product-name">Tên sản phẩm</label>
                    </div>
                </div>

                <div class="ss-2">
                    <select name="brand_name" id="brand_name" class="brand-name">
                        <option value="">Chọn thương hiệu</option>
                        <?php
                        if ($result_brands->num_rows > 0) {
                            while ($row = $result_brands->fetch_assoc()) {
                                echo '<option value="' . htmlspecialchars($row['brand_id']) . '">' . htmlspecialchars($row['brand_name']) . '</option>';
                            }
                        } else {
                            echo '<option value="">Không có thương hiệu nào</option>';
                        }
                        ?>
                    </select>

                    <select name="category_name" id="category_name" class="category-name">
                        <option value="">Chọn loại sản phẩm</option>
                        <?php
                        if ($result_categories->num_rows > 0) {
                            while ($row = $result_categories->fetch_assoc()) {
                                echo '<option value="' . htmlspecialchars($row['category_id']) . '">' . htmlspecialchars($row['category_name']) . '</option>';
                            }
                        } else {
                            echo '<option value="">Không có loại sản phẩm nào</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="ss-3">
                    <h3>Chất liệu</h3>
                    <div class="checkbox-group">
                        <?php
                        if ($result_materials->num_rows > 0) {
                            while ($row = $result_materials->fetch_assoc()) {
                                echo '<div class="material-item">';
                                echo '<label><input type="checkbox" name="materials[]" value="' . htmlspecialchars($row['material_id']) . '"> ' . htmlspecialchars($row['material_name']) . '</label>';
                                echo '<div class="price-group">';
                                echo '<input type="text" id="product-price-' . htmlspecialchars($row['material_id']) . '" name="product_price_' . htmlspecialchars($row['material_id']) . '" placeholder=" ">';
                                echo '<label for="product-price-' . htmlspecialchars($row['material_id']) . '">Giá sản phẩm</label>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<p>Không có chất liệu nào</p>';
                        }
                        ?>
                    </div>
                </div>

                <div class="shape-color-selection">
                    <h3>Hình dáng - Màu sắc - Số lượng - Hình ảnh</h3>
                    <div id="shape-color-group">
                        <?php
                        if ($result_shapes->num_rows > 0) {
                            $colors = [];
                            if ($result_colors->num_rows > 0) {
                                while ($color = $result_colors->fetch_assoc()) {
                                    $colors[] = $color;
                                }
                            }

                            while ($shape = $result_shapes->fetch_assoc()) {
                                echo '<div class="shape-item">';
                                echo '<label><input type="checkbox" name="shapes[]" value="' . htmlspecialchars($shape['shape_id']) . '" class="shape-checkbox"> ' . htmlspecialchars($shape['shape_name']) . '</label>';
                                echo '<div class="color-group" style="display: none;">';

                                foreach ($colors as $color) {
                                    echo '<div class="color-item">';
                                    echo '<label>';
                                    echo '<div class="color-demo" style="background-color:' . htmlspecialchars($color['color_code']) . ';"></div>';
                                    echo '<input type="checkbox" name="shape_colors[' . htmlspecialchars($shape['shape_id']) . '][' . htmlspecialchars($color['color_id']) . ']" value="' . htmlspecialchars($color['color_id']) . '" class="color-checkbox"> ' . htmlspecialchars($color['color_name']);
                                    echo '<input type="number" name="quantity[' . htmlspecialchars($shape['shape_id']) . '][' . htmlspecialchars($color['color_id']) . ']" min="1" class="quantity-input" style="display: none;">';
                                    echo '<input type="file" name="color_image[' . htmlspecialchars($shape['shape_id']) . '][' . htmlspecialchars($color['color_id']) . ']" class="image-input" style="display: none;">';
                                    echo '</label>';
                                    echo '</div>';
                                }

                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<p>Không có hình dáng nào</p>';
                        }
                        ?>
                    </div>
                </div>

                <div class="ss-7">
                    <label>Mô tả sản phẩm</label>
                    <textarea name="product_des" id="product-des" class="product-des"></textarea>
                </div>

                <div class="ss-9">
                    <h3>Hình ảnh</h3>
                    <div class="image-upload-container">
                        <input type="file" id="main-image" accept="image/*" name="main_product_img" />
                        <div class="image-preview">
                            <img id="preview-image" src="" alt="Preview Image" style="display: none;" />
                        </div>
                    </div>
                </div>

                <div class="ss-10">
                    <button type="submit" class="add-new-product">
                        <span>Thêm sản phẩm</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </form>


        <div class="container-show-products">

        </div>
    </div>
</section>

</body>
<!-- ss-9 css -->
<style>
    .ss-9 {
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 20px auto;
    }

    .ss-9 h3 {
        margin-bottom: 10px;
    }

    .image-upload-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #main-image {
        margin-bottom: 10px;
    }

    .image-preview {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        max-width: 300px;
        height: 200px;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background-color: #fff;
    }

    #preview-image {
        max-width: 100%;
        max-height: 100%;
    }
</style>

</html>
<style>
    .scroll-add-product-form {
        overflow-y: auto;
        height: calc(90vh - 5%);
    }

    .scroll-add-product-form::-webkit-scrollbar {
        width: 0px;
    }
</style>

<style>
    .content-container {
        position: relative;
    }

    .add-new-product-form {
        background-color: #FFF;
        position: fixed;
        z-index: 110;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin: 0px auto;
        width: 50%;
        height: 95%;
        padding: 20px;
    }

    .add-new-product-form h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .ss-1,
    .ss-2 {
        width: 90%;
        margin: 20px auto;
    }

    .ss-2 {
        display: flex;
        justify-content: space-between;
    }

    .category-name,
    .brand-name {
        height: 100%;
        width: 250px;
        padding: 10px;
        border: 2px solid #ccc;
        background-color: #f9f9f9;
        color: #333;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .category-name:focus {
        border-color: #007BFF;
    }
</style>

<!-- input css -->
<style>
    .product-name-group,
    .price-group {
        position: relative;
    }

    .product-name-group input,
    .price-group input {
        width: 100%;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 10px;
        height: 50px;
        outline: none;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    .product-name-group input:focus,
    .price-group input:focus {
        border-color: #55D5D2;
    }

    .product-name-group label,
    .price-group label {
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

    .product-name-group input:focus+label,
    .product-name-group input:not(:placeholder-shown)+label,
    .price-group input:focus+label,
    .price-group input:not(:placeholder-shown)+label {
        top: 0px;
        font-size: 12px;
        color: #221F20;
        font-weight: 600;
    }

    .product-name-group input:focus+label,
    .price-group input:focus+label {
        color: #221F20;
        font-weight: 600;
    }

    .product-name-group input:not(:placeholder-shown)+label,
    .price-group input:not(:placeholder-shown)+label {
        color: #333;
    }
</style>

<!-- ss-3 js -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.material-item input[type="checkbox"]');

        function handleClickOutside(event) {
            checkboxes.forEach(checkbox => {
                const priceGroup = checkbox.closest('.material-item').querySelector('.price-group');
                const priceInput = priceGroup.querySelector('input[type="text"]');

                if (!priceGroup.contains(event.target) && !checkbox.contains(event.target) && !priceInput.contains(event.target)) {
                    // Chỉ bỏ chọn checkbox và ẩn priceGroup nếu input không có giá trị
                    if (priceInput.value === '') {
                        checkbox.checked = false;
                        priceGroup.classList.remove('show');
                    }
                }
            });
        }

        document.addEventListener('click', handleClickOutside);

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const priceGroup = this.closest('.material-item').querySelector('.price-group');
                const priceInput = priceGroup.querySelector('input[type="text"]');

                if (this.checked) {
                    priceGroup.classList.add('show');
                } else {
                    priceInput.value = '';
                    priceGroup.classList.remove('show');
                }
            });

            const priceInput = checkbox.closest('.material-item').querySelector('.price-group input[type="text"]');
            priceInput.addEventListener('blur', function () {
                const priceGroup = this.closest('.material-item').querySelector('.price-group');
                const checkbox = this.closest('.material-item').querySelector('input[type="checkbox"]');

                if (this.value === '') {
                    priceGroup.classList.remove('show');
                    checkbox.checked = false; // Bỏ chọn checkbox nếu input trống
                } else {
                    priceGroup.classList.add('show'); // Hiển thị price-group nếu có giá trị
                }
            });

            priceInput.addEventListener('focus', function () {
                const priceGroup = this.closest('.material-item').querySelector('.price-group');
                priceGroup.classList.add('show');
            });
        });
    });

</script>

<script src="../js/test.js"></script>

<!-- <script src="https://cdn.tiny.cloud/1/qx6o7oemh6rf889onwu3ov68xxxd686l7b2052mqsuld64yy/tinymce/7/tinymce.min.js"
    referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    });
</script> -->

<?php
// include "../backend-config/connectDB.php";

// date_default_timezone_set('Asia/Ho_Chi_Minh');

// // Hàm tạo ID sản phẩm duy nhất
// function generateUniqueId($conn) {
//     do {
//         $product_id = 'TENY-PD-' . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
//         $sql = "SELECT COUNT(*) FROM products WHERE product_id = '$product_id'";
//         $result = $conn->query($sql);
//         $row = $result->fetch_array();
//     } while ($row[0] > 0);

//     return $product_id;
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $product_name = $conn->real_escape_string($_POST['product_name']);
//     $brand_id = intval($_POST['brand_name']);
//     $category_id = intval($_POST['category_name']);
//     $product_des = $conn->real_escape_string($_POST['product_des']);
//     $create_time = date('Y-m-d H:i:s');

//     // Tạo ID sản phẩm duy nhất
//     $product_id = generateUniqueId($conn);

//     // Xử lý hình ảnh chính
//     $target_dir = "./product-img/";
//     if (!file_exists($target_dir)) {
//         mkdir($target_dir, 0777, true);
//     }

//     $main_image = '';
//     if (isset($_FILES["main_product_img"]) && $_FILES["main_product_img"]["error"] == 0) {
//         $target_file = $target_dir . basename($_FILES["main_product_img"]["name"]);
//         if (move_uploaded_file($_FILES["main_product_img"]["tmp_name"], $target_file)) {
//             $main_image = basename($_FILES["main_product_img"]["name"]);
//         } else {
//             die("Lỗi khi di chuyển tập tin tải lên hình ảnh chính.");
//         }
//     }

//     $sql = "INSERT INTO products (product_id, product_name, brand_id, category_id, product_des, product_main_img, create_time)
//             VALUES ('$product_id', '$product_name', $brand_id, $category_id, '$product_des', '$main_image', '$create_time')";

// if ($conn->query($sql) === TRUE) {
//     // Thêm chi tiết sản phẩm vào bảng product_details
//     if (isset($_POST['materials']) && isset($_POST['shapes']) && isset($_POST['colors'])) {
//         foreach ($_POST['materials'] as $material_id) {
//             $material_id = intval($material_id);

//             foreach ($_POST['shapes'] as $shape_id) {
//                 $shape_id = intval($shape_id);

//                 foreach ($_POST['colors'] as $color_id) {
//                     $color_id = intval($color_id);

//                     // Lấy giá trị nguyên từ ô input
//                     $product_quantity = isset($_POST['quantity_' . $color_id]) ? $_POST['quantity_' . $color_id] : '0';
//                     $product_price = isset($_POST['product_price_' . $material_id]) ? $_POST['product_price_' . $material_id] : '0';

//                     // Hiển thị giá trị để kiểm tra
//                     echo "Product Price: " . htmlspecialchars($product_price) . "<br>";
//                     echo "Product Quantity: " . htmlspecialchars($product_quantity) . "<br>";

//                     $color_image = '';
//                     $color_image_field = 'color_image_' . $color_id;
//                     if (isset($_FILES[$color_image_field]) && $_FILES[$color_image_field]['error'] == 0) {
//                         $target_file_color = $target_dir . basename($_FILES[$color_image_field]['name']);
//                         if (move_uploaded_file($_FILES[$color_image_field]['tmp_name'], $target_file_color)) {
//                             $color_image = basename($_FILES[$color_image_field]['name']);
//                         } else {
//                             die("Lỗi khi di chuyển tập tin tải lên hình ảnh màu.");
//                         }
//                     }

//                     // Thực hiện chèn dữ liệu vào cơ sở dữ liệu nếu mọi thứ đều ổn
//                     $sql_detail = "INSERT INTO product_details (product_id, material_id, shape_id, color_id, product_price, product_quantity, product_img)
//                                    VALUES ('$product_id', $material_id, $shape_id, $color_id, '$product_price', '$product_quantity', '$color_image')";

//                     if (!$conn->query($sql_detail)) {
//                         echo "Lỗi: " . $sql_detail . "<br>" . $conn->error;
//                     }
//                 }
//             }
//         }
//     }

//     echo "Sản phẩm đã được thêm thành công!";
// } else {
//     echo "Lỗi: " . $sql . "<br>" . $conn->error;
// }


//     $conn->close();
// } else {
//     echo "Form chưa được gửi.";
// }
?>

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
        if (isset($_POST['materials']) && isset($_POST['shapes'])) {
            foreach ($_POST['materials'] as $material_id) {
                $material_id = intval($material_id);
                $product_price = $_POST["product_price_" . $material_id] ?? '0';

                foreach ($_POST['shapes'] as $shape_id) {
                    $shape_id = intval($shape_id);

                    foreach ($_POST['shape_colors'][$shape_id] ?? [] as $color_id) {
                        $color_id = intval($color_id);
                        $product_quantity = $_POST["quantity"][$shape_id][$color_id] ?? '0';

                        // Xử lý hình ảnh phụ
                        $color_image = '';
                        $color_image_field = 'color_image_' . $shape_id . '_' . $color_id;
                        if (isset($_FILES['color_image']['name'][$shape_id][$color_id])) {
                            $color_image_name = $_FILES['color_image']['name'][$shape_id][$color_id];
                            $color_image_tmp_name = $_FILES['color_image']['tmp_name'][$shape_id][$color_id];
                            $color_image_target_file = $target_dir . basename($color_image_name);

                            if (move_uploaded_file($color_image_tmp_name, $color_image_target_file)) {
                                $color_image = basename($color_image_name);
                            } else {
                                die("Lỗi khi di chuyển tập tin tải lên hình ảnh màu.");
                            }
                        }

                        // Thực hiện chèn dữ liệu vào cơ sở dữ liệu
                        $sql_detail = "INSERT INTO product_details (product_id, material_id, shape_id, color_id, product_price, product_quantity, product_img)
                                       VALUES ('$product_id', $material_id, $shape_id, $color_id, '$product_price', '$product_quantity', '$color_image')";

                        if (!$conn->query($sql_detail)) {
                            echo "Lỗi: " . $sql_detail . "<br>" . $conn->error;
                        }
                    }
                }
            }
        }

        echo "<h2>Kết quả submit:</h2>";
        echo "<p><strong>Tên sản phẩm:</strong> $product_name</p>";
        echo "<p><strong>Thương hiệu:</strong> $brand_id</p>";
        echo "<p><strong>Loại sản phẩm:</strong> $category_id</p>";
        echo "<p><strong>Mô tả sản phẩm:</strong> $product_des</p>";

        echo "<h3>Chất liệu và giá:</h3>";
        echo "<ul>";
        foreach ($_POST['materials'] as $material_id) {
            $product_price = $_POST["product_price_" . $material_id] ?? '0';
            echo "<li>Material ID: $material_id - Giá: $product_price</li>";
        }
        echo "</ul>";

        echo "<h3>Hình dáng - Màu sắc - Số lượng - Hình ảnh:</h3>";
        foreach ($_POST['shapes'] as $shape_id) {
            echo "<h4>Shape ID: $shape_id</h4>";
            echo "<ul>";
            foreach ($_POST['shape_colors'][$shape_id] ?? [] as $color_id) {
                $product_quantity = $_POST["quantity"][$shape_id][$color_id] ?? '0';
                $color_image = $_FILES['color_image']['name'][$shape_id][$color_id] ?? '';

                echo "<li>Color ID: $color_id - Số lượng: $product_quantity - Hình ảnh: $color_image</li>";
            }
            echo "</ul>";
        }

        echo "<p><strong>Hình ảnh sản phẩm chính:</strong> $main_image</p>";

        echo "Sản phẩm đã được thêm thành công!";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Form chưa được gửi.";
}
?>
