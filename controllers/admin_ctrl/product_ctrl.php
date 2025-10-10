<?php
require_once __DIR__ . '/../../models/product_model.php';
require_once __DIR__ . '/../../models/category_model.php';
require_once __DIR__ . '/../../helpers/image_helper.php';
class ProductController
{
    private $model;
    public function __construct()
    {
        $this->model = new ProductModel();
    }

    public function listProduct()
    {
        $listProduct = $this->model->getAllProduct();
        $viewFile = "../../views/admin_view/product/list_product.php";
        include __DIR__ . '/../../views/admin_view/dashboard.php';
    }

    public function addProduct()
    {
        if (isset($_POST['submit']) && $_POST['submit']) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $image = uploadImage($_FILES['image']);
            $category_id = $_POST['category_id'];

            $addProduct = $this->model->addProduct($name, $price, $description, $image, $category_id);
            if ($addProduct) {
                header("Location: index.php?controller=product&action=listProduct");
                exit;
            } else {
                $error = "Thêm sản phẩm thất bại !!";
            }
        }
        $viewFile = "../../views/admin_view/product/add_product.php";
        include __DIR__ . '/../../views/admin_view/dashboard.php';
    }

    public function deleteProduct()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $deleteProduct = $this->model->deleteProduct($id);
            if ($deleteProduct) {
                header("Location: index.php?controller=product&action=listProduct");
                exit;
            } else {
                $error = "Xóa thất bại ";
                echo $error;
            }
        } else {
            echo 'Không có ID nào để xóa !';
        }
    }

    public function updateProduct()
    {
        $id = $_GET['id'];
        if (isset($_POST['submit']) && $_POST['submit'] && $id) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $image = uploadImage($_FILES['image']);
            $category_id = $_POST['category_id'];
            $updateProduct = $this->model->updateProduct($name, $price, $description, $image, $category_id, $id);

            if($updateProduct){
                header("Location: index.php?controller=product&action=listProduct");
                exit;
            }
            else{
                $error="Cập nhật thất bại";
                echo $error;
            }
        }
        $viewFile = "../../views/admin_view/product/update_product.php";
        include __DIR__ . '/../../views/admin_view/dashboard.php';
    }
}
