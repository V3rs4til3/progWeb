<?php
require_once '../Models/EtreVivant.php';
require_once '../Models/Ennemie.php';
session_start();
$backhome = false;
if (isset($_POST['classes']) && !isset($_SESSION['created'])){
    $_SESSION['joueur'] = new EtreVivant();
    $_SESSION['ennemi'] = new Ennemie();
}
$_SESSION['created'] = true;

if(isset($_POST['attack'])){
    $_SESSION['joueur']->sessionAttack($_SESSION['ennemi']);
    $_SESSION['ennemi']->sessionAttack($_SESSION['joueur']);
}

if($_SESSION['joueur']->vieActu <= 0 ||  $_SESSION['ennemi']->vieActu <= 0){
    session_destroy();
    $backhome = true;
}
if($backhome){
    header('location: choix.php');
}

?>

<div class="row">
    <div class="col-sm-2">
        <h3>Joueur :</h3>
        <?= "Vie : " .  $_SESSION['joueur']->vieActu ?>
        <br>
        <?= "Force : " . $_SESSION['joueur']->force ?>
        <br>
        <?= "Defense : " . $_SESSION['joueur']->defense ?>
    </div>
    <div class="col-sm-2">
        <h3>Ennemie :</h3>
        <?= "Vie : " .  $_SESSION['ennemi']->vieActu ?>
        <br>
        <?= "Force : " . $_SESSION['ennemi']->force ?>
        <br>
        <?= "Defense : " . $_SESSION['ennemi']->defense ?>
    </div>
</div>
<form method="post" action="jouer.php">
    <button type="submit" class="btn btn-danger" name="attack"> Attaquer </button>
</form>