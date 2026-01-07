<?php

namespace Classes\Personnages;
use Classes\Personnages\Perso;

class Magicien extends Perso
{
    public $_magie;

    public function __construct(
        $name,
        $pv = 2000,
        $degats = 180,
        $resistance = 40
    ) {
        // Correction de l'appel parent pour utiliser les variables passées
        parent::__construct($name, $pv, $degats, $resistance);
        echo "<div class='msg-creation'>Le <span class='classe'>Magicien</span> 🧙 <strong>$name</strong> vient d'apparaître !</div>";
        $this->_magie = 40;
    }

    public function bouleDeFeu($enemy)
    {
        echo "<div class='msg-action player-action'>";
        
        if ($this->_magie >= 20) {
            $degatsFinal = $this->_atq - $enemy->_res + 20;
            $this->_magie -= 20;
            $enemy->_vie -= $degatsFinal;

            echo "🔥 <span class='hero'>$this->_nom</span> incante une <strong>Boule de Feu</strong> sur $enemy->_nom ! (<strong>-$degatsFinal HP</strong>)<br>";

            if ($enemy->_vie <= 0) {
                echo "<div class='mort'>$enemy->_nom a fini complètement carbonisé ! 🔥💀</div>";
                $this->_xp += 50;
                echo "<div class='victoire'>✨ VICTOIRE ! +50 XP</div>";
                
                if ($this->_xp >= 100) {
                    $this->_level += 1;
                    $this->_xp -= 100;
                    echo "<div class='level-up'>⭐ NIVEAU SUPÉRIEUR ! Vous êtes niveau $this->_level</div>";
                }
            } else {
                echo "Il reste <span class='hp-count'>$enemy->_vie 💗</span> à l'ennemi et <span class='mana-count'>$this->_magie 🌀 MP</span> à $this->_nom.";
            }
        } else {
            echo "<div class='warning'>⚠️ Pas assez de mana pour lancer une Boule de Feu !</div>";
        }
        
        echo "</div>"; // Fin du bloc action
    }

    public function showPerso()
    {
        echo "<div class='player-status'>";
        parent::showPerso();
        echo " <span class='mana-count'>🌀 Magie : $this->_magie</span>";
        echo "</div>";
    }
}