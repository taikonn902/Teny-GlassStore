<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="../css/backend-global.css">

    <title>Brands Management</title>
</head>

<!-- global css -->
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

<!-- top content -->
<style>
    .top-content {
        padding: 10px;
        margin: 20px 0;
    }

    #addColorBtn {
        background-color: #55D5D2;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        font-weight: 600;
        border-radius: 10px;
    }

    #addColorBtn:hover {
        background-color: #F58F5D;
    }
</style>

<!-- bảng dữ liệu -->
<style>
    .bottom-content {
        padding: 0 10px;
        max-height: 550px;
        overflow-y: auto;
    }

    table {
        width: 50%;
        margin: 0px auto;
        border-collapse: collapse;
        overflow: hidden;
        background-color: #FFF;
        position: relative;
    }

    thead {
        /* position: sticky;
        top: 200px;
        z-index: 10; */
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: center;
    }

    table th {
        background-color: #F58F5D;
        top: 0;
        color: #FFF;
    }

    table td {
        vertical-align: middle;
    }

    table td.actions {
        width: 120px;
        text-align: center;
    }

    .edit-button {
        padding: 6px 10px;
        margin: 0 5px;
        cursor: pointer;
        border: none;
        outline: none;
        background-color: #32CD32;
        color: white;
        border-radius: 4px;
        font-size: 14px;
        transition: background-color 0.3s ease;
        font-weight: 500;
    }

    .edit-button:hover {
        background-color: #228B22;
    }

    .delete-button{
        background-color: #FF6347;   
        font-weight: 500;     
        padding: 6px 10px;
        margin: 0 5px;
        cursor: pointer;
        border: none;
        outline: none;
        color: #FFF;
        border-radius: 4px;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .delete-button:hover {
    background-color: #FF3E3E;
}

    table td.actions {
        width: 20%;
    }
</style>

<body>
    <?php include "../backend-components/sidebar.php"; ?>

    <section class="home">
        <?php include "../backend-components/hello-user.php"; ?>

        <div class="content-container">
            <div class="top-content">
                <button type="button" id="addColorBtn">Thêm Thương Hiệu</button>
            </div>

            <div class="bottom-content">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Thương Hiệu</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../backend-config/connectDB.php";

                        // Truy vấn dữ liệu từ bảng colors
                        $sql = "SELECT * FROM brands";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td id='brand-id'>" . $row["brand_id"] . "</td>";
                                echo "<td id='brand-name'>" . $row["brand_name"] . "</td>";
                                echo "<td class='actions'>";
                                echo "<button class='edit-button' onclick='editBrand(" . $row["brand_id"] . ")'>Sửa</button>";
                                echo "<button class='delete-button' onclick='deleteBrand(" . $row["brand_id"] . ")'>Xoá</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' style='font-weight: 500'>Không có dữ liệu thương hiệu.</td></tr>";
                        }

                        // Đóng kết nối
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</body>

</html>