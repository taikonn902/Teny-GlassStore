<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- <link rel="stylesheet" href="css/custom-scroll.css">
<link rel="stylesheet" href="css/backend-global.css"> -->

<style>
    /* =============== Sidebar =============== */
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 260px;
        background-color: var(--color_Dark1);
        transition: all .5s ease;
        z-index: 100;
    }

    .sidebar.close {
        width: 78px;
    }

    /* --------- Logo ------------ */
    .logo-box {
        height: 60px;
        width: 100%;
        display: flex;
        align-items: center;
        color: #FFF;
        transition: all .5s ease;
        background-color: #4ABAB6;
    }

    .logo-box:hover {
        background-color: #F58F5D;
    }

    .logo-box i {
        font-size: 30px;
        height: 50px;
        min-width: 78px;
        text-align: center;
        line-height: 50px;
        transition: all .5s ease;
    }

    .sidebar.close .logo-box i {
        transform: rotate(360deg);
    }

    .logo-name {
        font-size: 22px;
        font-weight: 600;
    }

    /* ---------- Sidebar List ---------- */
    .sidebar-list {
        height: 100%;
        padding: 30px 0 150px 0;
        overflow: auto;
        background-color: #4ABAB6;
    }

    .sidebar-list::-webkit-scrollbar {
        display: none;
    }

    .sidebar-list li {
        transition: all .5s ease;
        color: #FFF;
    }

    .sidebar-list li:hover {
        background-color: #F58F5D;
    }

    .sidebar-list li .title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all .5s ease;
        cursor: pointer;
        color: #FFF;
    }

    .sidebar-list li.active .title {
        background-color: #F58F5D;
    }

    .sidebar-list li.active .bxs-chevron-down {
        transition: all .5s ease;
        transform: rotate(180deg);
    }

    .sidebar-list li .title .link {
        display: flex;
        align-items: center;
    }

    .sidebar-list li .title i {
        height: 50px;
        min-width: 78px;
        text-align: center;
        line-height: 50px;
        color: #FFF;
        font-size: 20px;

    }

    .sidebar-list li .title .name {
        font-size: 18px;
        font-weight: 500;
        color: #FFF;
    }

    /* ---------------- Submenu ------------- */
    .sidebar-list li .submenu {
        width: 0;
        height: 0;
        opacity: 0;
        transition: all .5s ease;
        border-top: 1px solid #FFF;
        border-bottom: 1px solid #FFF;
        text-align: center;
    }

    .sidebar-list li.dropdown.active .submenu {
        width: unset;
        height: unset;
        opacity: 1;
        display: flex;
        flex-direction: column;
        background-color: #55D5D2;
    }

    .submenu .link {
        color: #FFF;
        font-size: 15px;
        padding: 15px 20px;
        transition: all .5s ease;
        border-bottom: 1px dashed #FFF;
    }

    .submenu .link:last-child{
        border-bottom: none;
    }

    .submenu .link:hover {
        background-color: #F58F5D;
    }

    .submenu-title {
        display: none;
    }

    /* ---------------- Submenu Close ------------- */
    .sidebar.close .logo-name,
    .sidebar.close .title .name,
    .sidebar.close .title .bxs-chevron-down {
        display: none;
    }

    .sidebar.close .sidebar-list {
        overflow: visible;
    }

    .sidebar.close .sidebar-list li {
        position: relative;
    }

    .sidebar.close .sidebar-list li .submenu {
        display: flex;
        flex-direction: column;
        position: absolute;
        left: 100%;
        top: 0;
        margin-top: 0;
        border-radius: 0 6px 6px 0;
        height: max-content;
        width: max-content;
        opacity: 0;
        transition: all .5s ease;
        pointer-events: none;
    }

    .sidebar.close .sidebar-list li:hover .submenu {
        opacity: 1;
        top: 0;
        pointer-events: initial;
        background-color: #000;
    }

    .sidebar.close .submenu-title {
        display: block;
        font-style: 13px;
        padding: 0 10px;
    }
</style>

<?php include_once __DIR__ . '/../backend-config/config-dir.php'; ?>

