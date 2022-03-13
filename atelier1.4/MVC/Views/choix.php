<?php
require_once '../Models/EtreVivant.php';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<h1>Atelier 1.4</h1>
<form method="post" action="jouer.php">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="classes" value="guerrier" checked>
        <label class="form-check-label" for="flexRadioDefault1"> Guerrier </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="classes" value="assassin">
        <label class="form-check-label" for="flexRadioDefault2"> Assassin </label>
    </div>

    <button type="submit" class="btn btn-danger"> Jouer </button>
</form>