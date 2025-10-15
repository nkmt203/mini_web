<?php include 'layout/header.php'; ?>
<?php
$productModel = new ProductModel();
$listProduct = $productModel->getAllProduct();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang người dùng</title>
    <link rel="stylesheet" href="../../public/css/style_home.css"> <!-- Link tới file CSS nếu có -->
</head>

<body>
 <div class="product-list">
    <?php foreach ($listProduct as $p): ?>
        <div class="product-item">
            <div class="product-image-wrapper">
                <img class="product-image" src="../../uploads/<?= $p['image'] ?>" alt="">
            </div>
            <div class="product-info">
                <h4 class="product-name"><?= $p['name_product'] ?></h4>
                <h4 class="product-price"><?= number_format($p['price']) ?>₫</h4>
            </div>
            <div class="product-actions">
                <button class="btn-order">Đặt hàng</button>
                <button class="btn-cart">Thêm vào giỏ hàng</button>
            </div>
        </div>
    <?php endforeach ?>
</div>

</body>
<?php include 'layout/footer.php'; ?>
</html>