<div class="sidebar close">
    <!-- ========== Logo ============  -->
    <a href="#" class="logo-box">
        <i class='bx bxl-xing'></i>
        <div class="logo-name">Anna Shop</div>
    </a>

    <!-- ========== List ============  -->
    <ul class="sidebar-list">
        <li>
            <div class="title">
                <a href="<?php echo ROOT_PATH; ?>" class="link">
                    <i class='bx bx-grid-alt'></i>
                    <span class="name">Trang Chủ</span>
                </a>
                <!-- <i class='bx bxs-chevron-down'></i> -->
            </div>
        </li>

        <!-- -------- Dropdown List Item ------- -->
        <li class="dropdown">
            <div class="title">
                <a href="#" class="link">
                    <i class="fa-solid fa-store"></i>
                    <span class="name">Cửa Hàng</span>
                </a>
                <i class='bx bxs-chevron-down'></i>
            </div>
            <div class="submenu">
                <!-- <a href="#" class="link submenu-title">Cửa Hàng</a> -->
                <a href="<?php echo ROOT_PATH; ?>colorsAD/index.php" class="link">Màu Sắc</a>
                <a href="<?php echo ROOT_PATH; ?>brandsAD/index.php" class="link">Thương Hiệu</a>
                <a href="<?php echo ROOT_PATH; ?>materialsAD/index.php" class="link">Chất Liệu</a>
                <a href="<?php echo ROOT_PATH; ?>featuresAD/index.php" class="link">Tính Năng</a>
                <a href="<?php echo ROOT_PATH; ?>shapesAD/index.php" class="link">Hình Dáng</a>
                <a href="<?php echo ROOT_PATH; ?>categorysAD/index.php" class="link">Loại Sản Phẩm</a>
                <a href="<?php echo ROOT_PATH; ?>productsAD/index.php" class="link">Sản Phẩm</a>
            </div>
        </li>

        <!-- -------- Dropdown List Item ------- -->
        <li class="dropdown">
            <div class="title">
                <a href="#" class="link">
                    <i class="fa-solid fa-users-viewfinder"></i>
                    <span class="name">Tài Khoản</span>
                </a>
                <i class='bx bxs-chevron-down'></i>
            </div>
            <div class="submenu">
                <!-- <a href="#" class="link submenu-title">Posts</a> -->
                <a href="#" class="link">Khách Hàng</a>
                <a href="#" class="link">Nhân Viên</a>
            </div>
        </li>

        <!-- -------- Non Dropdown List Item ------- -->
        <li>
            <div class="title">
                <a href="#" class="link">
                    <i class="fa-regular fa-calendar"></i>
                    <span class="name">Đơn Hàng</span>
                </a>
                <!-- <i class='bx bxs-chevron-down'></i> -->
            </div>
        </li>

        <!-- -------- Non Dropdown List Item ------- -->
        <li>
            <div class="title">
                <a href="#" class="link">
                    <i class="fa-regular fa-comments"></i>
                    <span class="name">Bình Luận</span>
                </a>
                <!-- <i class='bx bxs-chevron-down'></i> -->
            </div>
        </li>

        <!-- -------- Dropdown List Item ------- -->
        <li class="dropdown">
            <div class="title">
                <a href="#" class="link">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="name">Thống Kê</span>
                </a>
                <i class='bx bxs-chevron-down'></i>
            </div>
            <div class="submenu">
                <!-- <a href="#" class="link submenu-title">Plugins</a> -->
                <a href="#" class="link">Thống Kê Cửa Hàng</a>
                <a href="#" class="link">Xuất Dữ Liệu</a>
            </div>
        </li>

        <!-- -------- Non Dropdown List Item ------- -->
        <li>
            <div class="title">
                <a href="#" class="link">
                    <i class="fa-regular fa-images"></i>
                    <span class="name">Banner</span>
                </a>
                <!-- <i class='bx bxs-chevron-down'></i> -->
            </div>
        </li>

        <!-- -------- Non Dropdown List Item ------- -->
        <li>
            <div class="title">
                <a href="#" class="link">
                    <i class="fa-regular fa-clone"></i>
                    <span class="name">PopUp</span>
                </a>
                <!-- <i class='bx bxs-chevron-down'></i> -->
            </div>
        </li>

        <!-- -------- Non Dropdown List Item ------- -->
        <li>
            <div class="title">
                <a href="#" class="link">
                    <i class='bx bx-cog'></i>
                    <span class="name">Settings</span>
                </a>
                <!-- <i class='bx bxs-chevron-down'></i> -->
            </div>
        </li>
    </ul>
</div>

<style>
    /* =============== Home Section =============== */
    .home {
        background: linear-gradient(to top right, #D7F8F8 0%, #FFFFFF 50%, #FFFFFF 70%, #FFC8B0 120%);
        position: sticky;
        left: 260px;
        width: calc(100% - 260px);
        transition: all .5s ease;
        height: 100vh;
        overflow-y: auto;
        max-height: 100vh;
    }

    .sidebar.close~.home {
        left: 78px;
        width: calc(100% - 78px);
    }

    .home .toggle-sidebar {
        color: #FFF;
        height: 60px;
        display: flex;
        align-items: center;
        width: fit-content;
        cursor: pointer;
    }

    .home .toggle-sidebar i {
        font-size: 35px;
        margin-left: 15px;
    }

    .home .toggle-sidebar .text {
        font-size: 25px;
        font-weight: 600;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const listItems = document.querySelectorAll(".sidebar-list li");

        listItems.forEach((item) => {
            item.addEventListener("click", () => {
                let isActive = item.classList.contains("active");

                listItems.forEach((el) => {
                    el.classList.remove("active");
                });

                if (!isActive) {
                    item.classList.add("active");
                }
            });
        });

        const toggleSidebar = document.querySelector(".toggle-sidebar");
        const logo = document.querySelector(".logo-box");
        const sidebar = document.querySelector(".sidebar");

        toggleSidebar.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });

        logo.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    });

</script>