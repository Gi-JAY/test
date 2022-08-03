<?php

require_once realpath('vendor/autoload.php');
use Vendor\Hero\class2\Battle;
use Vendor\Hero\class2\Hero\Hero;
use Vendor\Hero\class2\Skill\Strike;
use Vendor\Hero\class2\Skill\WaterBall;
use Vendor\Hero\class2\Skill\SpiralPills;


$jay = new Hero('jay', 100, 50, 20, 500, 300, [new WaterBall, new SpiralPills]);
$ace = new Hero('ace', 200, 26, 50, 200, 500, [new Strike, new WaterBall]);

$battle = new Battle($jay, $ace);
$battle->BattleStar();