<?php
namespace class2;

use class2\Hero\Hero;

class Battle
{
    public $hero1;
    public $hero2;

    function __construct(Hero $hero1,Hero $hero2)
    {
        $this->hero1 = $hero1;
        $this->hero2 = $hero2;
    }

    function BattleStar()
    {
        $rand = rand(0, 1); //隨機決定先後
        if($rand = 1){
            $firstHero = $this->hero1;
            $secondHero = $this->hero2;
        }else{
            $firstHero = $this->hero2;
            $secondHero = $this->hero2;
        }

        while(1){
            $skill = $firstHero->skill[\array_rand($firstHero->skill)]; //隨機技能
            $harm = $skill->attack($secondHero, $firstHero); //隨機技能傷害
            $secondHero->lostHp($harm);
            if($secondHero->hp > 0){
                echo \sprintf('%s使用了%s,%s受到%s點傷害,剩餘%sHP<br>', $firstHero->name, $skill->getName(), $secondHero->name, $harm, $secondHero->hp);      
            }
            if($secondHero->hp <= 0){
                echo \sprintf('%s使用了%s,%s受到%s點傷害,剩餘%sHP<br>', $firstHero->name, $skill->getName(), $secondHero->name, $harm, 0);      
                echo \sprintf('遊戲結束,勝利者為%s', $firstHero->name);
                return;
            }

            $skill = $secondHero->skill[\array_rand($secondHero->skill)]; //隨機技能
            $harm = $skill->attack($firstHero, $secondHero); //隨機技能傷害
            $firstHero->lostHp($harm);
            if($firstHero->hp > 0){
                echo \sprintf('%s使用了%s,%s受到%s點傷害,剩餘%sHP<br><br>', $secondHero->name, $skill->getName(), $firstHero->name, $harm, $firstHero->hp);  
            }
            if($firstHero->hp <= 0){
                echo \sprintf('%s使用了%s,%s受到%s點傷害,剩餘%sHP<br><br>', $secondHero->name, $skill->getName(), $firstHero->name, $harm, 0);  
                echo \sprintf('遊戲結束,勝利者為%s', $secondHero->name);
                return;
            }
        }
    }
}
