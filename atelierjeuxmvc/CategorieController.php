<?php

class CategorieController
{
    public function loadAllCategorie(): void {
        $bd = new PDO('mysql:dbname=test;host=host.docker.internal;port=3306', 'root', 'root');
        $loader = new CategorieModel();
        $loader->getAllCategorie($bd);
    }
}