<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />


    <link rel="stylesheet" href="../css/backend-global.css">


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
include "../backend-components/sidebar.php";
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
    .ss-4{
        width: 90%;
        margin: 0px auto;
    }
    .checkbox-group{
        p
    }

</style>

<!-- ss-5 css -->
<style>
    .color-item {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 10px;
        width: calc(33% - 20px);
    }

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

        <form class="add-new-product-form">
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

                <div class="ss-4">
                    <h3>Hình dáng</h3>

                    <div class="checkbox-group">
                        <?php
                        if ($result_shapes->num_rows > 0) {
                            while ($row = $result_shapes->fetch_assoc()) {
                                echo '<label><input type="checkbox" name="shapes[]" value="' . htmlspecialchars($row['shape_id']) . '"> ' . htmlspecialchars($row['shape_name']) . '</label>';
                            }
                        } else {
                            echo '<p>Không có hình dáng nào</p>';
                        }
                        ?>
                    </div>
                </div>

                <div class="ss-5">
                    <h3>Màu sắc</h3>
                    <div class="checkbox-group">
                        <?php
                        if ($result_colors->num_rows > 0) {
                            while ($row = $result_colors->fetch_assoc()) {
                                echo '<label class="color-item">';
                                echo '<div class="color-demo" style="background-color:' . htmlspecialchars($row['color_code']) . ';"></div>';
                                echo '<input type="checkbox" name="colors[]" value="' . htmlspecialchars($row['color_id']) . '"> ' . htmlspecialchars($row['color_name']);
                                echo '</label>';
                            }
                        } else {
                            echo '<p>Không có màu sắc nào</p>';
                        }
                        ?>
                    </div>
                </div>

                <div class="ss-6">

                </div>

                <div class="ss-7">
                    <label>Mô tả sản phẩm</label>

                    <textarea name="product_des" id="product-des" class="product-des"></textarea>
                </div>

                <div class="ss-8">
                    <div class="product-name-group">
                        <input type="text" id="product-quantity" name="product_quantity" required placeholder=" ">
                        <label for="product-name">Số lượng</label>
                    </div>
                </div>

                <div class="ss-9">

                </div>
            </div>
        </form>

        <div class="container-show-products">

        </div>
    </div>
</section>

</body>



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
                    if (priceInput.value === '') {
                        checkbox.checked = false;
                    }
                    priceGroup.classList.remove('show');
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

<script src="https://cdn.tiny.cloud/1/qx6o7oemh6rf889onwu3ov68xxxd686l7b2052mqsuld64yy/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

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
</script>
