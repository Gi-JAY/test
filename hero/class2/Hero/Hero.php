<?php
namespace Vendor\Hero\class2\Hero;

class Hero
{
    public $name;
    public $str;
    public $int;
    public $def;
    public $hp;
    public $mp;
    public $skill;

    function __construct($name, $str, $int, $def, $hp, $mp, $skill = [])
    {
        $this->name = $name;
        $this->str = $str;
        $this->int = $int;
        $this->def = $def;
        $this->hp = $hp;
        $this->mp = $mp;
        $this->skill = $skill;
    }

    function lostMp($lostVal){
        $this->mp -= $lostVal;
    }

    function lostHp($lostVal){
        $this->hp -= $lostVal;
    }
}

