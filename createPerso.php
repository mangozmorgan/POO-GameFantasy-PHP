
<?php
//include 'jeuxLoic2.php';

include './classes/perso/Perso.php';
include './classes/perso/Magicien.php';
include './classes/perso/Archer.php';
include './classes/enemy/Troll.php';
include './classes/enemy/Gobelin.php';

use Classes\Personnages\Magicien;
use Classes\Enemy\Troll;
use Classes\Enemy\Gobelin;
use Classes\Archer;

$name = $_POST['nomPerso'];

if ($_POST['type'] === 'magicien') {
    $first = new Magicien("$name 🧙");
    $first->showPerso();
} elseif ($_POST['type'] === 'archer') {
    $first = new Archer("$name 🚶");
    $first->showPerso();
} elseif ($_POST['type'] === 'gobelin') {
    $enemy = new Gobelin('Gobgob');
    $enemy->showEnemy();
} elseif ($_POST['type'] === 'troll') {
    $enemy = new Troll('Tewan');
    $enemy->showEnemy();
} elseif ($_POST['type'] === 'atq') {
    $user->showPerso();
}
?>

