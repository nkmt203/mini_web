<?php
session_start();
require_once '../../config/config.php';
//Kiểm tra URL
if (isset($_GET['controller'])) {
    $controllerURL = $_GET['controller'];
} else {
    $controllerURL = 'dashboard';
}

if (isset($_GET['action'])) {
    $actionURL = $_GET['action'];
} else {
    $actionURL = 'index';
}

//router
$controllerPath = '';
switch ($controllerURL) {
    case 'dashboard':
        $controllerPath = '../../controllers/admin_ctrl/dashboard_ctrl.php';
        break;
    case 'product':
        $controllerPath = '../../controllers/admin_ctrl/product_ctrl.php';
        break;
    default:
        $controllerPath = '../../controllers/admin_ctrl/dashboard_ctrl.php';
        break;
}
if (!file_exists($controllerPath)) {
    die("<h2> <i>Không tìm thấy file controller: </i>( $controllerPath )</h2>");
}
require_once $controllerPath;

//Tạo class
$className = ucfirst($controllerURL) . 'Controller';
if (!class_exists($className)) {
    die("<h2> <i>Không tìm thấy class: </i>( $className )</h2>");
}

//Tạo đối tượng controller 
$controller = new $className();
if (!method_exists($controller, $actionURL)) {
    die("<h2> <i>Không tìm thấy action ' $actionURL ' trong controller: </i> ( $className )</h2>");
}
$controller->$actionURL();
