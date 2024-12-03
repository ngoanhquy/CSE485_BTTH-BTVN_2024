<?php
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'ProductsController'; 
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null; 
require_once __DIR__ . '/connect.php';
require_once __DIR__ . '/controllers/ProductsController.php';

if (class_exists($controllerName)) {
    $controller = new $controllerName($pdo);

    if (method_exists($controller, $action)) {
        
        if ($action === 'update' && $id !== null) {
            $controller->$action($id); 
        } else {
           
            $controller->$action();
        }
    } else {
        
        echo "Action không tồn tại!";
    }
} else {
   
    echo "Controller không tồn tại!";
}

?>
