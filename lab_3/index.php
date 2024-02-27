<?php 
$a =  'X / 22 = 220';
echo $a.'<br/>';
$strings =  explode(' ', $a);
$strings =  implode(' ', $strings);
$strings =  explode('X', $strings);
$strings =  implode(' ', $strings);
$strings =  explode('=', $strings);
$strings =  implode(' ', $strings);
$strings =  explode(' ', $strings);

if ($strings[1] != '+' && $strings[1] != '-' && $strings[1] != '/' && $strings[1] != '*') {
    switch ($strings[2]) {
        case  '+':
            echo 'X = '.(end($strings) - $strings[3]);
            break;
        case  '/':
            echo 'X = '.($strings[3] * end($strings));
            break;
        case  '-':
            echo 'X = '.($strings[3] + end($strings));
            break;
        case  '*':
            echo 'X = '.(end($strings) / $strings[3]);
            break;
    };
}
else {
    switch ($strings[1]) {
        case  '+':
            echo 'X = '.(end($strings) - $strings[0]);
            break;
        case  '/':
            echo 'X = '.($strings[0] / end($strings));
            break;
        case  '-':
            echo 'X = '.($strings[0] + end($strings));
            break;
        case  '*':
            echo 'X = '.(end($strings) / $strings[0]);
            break;
    };
}

?>