<?php
namespace Classes\Personnages;
use Classes\Personnages\Perso;

class Archer extends Perso
{
    public $_fleches;

    public function __construct(
        $name,
        $pv = 1200,
        $degats = 175,
        $resistance = 60
    ) {
        parent::__construct($name, $pv, $degats, $resistance);
        // On entoure le message de création pour le log
        echo "<div class='msg-creation'>L'Archer <span class='classe'>Archer</span> <strong>$name</strong> 🏹 entre dans l'arène !</div>";
        $this->_fleches = 50;
    }

    public function fleche($enemy)
    {
        $degatsFinal = $this->_atq - $enemy->_res + 15;
        $enemy->_vie -= $degatsFinal;
        $this->_fleches -= 5;

        echo "<div class='msg-action player-action'>";
        echo "<strong>$this->_nom</strong> lance une <span class='special-txt'>Pluie de flèches</span> sur <strong>$enemy->_nom</strong> ! 🏹 (<strong>-$degatsFinal HP</strong>)<br>";
        
        if ($enemy->_vie <= 0) {
            echo "<div class='mort'>$enemy->_nom s'écroule sous les flèches...</div>";
            $this->_xp += 30;
            echo "<div class='victoire'>✨ Victoire ! $this->_nom gagne 30 XP.</div>";
            
            if ($this->_xp >= 100) {
                $this->_level += 1;
                $this->_xp -= 100;
                echo "<div class='level-up'>⭐ LEVEL UP ! Niveau $this->_level</div>";
            }
        } else {
            echo "Il reste <span class='hp-count'>$enemy->_vie 💗</span> à l'ennemi.";
        }
        echo "</div>"; // Fin du bloc action
    }

    public function showPerso()
    {
        // On crée un petit badge de statut pour le joueur
        echo "<div class='player-status'>";
        parent::showPerso(); // Affiche Nom, PV, etc.
        echo " <span class='ammo-count'>🏹 Munitions : $this->_fleches</span>";
        echo "</div>";
    }
}