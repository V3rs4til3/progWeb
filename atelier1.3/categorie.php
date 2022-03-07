<?php

class categorie
{
    public int $id;
    public String $nom;

    public function __construct(){
    }

    public function getID(): int{
        return $this->id;
    }

    public function getName(): String{
        return $this->nom;
    }

}