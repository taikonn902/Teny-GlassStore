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

    <title>Colors Management</title>
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

<style>
    .swal2-input {
        font-size: 16px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-top: 10px;
    }

    .swal2-input:focus {
        border-color: #55D5D2;
        outline: none;
    }
</style>

<style>
    .bottom-content {
        padding: 0 10px;
        max-height: 550px;
        overflow-y: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        overflow: hidden;
        background-color: #FFF;
        position: relative;
    }

    thead {
        position: sticky;
        top: 0px;
        z-index: 10;
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

    table td.actions button {
        padding: 6px 10px;
        margin: 0 5px;
        cursor: pointer;
        border: none;
        outline: none;
        background-color: #55D5D2;
        color: white;
        border-radius: 4px;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    table td.actions button:hover {
        background-color: #F58F5D;
    }

    table td#color-id {
        width: 5%;
        /* Chiếm 5% */
    }

    table td#color-name,
    table td#color-code,
    table td#color-data {
        width: 25%;
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
                <button type="button" id="addColorBtn">Thêm Màu</button>
            </div>

            <div class="bottom-content">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên màu</th>
                            <th>Mã màu</th>
                            <th>Dữ liệu màu</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../backend-config/connectDB.php";

                        // Truy vấn dữ liệu từ bảng colors
                        $sql = "SELECT * FROM colors";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td id='color-id'>" . $row["color_id"] . "</td>";
                                echo "<td id='color-name'>" . $row["color_name"] . "</td>";
                                echo "<td id='color-code'>";
                                echo "<div style='display: flex; align-items: center;'>";
                                echo "<div style='width: 30px; height: 30px; background-color: " . $row["color_code"] . ";'></div>";
                                echo "<span style='margin-left: 10px;'>" . $row["color_code"] . "</span>";
                                echo "</div>";
                                echo "</td>";
                                echo "<td id='color-data'>" . $row["color_data"] . "</td>";
                                echo "<td class='actions'>";
                                echo "<button onclick='editColor(" . $row["color_id"] . ")'>Sửa</button>";
                                echo "<button onclick='deleteColor(" . $row["color_id"] . ")'>Xoá</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' style='font-weight: 500'>Không có dữ liệu màu sắc.</td></tr>";
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('addColorBtn').addEventListener('click', function () {
            Swal.fire({
                title: 'Thêm Màu Mới',
                html: `
                        <input id="colorName" class="swal2-input" placeholder="Tên màu">
                        <input id="colorCode" class="swal2-input" placeholder="Mã màu">
                        <input id="colorData" class="swal2-input" placeholder="Dữ liệu màu">
                    `,
                focusConfirm: false,
                preConfirm: () => {
                    const colorName = document.getElementById('colorName').value;
                    const colorCode = document.getElementById('colorCode').value;
                    const colorData = document.getElementById('colorData').value;
                    if (!colorName || !colorCode || !colorData) {
                        Swal.showValidationMessage(`Vui lòng nhập đầy đủ thông tin`);
                        return false;
                    }
                    return { colorName: colorName, colorCode: colorCode, colorData: colorData };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const { colorName, colorCode, colorData } = result.value;
                    console.log('Color Name:', colorName);
                    console.log('Color Code:', colorCode);
                    console.log('Color Data:', colorData);

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'backend-action/color-action.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onload = function () {
                        if (xhr.status >= 200 && xhr.status < 400) {
                            Swal.fire('Thành công!', 'Màu mới đã được thêm.', 'success');
                        } else {
                            Swal.fire('Lỗi!', 'Không thể thêm màu mới.', 'error');
                        }
                    };
                    xhr.onerror = function () {
                        Swal.fire('Lỗi!', 'Không thể thêm màu mới.', 'error');
                    };
                    xhr.send(`colorName=${colorName}&colorCode=${colorCode}&colorData=${colorData}`);
                }
            });
        });
    });
</script>


</html>