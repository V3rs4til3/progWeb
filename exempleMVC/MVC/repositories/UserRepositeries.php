<?php
namespace repositeries;
class UserRepositeries
{
    function getOne(\PDO $bd, string $username): \models\Users|bool {
        $query = $bd->prepare("SELECT * FROM users WHERE username = ?");
        $query->bindValue(1, $username, PDO::PARAM_STR);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, "\models\Users");
        $user = $query->fetch();
        return $user;
    }

    function newInsert(\PDO $bd, \models\Users $user) : void{
        $query = $bd->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $query->bindValue(1, $user->username, PDO::PARAM_STR);
        $query->bindValue(2, $user->password, PDO::PARAM_STR);
    }
}