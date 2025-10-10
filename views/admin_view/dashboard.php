<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../public/css/style_dashboard.css">
</head>

<body id="admin-dashboard">
    <nav class="navbar" id="main-navbar">
        <a href="index.php?controller=dashboard" class="nav-link">🏠 Trang chủ</a>
        <a href="index.php?controller=category&action=index" class="nav-link">📁 Quản lý Danh mục</a>
        <a href="index.php?controller=product&action=listProduct" class="nav-link">📦 Quản lý Sản phẩm</a>
        <a href="#" class="nav-link">👤 Quản lý Người dùng</a>
        <a href="#" class="nav-link">🧾 Quản lý Đơn hàng</a>
        <a href="#" class="nav-link">📊 Báo cáo</a>
        <a href="#" class="nav-link">⚙️ Cài đặt</a>
    </nav>

    <main class="content" id="dashboard-content">
        <h2 class="dashboard-title">🎯 Chào mừng đến với Trang Quản trị</h2>
        <p class="dashboard-description">Chọn danh mục quản lý ở thanh bên trên để bắt đầu.</p>

        <?php
        if (isset($viewFile) && file_exists($viewFile)) {
            include $viewFile;
        }
        ?>
    </main>

    <footer id="dashboard-footer">
        <p class="footer-text">
            &copy; 2025 Hệ thống Quản trị Website | Thiết kế bởi NKM
        </p>
    </footer>
</body>
</html>
