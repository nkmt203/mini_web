<?php
class UserModel
{
    private $pdo;
    function __construct()
    {
        $this->pdo = pdo_connect();
    }
}
