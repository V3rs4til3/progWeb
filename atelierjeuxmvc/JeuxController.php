<?php

class JeuxController
{
    public function loadGames() {
        $bd = new PDO('mysql:dbname=test;host=host.docker.internal;port=3306', 'root', 'root');
        $loader = new JeuxModel();
        $value = $loader->getAllJeux($bd);

    }

    public function toutLesJeux():void{

    }
}