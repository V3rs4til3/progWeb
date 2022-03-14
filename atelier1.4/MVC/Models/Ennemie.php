<?php
require_once 'EtreVivant.php';
class Ennemie extends EtreVivant
{
    function __construct() {
        $this->vieMax = rand(1,10);
        $this->force = rand(1,10);
        $this->defense = rand(1,10);
    }
}