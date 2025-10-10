<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách các sản phẩm</title>
    <link rel="stylesheet" href="../../../public/css/style_product.css">
</head>

<body id="product-page">
    <a href="index.php?controller=product&action=addProduct" class="btn-add-product">Add Product</a>
    <table class="product-table" border="1" cellpadding="5">
        <thead>
            <tr class="table-header">
                <td class="column-id">ID</td>
                <td class="column-name">Name</td>
                <td class="column-price">Price</td>
                <td class="column-description">Description</td>
                <td class="column-image">Image</td>
                <td class="column-category">Category</td>
                <td class="column-action">Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listProduct as $p): ?>
                <tr class="product-row">
                    <td class="product-id"><?= $p['id'] ?></td>
                    <td class="product-name"><?= $p['name_product'] ?></td>
                    <td class="product-price"><?= number_format($p['price'],0,',','.') ?>đ</td>
                    <td class="product-description"><?= $p['description'] ?></td>
                    <td class="product-image">
                        <img src="../../../uploads/<?= $p['image'] ?>" alt="Chưa có hình ảnh" class="product-img">
                    </td>
                    <td class="product-category"><?= $p['name_category'] ?></td>
                    <td class="product-action" width="200px">
                        <a href="index.php?controller=product&action=updateProduct&id=<?= $p['id'] ?>" class="btn-update" onclick="return confirm('Bạn có chắc muốn cập nhật ??')">Update</a> /
                        <a href="index.php?controller=product&action=deleteProduct&id=<?= $p['id'] ?>" class="btn-delete" onclick="return confirm('Bạn có chắc muốn xóa ??')">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>
