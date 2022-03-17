<?php
namespace Models;
class CategorieModel
{
    public int $id;
    public string $nomCategorie;

    public function getAllCategorie(\PDO $bd): void {
        $query = $bd->query('SELECT * FROM categorie');
        $query->setFetchMode(\PDO::FETCH_CLASS, '\Models\CategorieModel');
        $query->fetchAll();
    }
}