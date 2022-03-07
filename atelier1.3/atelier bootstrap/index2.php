<?php
$name = false;
$firstname = false;
if ($_POST['nom'] & $_POST['prenom']){
   $name = strval($_POST['nom']);
   $firstname = strval($_POST['prenom']);
}
else{
    header('location: index.php');
}
?>

<h1>Votre nom</h1>

<?php if($name & $firstname) {
    echo nomComplet($name, $firstname);
    echo "</br>";
}
?>

<a href="index.php">Retour au formulaire</a>

<?php
function nomComplet(string $nom, string $prenom): string{ return $prenom . ' ' . $nom;
}