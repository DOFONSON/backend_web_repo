<?php

abstract class AbstractClass{
    abstract public function getValue();

    public function printValue(){
        echo 'Печатаем значение '.$this->getValue();
    }
}

// $object = new AbstractClass;ошибка

class A extends AbstractClass{
    public function __construct(public $value){}
    public function getValue(){
        return $this->value;
    }
}

$ob = new A(75);
$ob->printValue();