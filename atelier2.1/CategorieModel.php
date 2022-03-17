<?php

class CategorieModel
{
    public int $id;
    public string $nomCategorie;

    public function getAllJeux(PDO $bd): void{
        $query = $bd->query('SELECT * FROM categorie');
        $query->setFetchMode(PDO::FETCH_CLASS, 'Categorie');
        $query->fetchAll();
    }

}