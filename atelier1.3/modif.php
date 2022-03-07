<?php
spl_autoload_register();
try {
    $bd = new PDO('mysql:dbname=test;host=host.docker.internal;port=3306', 'root', 'root');
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

if(isset($_POST['delete'])){
    $toDelete = $_POST['delete'];
    $query = $bd->query("DELETE FROM jeux WHERE id = '" . $toDelete . "'");
    $query->execute();
    header('location: index.php');
}
else if (isset($_POST['edit'])){;
    $query = $bd->query('SELECT * FROM categorie');
    $query->setFetchMode(PDO::FETCH_CLASS, 'categorie');
    $values = $query->fetchAll();
    $index = 1;

    $query = $bd->query('SELECT nom FROM jeux WHERE id = ' . $_POST['edit'] . ' ');
    $name = $query->fetch()[0];

    $query = $bd->query('SELECT idCateg FROM jeux WHERE id = ' . $_POST['edit'] . ' ');
    $categ = $query->fetch()[0];

    $query = $bd->query('SELECT nom FROM categorie WHERE id = ' . $_POST['edit'] . ' ');
    $categ = $query->fetch()[0];
    ?>

    <link rel="stylesheet" href="style.css">

    <h1>Modifier un jeu</h1>

    <form method="post" action="query.php">
        <div class="form-group">
            <label>Nom de jeux</label>
            <input type="text"
                   class="form-control"
                   value="<?= $name ?>"
                   name="editJeux">
        </div>
        <div class="form-group">
            <label class="form-label">Categorie</label>
            <select class="form-select" name="editTaskOption">
                <?php  foreach ($values as $r){
                    if(strcmp($r->getName(),$categ) == 0){ ?>
                        <option selected value="<?= $index ?>"> <?= $r->getName() ?> </option>
                    <?php }
                    else{ ?>
                        <option value="<?= $index ?>"> <?= $r->getName() ?> </option>
                    <?php }
                    $index++;
                } ?>
            </select>
        </div>
        <button name="editId" type="submit" class="btn btn-primary" value="<?= $id ?>" > Ajouter </button>
    </form>
<?php
}
else{
    header('location: index.php');
}