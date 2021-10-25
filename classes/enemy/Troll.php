<?php

namespace Classes\Enemy;
use Classes\Personnages\Perso;

class Troll extends Perso
{
    public function getName()
    {
        parent::getName();
    }

    public function __construct(
        $name,
        $pv = 700,
        $degats = 110,
        $resistance = 90
    ) {
        parent::__construct($name, $pv, $degats, $resistance);
        echo "<span class='enemyCome'>Un Troll est apparu</span> <br>";
    }

    public function atq($enemy)
    {
        $enemy->_vie -= $this->_atq - $enemy->_res;

        echo "<div class='atqEnemy'>$this->_nom a répliqué avec son marteau sur $enemy->_nom  🔨 </span> <br>";
        echo "<div class='attaqueSpan'>Il reste a $enemy->_nom , $enemy->_vie 💗</span> <br> ";
    }
}
