<?php
namespace Controllers;
use Models\JeuxModel;

class JeuxController
{
    /**
     * @return \Models\JeuxModel[]
     */
    public function loadGames(): Array {
        $bd = new \PDO('mysql:dbname=test;host=host.docker.internal;port=3306', 'root', 'root');
        $loader = new \Repositories\JeuxRepositorie();
        return $loader->getAllJeux($bd);
    }

    public function editGame(int $id, string $nomJeu, int $categID): void {
        $bd = new \PDO('mysql:dbname=test;host=host.docker.internal;port=3306', 'root', 'root');
        $loader = new \Repositories\JeuxRepositorie();
        $loader->editGame($bd, $id, $nomJeu, $categID);
    }
}