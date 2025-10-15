<?php
session_start();
include 'config/config.php';

if (isset($_GET['controller'])) {
    $controllerURL = $_GET['controller'];
} else {
    $controllerURL = 'login';
}
if (isset($_GET['action'])) {
    $actionURL = $_GET['action'];
} else {
    $actionURL = 'handleLogin';
}

$controllerFile = "controllers/login_ctrl/{$controllerURL}_ctrl.php";
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $className = ucfirst($controllerURL) . 'Controller';
    if (class_exists($className)) {
        $obj = new $className();

        if (method_exists($obj, $actionURL)) {
            $obj->$actionURL();
        } else {
            echo "Không tìm thấy action: $actionURL";
        }
    } else {
        echo "KHông tìm thấy class controller: $className";
    }
} else {
    echo "Không tìm thấy controller: $controllerFile";
}
