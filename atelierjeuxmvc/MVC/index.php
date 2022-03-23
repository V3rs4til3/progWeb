<?php
spl_autoload_register();

$controllerJeux = new \Controllers\JeuxController();
$modelJeux = new \Models\JeuxModel();
$modelJeux = $controllerJeux->loadGames();

$controllerCateg = new \Controllers\CategorieController();
$modelCateg = new \Models\CategorieModel();
$modelCateg = $controllerCateg->loadAllCategorie();

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<form class="row row-cols-lg-auto g-3 align-items-center">
    <h1>Ma liste de jeux</h1>

    <a class="btn btn-primary btn-circle btn-sm" href="ajouter.php" role="button">+</a>
</form>
<?php
foreach ($modelJeux as $r){?>
    <form class="row row-cols-lg-auto g-3 align-items-cente alert alert-secondary" method="get" action="modifier.php">
        <p> <?= $r->nomJeu ?> </p>
        <p class="text-muted"> -<?php foreach ($modelCateg as $value){
            if ($r->idCategorie == $value->id)
                echo $value->nomCategorie;
            }
            ?> </p>

        <button name="edit" value="<?= $r->id ?>" class="btn btn-primary px-2" role="button">
            <i class="bi bi-pencil-fill" aria-hidden="true" href="index2.php"></i>
        </button>

        <button name="delete" type="submit" value="<?= $r->id ?>" class="btn btn-danger px-2" role="button" >
            <i class="bi bi-trash-fill" aria-hidden="true"></i>
        </button>
    </form>
<?php }
?>
