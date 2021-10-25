<?php

namespace Classes\Personnages;

class Perso
{
    public $_nom;
    public $_vie;
    public $_atq;
    public $_res;
    public $_xp;
    public $_level;

    public function __construct(
        $name,
        $pv,
        $degats,
        $resistance,
        $xp = 0,
        $level = 1
    ) {
        $this->_nom = $name;
        $this->_vie = $pv;
        $this->_atq = $degats;
        $this->_res = $resistance;
        $this->_xp = $xp;
        $this->_level = $level;
    }

    public function getNamePerso()
    {
        echo $this->_nom;
    }

    public function attaque($enemy)
    {
        $enemy->_vie -= $this->_atq - $enemy->_res;
        echo "⚔ <span class='hero'>$this->_nom </span> attaque $enemy->_nom ⚔ <br>";
        if ($enemy->_vie <= 0) {
            echo "<div class='mort'>$enemy->_nom est mort lachement ! </div> <br>";
            echo "<div class='attaqueSpan'>Il reste $this->_magie MP a <span class='hero'>$this->_nom </span> </div> <br>";
            $this->_xp += 50;
            echo "<h1 class='victoire'> Vous avez vaincu $enemy->_nom !</h1>";
            echo "<div class='xp'><span class='hero'>$this->_nom </span> a gagné 50 points d'expérience</div> <br>";
            if ($this->_xp >= 100) {
                $this->_level += 1;
                $this->_xp = $this->_xp - 100;
                echo "<div class='level'><span class='hero'>$this->_nom </span> A gagné un niveau ! Son niveau est maintenant de $this->_level</div> <br>";
            }
        } else {
            echo "Apres l'attaque 🤺 de <span class='hero'>$this->_nom </span> , $enemy->_nom a $enemy->_vie 💗 <br>";
        }
    }

    public function showPerso()
    {
        echo "<div  class='showPerso'><span><strong>Nom : </strong><div class='nom'>$this->_nom</div> </span> <br><span><strong>PV :</strong> $this->_vie 💗</span><br><span> <strong>points d'attaque :</strong> $this->_atq 🔪</span> <br><span><strong> Resistance : </strong>$this->_res 🛡️</span> <br><span><strong> XP : </strong>$this->_xp </span> <br><span><strong> Niveaux : </strong>$this->_level </span> <br> </div>";
    }
    public function showEnemy()
    {
        echo "<div  class='enemyBlock'><span><strong>le nom : </strong>$this->_nom </span> <br><span><strong>PV :</strong> $this->_vie 💗</span><br><span> <strong>points d'attaque :</strong> $this->_atq 🔪</span> <br><span><strong> Resistance : </strong>$this->_res 🛡️</span> <br> </div>";
    }
}

?>
