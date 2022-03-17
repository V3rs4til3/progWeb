<?php

$controller = new JeuxController();
$controller = $controller->loadGames();
?>
<link rel="stylesheet" href="style.css">

<form class="row row-cols-lg-auto g-3 align-items-center">
    <h1>Ma liste de jeux</h1>

    <a class="btn btn-primary btn-circle btn-sm" href="ajouter.php" role="button">+</a>
</form>
<?php
foreach ($controller as $r){?>
    <form class="row row-cols-lg-auto g-3 align-items-cente alert alert-secondary" method="post" action="modif.php">
        <p> <?= $r->getName() ?> </p>
        <p class="text-muted"> -<?= $r->getCateg($bd) ?> </p>

        <button name="edit" value="<?= $r->getID()?>" class="btn btn-primary px-2" role="button">
            <i class="bi bi-pencil-fill" aria-hidden="true" href="index2.php"></i>
        </button>

        <button name="delete" type="submit" value="<?= $r->getID()?>" class="btn btn-danger px-2" role="button" >
            <i class="bi bi-trash-fill" aria-hidden="true"></i>
        </button>
    </form>
<?php }
?>
