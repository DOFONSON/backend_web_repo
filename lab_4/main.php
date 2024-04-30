<?php
session_start();

if (!empty($_POST['problem'])) {
    $problem = $_POST['problem'];
    $result = calculator(bracket($problem)); 
    echo $result; 
}

function calculator($problem) {
    switch (true){
        case substr_count($problem, '+') > 0: 
            $plus = explode('+', $problem); 
            $result = calculator($plus[0]); 
            foreach (array_slice($plus, 1) as $elem) {
                $result += calculator($elem); 
            }
            return $result;
        case substr_count($problem, '-') > 0: 
            $minus = explode('-', $problem);
            $result = calculator($minus[0]);
            foreach (array_slice($minus, 1) as $elem) {
                $result -= calculator($elem);
            }
            return $result;
        case substr_count($problem, '*') > 0:
            $multi = explode('*', $problem);
            $result = calculator($multi[0]);
            foreach (array_slice($multi, 1) as $elem) {
                $result *= calculator($elem);
            }
            return $result;
        case substr_count($problem, '/') > 0:
            $division = explode('/', $problem);
            $result = calculator($division[0]);
            foreach (array_slice($division, 1) as $elem) {
                $result /= calculator($elem);
            }
            return $result;
        case substr_count($problem, 'sin') > 0:
            return sin(calculator(getBracket($problem, 'sin')));
        case substr_count($problem, 'cos') > 0:
            return cos(calculator(getBracket($problem, 'cos')));
        case substr_count($problem, 'tan') > 0:
            return tan(calculator(getBracket($problem, 'tan')));
        default: return (float)$problem; 
    }
}

function getBracket($problem, $func) {
    $openBracket = strpos($problem, $func.'(');
    $closeBracket = strpos(substr($problem, $openBracket), ')');
    return substr($problem, $openBracket+strlen($func)+1, $closeBracket-1);
}

function bracket($problem) {
    while (substr_count($problem, '(') > 0) { 
        $closeBracket = strpos($problem, ')');
        $openBracket = strrpos(substr($problem, 0, $closeBracket), '('); 
        $problem = substr_replace($problem, calculator(substr($problem, $openBracket+1, $closeBracket-$openBracket+1)), $openBracket, $closeBracket-$openBracket+1); 
    }
    return $problem;
}
?>