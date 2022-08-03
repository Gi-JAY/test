<?php
namespace Vendor\Hero\class2\Skill;

class SpiralPills extends Skill
{
    function attack($targetHero, $hero)
    {
        $harm = $hero->str/10 + $hero->int/10 + 50 - $targetHero->def;
        if($harm > 0) return $harm;
        return 0;
    }

    function getName()
    {
        return '螺旋丸';
    }

}
