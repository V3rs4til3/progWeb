<?php

namespace MVC;

class JeuxController
{
    public function loadGames(): JeuxController | bool {
        $bd = new PDO('mysql:dbname=test;host=host.docker.internal;port=3306', 'root', 'root');
        $loader = new JeuxModel();
        return $loader->getAllJeux($bd);
    }

}