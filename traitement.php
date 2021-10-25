<?php

/**
 * 🚨 Je dois définir les includes AVANT la variable de session
 * src : https://stackoverflow.com/a/23332388/16995268
 */
include './classes/perso/Perso.php';
include './classes/perso/Magicien.php';
include './classes/perso/Archer.php';
include './classes/enemy/Troll.php';
include './classes/enemy/Gobelin.php';

session_start();

use Classes\Personnages\Magicien;
use Classes\Enemy\Troll;
use Classes\Enemy\Gobelin;
use Classes\Personnages\Archer;

header('Content-Type: application/json; charset=utf-8');

$contentType = isset($_SERVER['CONTENT_TYPE'])
    ? trim($_SERVER['CONTENT_TYPE'])
    : '';

if ($contentType === 'application/json') {
    //Receive the RAW post data.
    $content = trim(file_get_contents('php://input'));
    $input = json_decode(file_get_contents('php://input'), true);
    $decoded = json_decode($content, true);
    $createPersoArray = [];
    foreach ($input as $key => $val) {
        $createPersoArray[] = $val;
    }
    /**
     * Ici, je débug, ce que je reçoit
     *   echo 'CreatePerso : <pre>' . print_r($createPersoArray, true) . '</pre>';
     */
    if (isset($createPersoArray[2])) {
        if ($createPersoArray[2] === 'createPerso') {
            if ($createPersoArray[1] === 'archer') {
                $user = new Archer($createPersoArray[0]);
                $_SESSION['player'] = $user;
                echo json_decode($user->showPerso());
            } elseif ($createPersoArray[1] === 'magicien') {
                $user = new Magicien($createPersoArray[0]);
                $_SESSION['player'] = $user;
                echo json_decode($user->showPerso());
            }
        }
        if ($createPersoArray[2] === 'createEnemy') {
            if ($createPersoArray[1] === 'gobelin') {
                $user = new Gobelin($createPersoArray[0]);
                $_SESSION['enemy'] = $user;
                echo json_decode($user->showEnemy());
            } elseif ($createPersoArray[1] === 'troll') {
                $user = new Troll($createPersoArray[0]);
                $_SESSION['enemy'] = $user;
                echo json_decode($user->showEnemy());
            }
        } elseif ($createPersoArray[2] === 'BDF') {
            $_SESSION['player']->bouleDeFeu($_SESSION['enemy']);
            if ($_SESSION['enemy']->_vie <= 0) {
                echo 'DEAD';
                $_SESSION['player']->showPerso();
            } else {
                $_SESSION['enemy']->atq($_SESSION['player']);
                $_SESSION['player']->showPerso();
                $_SESSION['enemy']->showEnemy();
            }
        } elseif ($createPersoArray[2] === 'ATQ') {
            $_SESSION['player']->attaque($_SESSION['enemy']);
            if ($_SESSION['enemy']->_vie <= 0) {
                echo 'DEAD';
                $_SESSION['player']->showPerso();
            } else {
                $_SESSION['enemy']->atq($_SESSION['player']);
                $_SESSION['player']->showPerso();
                $_SESSION['enemy']->showEnemy();
            }
        } elseif ($createPersoArray[2] === 'PDF') {
            $_SESSION['player']->fleche($_SESSION['enemy']);
            if ($_SESSION['enemy']->_vie <= 0) {
                echo 'DEAD';
                $_SESSION['player']->showPerso();
            } else {
                $_SESSION['enemy']->atq($_SESSION['player']);
                $_SESSION['player']->showPerso();
                $_SESSION['enemy']->showEnemy();
            }
        }
    }
} else {
    echo 'kiki';
}

//echo json_encode( $test->showPerso());
