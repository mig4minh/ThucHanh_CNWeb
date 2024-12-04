<?php
require_once './config/database.php';
require_once './models/Product.php';

class ProductController {
    private $model;

    public function __construct() {
        $db = new Database();
        $this->model = new Product($db->connect());
    }

    public function index() {
        $products = $this->model->getAll();
        include './views/index.php';
    }
    

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $price = htmlspecialchars($_POST['price']);
            // Loại bỏ chữ "VND" nếu có
            $price = str_replace(" VND", "", $price);
            $this->model->add($name, $price);
            header('Location: index.php');
            exit;
        } else {
            include './views/add.php';
        }
    }
      public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $price = htmlspecialchars($_POST['price']) . " VND";
            $price = str_replace(" VND", "", $price);
            $this->model->update($id, $name, $price);
            header('Location: index.php');
            exit;
        } else {
            $product = $this->model->getById($id); // Lấy sản phẩm theo ID
            if ($product) {
                include './views/edit.php';
            } else {
                echo "Sản phẩm không tồn tại!";
            }
        }
    }
    
    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php');
        exit;
    }
    
    
    
}
?>
