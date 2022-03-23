<?php
spl_autoload_register();

$controllerJeux = new \Controllers\JeuxController();

if (isset($_GET['id'])){
    $controllerJeux->editGame($_GET['id'],$_GET['nom'], $_GET['idcateg']);
    header('location: index.php');
}

if (!isset($_GET['edit'])){
    //header();
}

$id = $_GET['edit'];

$modelJeux = new \Models\JeuxModel();
$modelJeux = $controllerJeux->loadGames();

foreach ($modelJeux as $r)
    if($r->id == $id)
        $leJeu = $r;

$controllerCateg = new \Controllers\CategorieController();
$modelCateg = new \Models\CategorieModel();
$modelCateg = $controllerCateg->loadAllCategorie();

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<h1>Modifier un jeu</h1>

<form method="get" action="modifier.php" >
    <div class="form-group">
        <label>Nom de jeux</label>
        <input type="text"
               class="form-control"
               value="<?= $leJeu->nomJeu ?>"
               name="nom">
    </div>
    <div class="form-group">
        <label class="form-label">Categorie</label>
        <select class="form-select" name="idcateg">
            <?php  foreach ($modelCateg as $r){
                if($r->id == $leJeu->idCategorie){ ?>
                    <option selected value="<?= $r->id ?>"> <?= $r->nomCategorie ?> </option>
                <?php }
                else{ ?>
                    <option value="<?= $r->id ?>"> <?= $r->nomCategorie ?> </option>
                <?php }
            } ?>
        </select>
    </div>
    <button name="id" type="submit" class="btn btn-primary" value="<?= $leJeu->id ?>" > Modifier </button>
</form>
