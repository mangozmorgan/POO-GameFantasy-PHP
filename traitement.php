<?php
include './classes/perso/Perso.php';
include './classes/perso/Magicien.php';
include './classes/perso/Archer.php';
include './classes/enemy/Troll.php';
include './classes/enemy/Gobelin.php';

session_start();

use Classes\Personnages\Magicien;
use Classes\Personnages\Archer;
use Classes\Enemy\Troll;
use Classes\Enemy\Gobelin;

// On définit le type de réponse (HTML car on renvoie des morceaux d'UI)
header('Content-Type: text/html; charset=utf-8');

$content = file_get_contents('php://input');
$data = json_decode($content, true);

if ($data && isset($data['commande'])) {
    $cmd = $data['commande'];
    $nom = $data['nom'] ?? '';
    $classe = $data['classe'] ?? '';

    switch ($cmd) {
        case 'createPerso':
            if ($classe === 'archer') {
                $_SESSION['player'] = new Archer($nom);
            } else {
                $_SESSION['player'] = new Magicien($nom);
            }
            // On renvoie directement le HTML du perso
            echo $_SESSION['player']->showPerso();
            break;

        case 'createEnemy':
            if ($classe === 'gobelin') {
                $_SESSION['enemy'] = new Gobelin($nom);
            } else {
                $_SESSION['enemy'] = new Troll($nom);
            }
            echo $_SESSION['enemy']->showEnemy();
            break;

        case 'ATQ':
        case 'BDF':
        case 'PDF':
            $player = $_SESSION['player'];
            $enemy = $_SESSION['enemy'];

            // Exécution de l'action joueur
            if ($cmd === 'ATQ') $player->attaque($enemy);
            if ($cmd === 'BDF') $player->bouleDeFeu($enemy);
            if ($cmd === 'PDF') $player->fleche($enemy);

            // Vérification mort ennemi
            if ($enemy->_vie <= 0) {
                echo "DEAD <div class='msg system'>💀 {$enemy->_nom} a succombé !</div>";
                echo $player->showPerso();
            } else {
                // Contre-attaque
                $enemy->atq($player);
                
                // On renvoie l'état des deux pour le log
                echo "<div class='combat-bundle'>";
                echo $player->showPerso();
                echo $enemy->showEnemy();
                echo "</div>";
            }
            break;
    }
} else {
    echo "Erreur : Données invalides";
}