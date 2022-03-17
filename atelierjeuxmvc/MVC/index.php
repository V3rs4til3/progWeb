<?php
spl_autoload_register();
//header('location: MVC\Views\index.php');
$controllerJeux = new \Controllers\JeuxController();
$modelJeux = new \Models\JeuxModel();
$modelJeux = $controllerJeux->loadGames();

$controllerCateg = new \Controllers\CategorieController();
$modelCateg = new \Models\CategorieModel();
$modelCateg = $controllerCateg->loadAllCategorie();
?>
<link rel="stylesheet" href="style.css">

<form class="row row-cols-lg-auto g-3 align-items-center">
    <h1>Ma liste de jeux</h1>

    <a class="btn btn-primary btn-circle btn-sm" href="ajouter.php" role="button">+</a>
</form>
<?php
foreach ($modelJeux as $r){?>
    <form class="row row-cols-lg-auto g-3 align-items-cente alert alert-secondary" method="post" action="modif.php">
        <p> <?= $r->nomJeu ?> </p>
        <p class="text-muted"> -<?= $controllerCateg->getCategorie($r->idCategorie) ?> </p>

        <button name="edit" value="<?= $r->getID()?>" class="btn btn-primary px-2" role="button">
            <i class="bi bi-pencil-fill" aria-hidden="true" href="index2.php"></i>
        </button>

        <button name="delete" type="submit" value="<?= $r->getID()?>" class="btn btn-danger px-2" role="button" >
            <i class="bi bi-trash-fill" aria-hidden="true"></i>
        </button>
    </form>
<?php }
?>
