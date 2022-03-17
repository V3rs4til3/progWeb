<?php
namespace Controllers;
class JeuxController
{
    /**
     * @return \Models\JeuxModel[]
     */
    public function loadGames(): Array {
        $bd = new \PDO('mysql:dbname=test;host=host.docker.internal;port=3306', 'root', 'root');
        $loader = new \Models\JeuxModel();
        return $loader->getAllJeux($bd);
    }

}