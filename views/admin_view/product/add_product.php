<?php
$categoryModel = new CategoryModel();
$listCategory = $categoryModel->getAllCategory();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giao diện Nhập Sản phẩm</title>
    <link rel="stylesheet" href="../../../public/css/style_form.css">
    <script src="../../../public/script/view_image.js"></script>
</head>

<body id="product-form-page">
    <form action="index.php?controller=product&action=addProduct" method="post" enctype="multipart/form-data" class="product-form">
        
        <div class="form-group">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" id="name" required class="form-input">
        </div>

        <div class="form-group">
            <label for="price" class="form-label">Price:</label>
            <input type="number" name="price" id="price" required class="form-input">
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" id="description" required class="form-textarea"></textarea>
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Image:</label>
            <input type="file" id="image" name="image"  required class="form-file" onchange="viewImage(event)">
            <img src="" alt="LoadImage" id="preview" class="form-preview">
        </div>

        <div class="form-group">
            <label for="category_id" class="form-label">Category:</label>
            <select name="category_id" id="category_id" required class="form-select">
                <option>--Chọn danh mục--</option>
                <?php foreach ($listCategory as $c): ?>
                    <option value="<?= $c['id'] ?>"><?= $c['name'] ?> </option>
                <?php endforeach ?>
            </select>
        </div>

        <input type="submit" name="submit" id="submit" value="ADD" class="form-submit">
    </form>
</body>

</html>
