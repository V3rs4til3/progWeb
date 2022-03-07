<?php
spl_autoload_register();

try {
    $bd = new PDO('mysql:dbname=test;host=host.docker.internal;port=3306', 'root', 'root');
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$query = $bd->query('SELECT * FROM categorie');
$query->setFetchMode(PDO::FETCH_CLASS, 'categorie');
$values = $query->fetchAll();
$index = 1;
?>

<link rel="stylesheet" href="style.css">

<h1>Ajouter un jeu</h1>

<form method="post" action="query.php">
    <div class="form-group">
        <label>Nom de jeux</label>
        <input type="text"
               class="form-control"
               placeholder="Call of duty"
               name="jeux">
    </div>
    <div class="form-group">
        <label class="form-label">Categorie</label>
        <select class="form-select" name="taskOption">
            <?php  foreach ($values as $r){?>
                <option value="<?= $index ?>"> <?= $r->getName() ?> </option>
            <?php
                $index++;
            } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary"> Ajouter </button>
</form>
