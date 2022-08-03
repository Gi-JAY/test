<?php
namespace Vendor\Hero\class2\Skill;

class Strike extends Skill
{
    function attack($targetHero, $hero)
    {
        $harm = ($hero->str/10) + 20 - $targetHero->def;
        if($harm > 0) return $harm;
        return 0;
    }

    function getName()
    {
        return '撞擊';
    }
}
