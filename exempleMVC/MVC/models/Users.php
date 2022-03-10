<?php

class Users
{
    public int $id;
    public string $username;
    public string $password;

    static function getOne(PDO $bd, string $username): Users|bool {
        $query = $bd->prepare("SELECT * FROM users WHERE username = ?");
        $query->bindValue(1, $username, PDO::PARAM_STR);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, "Users");
        $user = $query->fetch();
        return $user;
    }

    static function newInsert(PDO $bd, string $username, string $password) : void{
        $query = $bd->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $query->bindValue(1, $username, PDO::PARAM_STR);
        $query->bindValue(2, $password, PDO::PARAM_STR);
    }
}