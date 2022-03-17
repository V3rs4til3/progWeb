<?php
namespace Controllers;
class CategorieController
{
    public function loadAllCategorie(): void {
        $bd = new \PDO('mysql:dbname=test;host=host.docker.internal;port=3306', 'root', 'root');
        $loader = new \Models\CategorieModel();
        $loader->getAllCategorie($bd);
    }

    public function getCategorie(int $id): string | bool{
        $bd = new \PDO('mysql:dbname=test;host=host.docker.internal;port=3306', 'root', 'root');
        $loader = new \Models\CategorieModel();
        $loader->getAllCategorie($bd);

        foreach ($loader as $r){
            if($r->id = $id){
                echo $r->nameCategorie;
                return $r->nameCategorie;
            }
        }
        return false;
    }
}