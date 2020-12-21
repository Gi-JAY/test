<?php
class C {}
class D extends C {}

// This doesn't extend C.
class E {}

function f(E $c) {
    echo get_class($c)."\n";
}

// f(new C);
// f(new D);
f(new E);
?>