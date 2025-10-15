<?php
require_once __DIR__ . '/../../models/product_model.php';
class HomeController
{
    private $model;
    public function __construct()
    {
        $this->model = new ProductModel();
    }

    public function home()
    {
        $listProduct = $this->model->getAllProduct();
        require_once __DIR__ . '/../../views/user_view/home.php';
    }
}
