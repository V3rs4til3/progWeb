<?php

class JeuxModel
{
    public int $id, $idCategorie;
    public string $nomJeu;

    public function getAllJeux(PDO $bd): void{
        $query = $bd->query('SELECT * FROM jeux');
        $query->setFetchMode(PDO::FETCH_CLASS, 'JeuxModel');
        $query->fetchAll();
    }

    public function ajoutJeux(PDO $bd):void{
        $query= $bd->query("INSERT INTO jeux (nom, idCateg) VALUES( '" . $_POST['jeux']. "' , '"  . $_POST['taskOption'] . "' )");
        $query->execute();
    }

    public function jeuExiste(PDO $bd, string $nom):bool{
        $query = $bd->query('SELECT * FROM jeux WHERE nomJeu = ' . $nom);
        $query->execute();
        return $query->fetch();
    }
}