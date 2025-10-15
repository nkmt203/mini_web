<?php
class UserModel
{
    private $pdo;
    function __construct()
    {
        $this->pdo = pdo_connect();
    }

     public function getUserByUsername($username) {
        $pdo = pdo_connect();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
