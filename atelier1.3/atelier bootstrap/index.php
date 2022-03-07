<?php
$nbJeux = 0;
if (isset($_GET['nb1'])){
    $nbJeux =  strval($_GET['nb1']);
}
$nb2 = NULL;
if (isset($_POST['nb2'])){
    $nb2 =  intval($_POST['nb2']);
}
$nb3 = NULL;
if (isset($_POST['nb3'])){
    $nb3 =  intval(($_POST['nb3']));
}
$game = array('GTA', 'COD', 'Battlefield', 'Apex Legends', 'Warzone', 'PUBG');

/*declare(strict_types=1);
 *
 *
 * const EPSILON = 0.00001;$a = 1234;
$a = 0127; //base 8
$a = 0x12A; //base 16
$a = 0b010101; //binaire
$a = 9_000_001;
echo "<br>";
var_dump($a);
$a = 8;
$b = 6.4;
$c = $a - $b;
var_dump(floatEquals($c, 1.6));

function floatEquals(float $nb1, float $nb2): bool {
    return abs($nb1 - $nb2) < EPSILON;
}
$nom = 'patate rouge';
$s1 = 'Mon nom est ' . $nom;
$s2 = "Mon nom est ${nom}";
echo "$s1";
echo "<br>";
echo "$s2";
$tab = array(1,'blabla',3,4);
$tab[4] = 8;
$tab[0] = 0;
$tab[10] = 9;
unset($tab[10]);
$tab[] = 8;
$tab['toto'] = 'titi';
echo "<pre>";
foreach ($tab as $key => $item){
    echo $key . '-' . $item . "\n";
}
print_r($tab);

var_dump($tab);

$a = ' ';
test(intval($a));
$a = null;
var_dump(empty($a));
var_dump(isset($a));
var_dump(empty($a));
function test(int $nb): void {
    var_dump($nb);
};

$age = 50;

$prix = match(true){
    $age >= 65 => 20,
    $age <= 18 => 25,
    default => 50
};

echo $age > 50 ? 'vieux' : 'jeune';
$tab = [1];
echo $tab[1] ?? 'a chier';

affichertTab(1,2,5,67,9);

function affichertTab(int ...$tab) : void {
    var_dump($tab);
}



function nomComplet(string $nom, string $prenom): string{ return $prenom . ' ' . $nom;
}

function estMajeur(int $age): ?bool { return $age < 0 ? null : $age >= 18;
}

function plusGrand(int $nb1, int $nb2, int ...$tab): int{
    $max = $nb1 > $nb2 ? $nb1 : $nb2;
    foreach ($tab as $item) {
        if ($item > $max)
            $max = $item;
    }
    return $max;
}

echo pgcd(81 , 18);

function pgcd(int $nb1, int $nb2): int{
    var_dump($nb1, $nb2);
    if($nb1 == 0 || $nb2 == 0)
        return $nb1 == 0 ? $nb2 : $nb1;

    if ($nb1 == $nb2)
        return $nb1;

    if ($nb1 > $nb2)
        return pgcd($nb1 - $nb2, $nb2);
    return pgcd($nb1, ($nb2 - $nb1));
}

function ppcm(int $nb1, int $nb2): int{
    if($nb1 == 0 || $nb2 == 0)
        return $nb1 == 0 ? $nb2 : $nb1;

    if ($nb1 == $nb2)
        return $nb1;
    if ($nb1 > $nb2){}
        //return pgcd($nb1 +$nb1, $nb2);
    //return pgcd($nb1, ($nb2 + $nb2));
    return 0;
}
$nb  = rand(-10,10);
?>
<?php if ($nb != 0){ ?>
    <div class="alert alert-<?= $nb < 0 ? 'danger' : 'success' ?>">
        <?php if ($nb < 0) { ?>
            le nombre <?= $nb ?> est invalide
        <?php } else { ?>
            le nombre <?= $nb ?> est <?= $nb % 2 == 0 ? 'pair' : 'impair' ?>
        <?php }?>
    </div>
<?php }?>

<link rel="stylesheet" href="style.css">
<form method="post" action="modif.php">
    <div class="form-group">
        <label for="nb1">Nombre 1</label>
        <input class="form-control"
               type ="text"
               id="nb1"
               name="nb1">
    </div>
    <div class="form-group">
        <label for="nb2">Nombre 2</label>
        <input class="form-control"
               type ="text"
               id="nb2"
               name="nb2">
    <button type="submit"
            class="btn btn-success">
        Envoyer
    </button>
</form>*/
?>

