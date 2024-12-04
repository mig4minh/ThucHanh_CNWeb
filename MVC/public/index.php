<?php
require_once '..../controllers/ProductController.php';

$controller = new ProductController();

// Kiểm tra xem có tham số action hay không
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $id = $_GET['id'] ?? null;

    switch ($action) {
        case 'add':
            $controller->add();
            break;
        case 'edit':
            $controller->edit($id);
            break;
        case 'delete':
            $controller->delete($id);
            break;
        default:
            $controller->index();
            break;
    }
} else {
    // Nếu không có tham số action, gọi phương thức index()
    $controller->index();
}
?>
