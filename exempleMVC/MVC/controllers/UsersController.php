<?php

class UsersController
{
    function  login() {
        if (isset($_POST['username'])) {
            require_once '../../models/Users.php';
            $bd = new PDO('mysql:dbname=login;host=host.docker.internal;port=3306',
                'root', 'root');
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = Users::getOne($bd, $username);
            if ($user) {
                if (password_verify($password, $user->password)) {
                    echo 'Login réussi';
                }
                else {
                    echo 'Username existe';
                }
            }
            else {
                Users::newInsert($bd, $username, $password);
            }
        }
    }
}