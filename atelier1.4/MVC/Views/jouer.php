<?php
require_once '../Models/EtreVivant.php';
require_once '../Models/Ennemie.php';

if( isset($_POST['classes'])){
    $joueur = new EtreVivant();
    $ennemi = new Ennemie();
}

?>

<div class="row">
    <div class="col-sm-2">
        <h3>Joueur :</h3>
        <?= "Vie : " .  $joueur->vieMax ?>
        <br>
        <?= "Force : " . $joueur->force ?>
        <br>
        <?= "Defense : " . $joueur->defense ?>
    </div>
    <div class="col-sm-2">
        <h3>Ennemie :</h3>
        <?= "Vie : " .  $ennemi->vieMax ?>
        <br>
        <?= "Force : " . $ennemi->force ?>
        <br>
        <?= "Defense : " . $ennemi->defense ?>
    </div>
</div>
<form method="post" action="<?php
    sessionAttack($joueur, $ennemi);
    sessionAttack($ennemi, $joueur);
?>">
    <button type="submit" class="btn btn-danger"> Attaquer </button>
</form>