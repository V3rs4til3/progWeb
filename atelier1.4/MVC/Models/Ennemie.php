<?php

class Ennemie extends EtreVivant
{
    function __construct() {
        $vieMax = rand(1,10);
        $force = rand(1,10);
        $defense = rand(1,10);
    }
}