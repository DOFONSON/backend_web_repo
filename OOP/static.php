<?php

class Stat{
    public static function test(int $x){
        return "x = $x";
    }
}

// echo Stat::test(5);

$a = new Stat;
// echo $a->test(4);

class User{
    public $role;
    public $name;
    public function __construct(string $name, string $role){
        $this->name = $name;
        $this->role = $role;
    }
    public static function createAdmin(string $name){
        return new self($name, 'admin');
    }
}

$admin = new User('Ivan', 'admin');

$admin2 = User::createAdmin('olga');
// var_dump($admin2);

class Human{
    public static $count;

    public function __construct(){
        self::$count++;
    }
    public static function getCount(){
        return self::$count;
    }
}

$man = new Human;
$man2 = new Human;
$man3 = new Human;
$man4 = new Human;
$man5 = new Human;

echo Human::getCount();