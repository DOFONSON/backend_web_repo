<?php

class Cat{
    // public $name;
    private $lapki;
    private $color;

    // public function __construct(string $name){
        // $this->name = $name;
    // }

    public function __construct(public $name){}

    public function setColor(string $color){
        $this->color = $color;
    } 

    public function getColor(){
        return $this->color;
    }

    public function sayHello(){
        echo 'Myau. I`m '.$this->name;
    }
}

$cat = new Cat('murka');
$cat1 = new Cat('barsik');
$cat->name = 'zaika';
$cat->setColor('black');
echo $cat->getColor();
// $cat->sayHello();
$cat1->sayHello();
// var_dump($cat);