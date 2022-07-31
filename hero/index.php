<?php
// require 'class2/Hero/Hero.php';
// require 'class2/Skill/Skill.php';
// require 'class2/Skill/SpiralPills.php';
// require 'class2/Skill/Strike.php';
// require 'class2/Skill/WaterBall.php';
// require 'class2/Battle.php';

require 'vendor/autoload.php';
use class2\Battle;
use class2\Hero\Hero;
use class2\Skill\Strike;
use class2\Skill\WaterBall;
use class2\Skill\SpiralPills;



$jay = new Hero('jay', 100, 50, 20, 500, 300, [new WaterBall, new SpiralPills]);
$ace = new Hero('ace', 200, 26, 50, 200, 500, [new Strike, new WaterBall]);

$battle = new Battle($jay, $ace);
$battle->BattleStar();