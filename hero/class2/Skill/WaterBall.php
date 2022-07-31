<?php
namespace class2\Skill;

class WaterBall extends Skill
{
    function attack($targetHero, $hero)
    {
        $harm = ($hero->int / 10) + 50 - $targetHero->def;
        if($harm > 0) return $harm;
        return 0;
    }

    function getName(){
        return '水球攻擊';
    }
}
