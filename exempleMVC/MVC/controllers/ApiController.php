<?php

namespace controllers;

class ApiController
{
    function userExist(){
        $bd = new \PDO('mysql:dbname=login;host=host.docker.internal;port=3306',
            'root', 'root');
        $username = $_POST['username'];

        $userRepo = new \repositories\UserRepositories();
        $user = $userRepo->getOne($bd, $username);
        if($user){
            http_response_code(204);
        }
        else{
            http_response_code(400);
        }
    }

}