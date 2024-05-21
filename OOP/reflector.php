<?php

function sum($a, $b){
    return $a+$b;
}

$reflector = new ReflectionFunction('sum');
echo $reflector->getFileName().'<br>';
echo $reflector->getStartLine().'<br>';
echo $reflector->getEndLine();