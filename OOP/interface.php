<?php

    interface CalculateSquare{
        public function calculateSquare(): float;
    };


    class Rectangle implements CalculateSquare{
        public function __construct(public $x, public $y){}

        public function calculateSquare(): float
        {
            return $this->x * $this->y;
        }
    }

    class Circle implements CalculateSquare{
        const PI = 3.14;
        public function __construct(public $r){}
        public function calculateSquare(): float
        {
            // $pi = 3.14;
            return self::PI * ($this->r**2);
        }
    }

    class Square {
        public function __construct(public $x){}
        // public function calculateSquare(): float
        // {
        //     return $this->x * $this->x;
        // }
    }

    $data = [
        $circle = new Circle(3),
        $square = new Square(5),
        $rectsngle = new Rectangle(3,4)
    ];
    foreach($data as $elem){
        if ($elem instanceof CalculateSquare){
            echo $elem->calculateSquare().'<br>';
        }
    }