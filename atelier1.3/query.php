<?php
spl_autoload_register();
try {
    $bd = new PDO('mysql:dbname=test;host=host.docker.internal;port=3306', 'root', 'root');
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

if(isset($_POST['jeux']) && isset($_POST['taskOption'])){
    $query= $bd->query("INSERT INTO jeux (nom, idCateg) VALUES( '" . $_POST['jeux']. "' , '"  . $_POST['taskOption'] . "' )");
    $query->execute();
    header('location: index.php');
}

else if(isset($_POST['editJeux']) && isset($_POST['editTaskOption']) && isset($_POST['editID'])){
    echo '$id';
    $query= $bd->query('UPDATE jeux SET nom = ' . $_POST['editJeux'] . ' , idCateg = ' . $_POST['editTaskOption'] . ' WHERE  id = ' . $_POST['editID']);
    $query->execute();

}
