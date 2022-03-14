<?php

class EtreVivant
{
    public int $vieMax = 10,
        $vieActu,
        $force,
        $defense;

    public function __construct(){
        $this->vieActu = $this->vieMax;
        $this->force = 5;
        $this->defense = 5;
    }

    public static function lancerDee(): int{
        return rand(1,10);
    }

    public function sessionAttack(EtreVivant $attacking, EtreVivant $defending): void{
        $nbDegat = $this->resultatCombat($attacking->attack(), $defending->defense());
        if($nbDegat >= 1)
            $defending->vieActu - $nbDegat;
    }

    public function attack(): int{
        $success = 0;
        for ($i = 0; $i < $this->force; $i++){
            if(EtreVivant::lancerDee() >= 6){
                $success++;
            }
        }
        return $success;
    }

    public function defense(): int{
        $success = 0;
        for ($i = 0; $i < $this->defense; $i++){
            if(EtreVivant::lancerDee() >= 6){
                $success++;
            }
        }
        return $success;
    }

    public function resultatCombat(int $succAttack, int $succDef):int{
        return $succAttack > $succDef :: $succAttack - $succDef;
    }

}