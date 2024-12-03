<?php
require_once __DIR__ . '/../Models/Products.php';

class ProductsController
{
    private $model;

    public function __construct($pdo)
    {
        $this->model = new Product($pdo);
    }

    public function index()
    {
        $products = $this->model->getAll();
        include __DIR__ . '/../views/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            
            $image = '';
    
            $this->model->create($name, $price, $image);
            header('Location: index.php?controller=ProductsController&action=index');
        } else {
            include __DIR__ . '/../views/create.php';
        }
    }

    public function update($id, $newArgument = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form POST
            $name = $_POST['name'];
            $price = $_POST['price'];
            $image = null;         
            if ($newArgument !== null) {
            }
            $this->model->update($id, $name, $price);
            header('Location: index.php?controller=ProductsController&action=index');
            exit();
        } else {
            $product = $this->model->getById($id);
            include __DIR__ . '/../views/edit.php';
        }
    }
    

    public function delete()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $this->model->delete($id);
            header('Location: index.php?controller=ProductsController&action=index');
        } else {
            header('Location: index.php?controller=ProductsController&action=index');
        }
    }
}
?>
