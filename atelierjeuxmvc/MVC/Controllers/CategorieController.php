<?php
namespace Controllers;
class CategorieController
{
    /**
     * @return \Models\CategorieModel[]
     */
    public function loadAllCategorie(): Array {
        $bd = new \PDO('mysql:dbname=test;host=host.docker.internal;port=3306', 'root', 'root');
        $loader = new \repositories\CategorieRepositorie();
        return $loader->getAllCategorie($bd);
    }
}