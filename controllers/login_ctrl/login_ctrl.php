<?php
require_once __DIR__ . '/../../models/user_model.php';
class LoginController
{
    private $model;
    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function login()
    {
        if (isset($_POST['submit']) && $_POST['submit']) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $user= $userModel->getUserByUsername($username);

            if ($user) {
                $_SESSION['user'] = $user;
                if ($user['role'] === 'admin') {
                    header("Location: views/admin_views/index.php");
                    exit;
                } else {
                    header("Location: user_view/index.php");
                    exit;
                }
                exit;
            } else {
                $error = "Sai tài khoản hoặc mật khẩu !";
                require_once __DIR__. '/../../views/login.php';
            }
        } else {
            require_once __DIR__. '/../../views/login.php';
        }
    }
}