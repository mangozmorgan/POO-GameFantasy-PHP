<?php
namespace Classes\Enemy;
use Classes\Personnages\Perso;
class Gobelin extends Perso
{
    public function getName()
    {
        parent::getName();
    }

    public function __construct(
        $name,
        $pv = 400,
        $degats = 60,
        $resistance = 20
    ) {
        parent::__construct($name, $pv, $degats, $resistance);
        echo "<span class='enemyCome'>Un Gobelin est apparu</span> <br>";
    }

    public function atq($enemy)
    {
        $enemy->_vie -= $this->_atq - $enemy->_res;

        echo "<div class='atqEnemy'>$this->_nom c'est vengé en jetant des cailloux sur $enemy->_nom! </span><br>";
        echo "<div class='attaqueSpan'>Il reste a <span class='hero'>$enemy->_nom </span>, $enemy->_vie 💗</span> <br> ";
    }
}
