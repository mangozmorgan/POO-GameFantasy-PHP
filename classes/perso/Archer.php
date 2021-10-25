<?php
namespace Classes\Personnages;
use Classes\Personnages\Perso;

class Archer extends Perso
{
    public $_fleches;

    public function getName()
    {
        parent::getName();
    }

    public function __construct(
        $name,
        $pv = 1200,
        $degats = 175,
        $resistance = 60
    ) {
        parent::__construct($name, $pv, $degats, $resistance);
        echo "<span class='messOk'>votre <span class='classe'> Archer </span>🏹 vient d'être crée </span> <br>";
        $this->_fleches = 50;
    }

    public function fleche($enemy)
    {
        $enemy->_vie -= $this->_atq - $enemy->_res + 15;
        $this->_fleches -= 5;
        if ($enemy->_vie <= 0) {
            echo "<div class='mort'>$enemy->_nom est mort sous une pluie de fleches ! </div> <br>";
            echo "<div class='attaqueSpan'>Il reste $this->_fleches fleches a $this->_nom </div> <br>";
            $this->_xp += 30;
            echo "<h1 class='victoire'> Vous avez vaincu $enemy->_nom !</h1>";
            echo "<div class='xp'>$this->_nom a gagné 50 points d'expérience</div> <br>";
            if ($this->_xp >= 100) {
                $this->_level += 1;
                $this->_xp = $this->_xp - 100;
                echo "<div class='level'>$this->_nom A gagné un niveau ! Son niveau est maintenant de $this->_level</div> <br>";
            }
        } else {
            echo "$this->_nom a tiré des fleches sur $enemy->_nom! 🏹<br>";
            echo "Il reste a $enemy->_nom , $enemy->_vie 💗 <br> Il reste  $this->_fleches flèches a $this->_nom <br>";
        }
    }

    public function showPerso()
    {
        parent::showPerso();
        echo "<span class='special'><strong>Capacité speciale</strong> : Fleches : $this->_fleches 🏹</span><br>";
    }
}
