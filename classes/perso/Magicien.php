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
        parent::__construct($name, $pv = 2000, $degats = 200, $resistance = 40);
        echo "<span class='messOk'>votre <span class='classe'> Magicien </span> 🧙 vient d'être crée </span> <br>";
        $this->_magie = 40;
    }

    public function getName()
    {
        parent::getNamePerso();
    }

    public function bouleDeFeu($enemy)
    {
        if ($this->_magie > 0) {
            echo "<div class='attaqueSpan'><span class='hero'>$this->_nom </span> a lancé une 🔥 (+20) sur $enemy->_nom !</div><br>";
            $this->_magie -= 20;
            $enemy->_vie -= $this->_atq - $enemy->_res + 20;

            if ($enemy->_vie <= 0) {
                echo "<div class='mort'>$enemy->_nom a finit completement carbonisé ! </div> <br>";
                echo "<div class='attaqueSpan'>Il reste $this->_magie MP a $this->_nom </div> <br>";
                $this->_xp += 50;
                echo "<h1 class='victoire'> Vous avez vaincu $enemy->_nom !</h1>";
                echo "<div class='xp'>$this->_nom a gagné 50 points d'expérience</div> <br>";
                if ($this->_xp >= 100) {
                    $this->_level += 1;
                    $this->_xp = $this->_xp - 100;
                    echo "<div class='level'>$this->_nom A gagné un niveau ! Son niveau est maintenant de $this->_level</div> <br>";
                }
            } else {
                echo "<div class='attaqueSpan'> Il reste $enemy->_vie 💗 a $enemy->_nom <br> et il reste $this->_magie 🌀 a <span class='hero'>$this->_nom </span> </div> <br>";
            }
        } else {
            echo "<div class='attaqueSpan'>Attention ! <span class='hero'>$this->_nom </span> n'a plus assez de magie pour tirer des boules de feu 🔥 </div> <br>";
        }
    }

    public function showPerso()
    {
        parent::showPerso();
        echo "<span class='special'><strong>Capacité speciale</strong> : Magie : $this->_magie 🌀</span><br>";
    }
}
