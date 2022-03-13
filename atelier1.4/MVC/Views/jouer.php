<?php
require_once '../Models/EtreVivant.php';
require_once '../Models/Ennemie.php';

if( isset($_POST['classes'])){
    $joueur = new EtreVivant();
    $ennemi = new Ennemie();
}

?>

<h1>Joueur :</h1>

<div class="content">
    <div class="row">
        <div class="col-2">
            <?= $joueur->vieMax ?>
        </div>
    </div>


