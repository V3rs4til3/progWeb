<?php

namespace Repositories;

class CategorieRepositorie
{
    /**
     * @param \PDO $bd
     * @return \CategorieModel[]
     */
    public function getAllCategorie(\PDO $bd): Array {
        $query = $bd->query('SELECT * FROM categorie');
        $query->setFetchMode(\PDO::FETCH_CLASS, '\Models\CategorieModel');
        return $query->fetchAll();
    }
}