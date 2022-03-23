<?php
namespace Repositories;
use Models\JeuxModel;

class JeuxRepositorie
{
    /**
     * @param \PDO $bd
     * @return JeuxModel[]
     */
    public function getAllJeux(\PDO $bd): Array
    {
        $query = $bd->query('SELECT * FROM jeux');
        $query->setFetchMode(\PDO::FETCH_CLASS, '\Models\JeuxModel');
        return $query->fetchAll();
    }

    public function ajoutJeux(\PDO $bd):void{
        $query= $bd->query("INSERT INTO jeux (nom, idCateg) VALUES( '" . $_POST['jeux']. "' , '"  . $_POST['taskOption'] . "' )");
        $query->execute();
    }

    public function jeuExiste(\PDO $bd, string $nom):bool{
        $query = $bd->query('SELECT * FROM jeux WHERE nomJeu = ' . $nom);
        $query->execute();
        return $query->fetch();
    }

    public function editGame(\PDO $bd, int $id, string $nom, int $idcateg){
        $query = $bd->query('UPDATE jeux SET  nomJeu = ' . $nom . ' , idCategorie = ' . $idcateg . ' WHERE id = ' . $id);
        $query->execute();
    }
}