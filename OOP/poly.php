<?php

class A{
    public function sayHello(){
        return "hello. I`m A!";
    }
    public function method1(){
        $this->method2();
    }
    public function method2(){
        echo 'A<br>';
    }
}

class B extends A{
    public function sayHello(){
        return parent::sayHello().'. It was joke, I am B :)';
    }
    public function method2(){
        echo 'B<br>';
    }
}

$a = new A;
// if ($a instanceof A){
//     echo $a->sayHello().'<br>';
// }

$b = new B;

$b->method1();
// if ($b instanceof B){
//     echo $b->sayHello();
// }