<link rel="stylesheet" href="style.css">
<h1> Jeux </h1>
<form method="get" action="index.php">
    <div class="form-group ">
        <label for="nb1">Filtre</label>
        <input class="form-control mx-2"
               type ="text"
               id="nb1"
               name="nb1">
    </div>
    <button type="submit"
            class="btn btn-primary">
        Filtrer
    </button>
</form>

<?php if($nbJeux){
    $recherche = $nbJeux;
    foreach ($game as $jeux){
        if(preg_match('/' . strtolower($recherche) . '/', strtolower($jeux), $matches)) { ?>
            <ul class="list-group mx-2">
                <li class="list-group-item mx-2 w-25">
                    <?= $jeux?>
                </li>
            </ul>
        <?php }
    }
}
else{
    foreach ($game as $jeux){ ?>
        <ul class="list-group mx-2">
            <li class="list-group-item mx-2 w-25">
                <?= $jeux?>
            </li>
        </ul>
    <?php }
}?>
<form method="post" action="index.php">
    <h1>
        Calcul PPCM ET PGCD
    </h1>
    <div class="form-group ">
        <label for="nb2">Nombre 1</label>
        <input class="form-control mx-2"
               type ="text"
               id="nb2"
               name="nb2"
               value=" <?php if ($nb2) echo $nb2?>">
    </div>
    <div class="form-group ">
        <label for="nb3">Nombre 2</label>
        <input class="form-control mx-2"
               type ="text"
               id="nb3"
               name="nb3"
               value=" <?php if ($nb3) echo $nb3?>">
    </div>

    <div class="mb-3">
    <fieldset disabled>
        <label for="disabledTextInput" class="form-label"> PGCD </label>

    <input type="text" id="disabledTextInput" class="form-control" placeholder="
    <?php if ($nb2 & $nb3)
        echo $pgcd = pgcd($nb2, $nb3); ?> ">
    </fieldset>
    </div>
    <div class="mb-3">
     <fieldset disabled>
        <label for="disabledTextInput" class="form-label"> PPCM </label>

        <input type="text" id="disabledTextInput" class="form-control" placeholder="
        <?php if ($nb2 & $nb3)
            echo $ppcm = ppcm($nb2, $nb3); ?> ">
    </fieldset>
    </div>
    <button type="submit"
            class="btn btn-primary">
        Filtrer
    </button>

</form>

    <h1>Trouver votre nom</h1>
    <p>La reponse vous etonnera!</p>
    <form method="post" action="index2.php">
        <div class="form-group ">
            <label for="nb1">Prenom</label>
            <input class="form-control mx-2"
                   type ="text"
                   id="prenom"
                   name="prenom">
        </div>
        <div class="form-group ">
            <label for="nb1">Nom</label>
            <input class="form-control mx-2"
                   type ="text"
                   id="nom"
                   name="nom">
        </div>
        <button type="submit"
                class="btn btn-primary">
            Filtrer
        </button>
    </form>

<?php
function pgcd(int $nb1, int $nb2): int{
    if($nb1 == 0 || $nb2 == 0)
        return $nb1 == 0 ? $nb2 : $nb1;

    if ($nb1 == $nb2)
        return $nb1;

    if ($nb1 > $nb2)
        return pgcd($nb1 - $nb2, $nb2);
    return pgcd($nb1, ($nb2 - $nb1));
}

function ppcm(int $nb1, int $nb2): int{
    $res = $nb1 * $nb2;
    while($nb1 > 1){
        $r = $nb1 % $nb2;
        if($r == 0 ){
            $result = $res / $nb2;
            break;  // sorti quand résultat trouvé
        }
        $nb1 = $nb1;
        $nb2 = $r;
    }
    return $result; // retourne le résultat
}
