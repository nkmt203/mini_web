<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
if (isset($_GET['controller'])) {
    $controllerURL = $_GET['controller'];
} else {
    $controllerURL = 'user';
}

if (isset($_GET['action'])) {
    $actionURL = $_GET['action'];
} else {
    $actionURL = 'home';
}
$controllerPath = '';
switch ($controllerURL) {
    default:
        require_once __DIR__ . '/../../controllers/user_ctrl/home_ctrl.php';
        $ctrl = new HomeController();
        break;
}

$ctrl->$actionURL();
