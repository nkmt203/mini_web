<?php
class ProductModel
{
    private $pdo;
    function __construct()
    {
        $this->pdo = pdo_connect();
    }

    public function getAllProduct()
    {
        $pdo = pdo_connect();
        $sql = "SELECT p.id ,p.name AS name_product, p.price, p.description, p.image, c.name AS name_category
        FROM products p JOIN categories c ON p.category_id= c.id ORDER BY p.id DESC ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByIdProduct($id)
    {
        $pdo = pdo_connect();
        $sql = "SELECT *FROM products WHERE id =? ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $price, $description, $image, $category_id)
    {
        $pdo = pdo_connect();
        $sql = "INSERT INTO products (name,price,description,image,category_id) VALUES (?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $price, $description, $image, $category_id]);
        return $stmt;
    }
    public  function deleteProduct($id)
    {
        $pdo = pdo_connect();
        $sql_img = "SELECT image FROM products WHERE id=?";
        $stmt = $pdo->prepare($sql_img);
        $stmt->execute([$id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($product) {
            deleteImage($product['image']);
            $sql = "DELETE FROM products WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->rowCount() > 0;
        }
        return false;
    }

    public function updateProduct($name, $price, $description, $image, $category_id, $id)
    {
        $pdo = pdo_connect();
        //Update product nhưng k update ảnh 
        if ($image === null) {
            $sql = "UPDATE products SET name=?, price=?,description=?,category_id=? WHERE id =?";
            $stmt = $pdo->prepare($sql);
            return $stmt->execute([$name, $price, $description, $category_id, $id]);
        }
        //Update mà update ảnh mới đồng thời xóa ảnh cũ
        else {
            $oldImage = $this->getByIdProduct($id);
            if (!empty($oldImage['image']) && $oldImage) {
                deleteImage($oldImage['image']);
            }
            $sql = "UPDATE products SET name=?,price=?,description=?,image=?,category_id=? WHERE id= ?";
            $stmt = $pdo->prepare($sql);
            return $stmt->execute([$name, $price, $description, $image, $category_id, $id]);
        }
    }
}
