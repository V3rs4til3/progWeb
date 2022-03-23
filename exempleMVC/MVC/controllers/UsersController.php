<?php

namespace controllers;

class UsersController
{
    function login() {
        if (isset($_POST['username'])) {
            //require_once '../../models/Users.php';
            $bd = new \PDO('mysql:dbname=login;host=host.docker.internal;port=3306',
                'root', 'root');
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userRepo = new \repositories\UserRepositories();

            $user = $userRepo->getOne($bd, $username);
            if ($user) {
                if (/*password_verify($password, $user->password)*/ $password == $user->password) {
                    echo 'Login réussi';
                }
                else {
                    echo 'Username existe';
                }
            }
            else {
                $user = new \models\Users;
                $user->username = $username;
                $user->password = $password;
                $userRepo->newInsert($bd, $user);
            }
        }
        require __DIR__ . '/../views/Users/login.php';
    }

    function exist(){
        require __DIR__ . '/../views/Users/exist.php';
    }

}