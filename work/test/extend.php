<?php

class foo
{
    public function printItem($string) 
    {
        echo 'Foo: ' . $string ."</br>";
    }
    
    public function printPHP()
    {
        echo 'PHP is great.' . "</br>";
    }
}

class bar extends foo
{
    public function printItem($string)
    {
        echo 'Bar: ' . $string . "</br>";
    }
}

$foo = new foo();
$bar = new bar();
$foo->printItem('baz'); // Output: 'Foo: baz'
$foo->printPHP();       // Output: 'PHP is great' 
$bar->printItem('baz'); // Output: 'Bar: baz'
$bar->printPHP();       // Output: 'PHP is great'

?>