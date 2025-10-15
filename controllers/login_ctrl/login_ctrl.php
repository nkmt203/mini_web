<?php
require_once __DIR__ . '/../../models/user_model.php';

class LoginController
{
    private $model;
    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function handleLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $user = $this->model->getUserByUsername($username);

            if ($user && md5($password) === $user['password']) {
                $_SESSION['user'] = $user;
                if ($user['role'] === 'admin') {
                    header("Location: views/admin_view/index.php");
                    exit;
                } else {
                    header("Location: views/user_view/index.php");
                    exit;
                }
            } else {
                $error = "⚠️ Sai tài khoản hoặc mật khẩu!";
                require __DIR__ . '/../../views/login.php';
            }
        } else {
            require __DIR__ . '/../../views/login.php';
        }
    }
}
