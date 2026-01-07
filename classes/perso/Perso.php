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

    public function attaque($enemy)
    {
        $degatsBase = $this->_atq - $enemy->_res;
        // On s'assure de ne pas infliger des dégâts négatifs si la rés est trop haute
        $degatsFinal = ($degatsBase > 0) ? $degatsBase : 10; 
        
        $enemy->_vie -= $degatsFinal;

        echo "<div class='msg-action player-action'>";
        echo "⚔️ <span class='hero'>$this->_nom</span> assène un coup à <strong>$enemy->_nom</strong> (<strong>-$degatsFinal HP</strong>)";

        if ($enemy->_vie <= 0) {
            echo "<div class='mort'>$enemy->_nom s'effondre lâchement ! 💀</div>";
            $this->_xp += 50;
            echo "<div class='victoire'>✨ VICTOIRE ! +50 XP</div>";
            
            if ($this->_xp >= 100) {
                $this->_level += 1;
                $this->_xp -= 100;
                echo "<div class='level-up'>⭐ LEVEL UP ! Vous passez niveau $this->_level</div>";
            }
        } else {
            echo "<div class='hp-status'>Il reste <span class='hp-count'>$enemy->_vie 💗</span> à l'ennemi.</div>";
        }
        echo "</div>";
    }

    public function showPerso()
    {
        // On affiche les stats sous forme de mini-tableau de bord
        echo "<div class='showPerso'>";
        echo "  <div class='perso-header'><span class='nom'>$this->_nom</span> <span class='level-badge'>LVL $this->_level</span></div>";
        echo "  <div class='stats-grid'>";
        echo "    <span>❤️ $this->_vie</span>";
        echo "    <span>⚔️ $this->_atq</span>";
        echo "    <span>🛡️ $this->_res</span>";
        echo "    <span>✨ $this->_xp XP</span>";
        echo "  </div>";
        echo "</div>";
    }

    public function showEnemy()
    {
        echo "<div class='enemyBlock'>";
        echo "  <span class='enemy-name'>😈 $this->_nom</span>";
        echo "  <div class='enemy-hp'>PV: <strong>$this->_vie</strong> 💗</div>";
        echo "</div>";
    }
}