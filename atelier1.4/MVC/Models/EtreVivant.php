<?php

class EtreVivant
{
    public int $vieMax = 10,
        $vieActu,
        $force = 5,
        $defense = 5;

    public function __construct() {
        $this->vieActu = $this->vieMax;
    }

    public static function lancerDee(): int{
        return rand(1,10);
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