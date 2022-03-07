<?php

class Jeux
{
    public int $id;
    public String $nom;
    public int $idCateg;
    public String $nomCateg;

    public function __construct(){
        $bd = new PDO('mysql:dbname=test;host=host.docker.internal;port=3306', 'root', 'root');
        $this->nomCateg =  $this->getCateg($bd);
    }

    public function getCateg(PDO $bd): string {
        if(!isset($this->nomCateg)){
            $query ="SELECT nom FROM categorie WHERE id = :id";
            $stmt =  $bd->prepare($query);
            $stmt->bindparam(":id",$this->idCateg, PDO::PARAM_INT);
            $stmt->execute();
            return ($stmt->fetch())[0];;
        }
        return $this->nomCateg;
    }

    public function getID(): int{
        return $this->id;
    }

    public function getName(): String{
        return $this->nom;
    }


}