<?php
$xII = str_split("A .O..U.....hhhhhhhh");
$par = [];
$impar = [];


for ($i=0; $i < count($xII); $i++) { 
    if ($i % 2 == 0) {
        array_push($par, $xII[$i]);
    }else {
        array_push($impar, $xII[$i]);
    }
}

$impar = implode(array_reverse($impar));

$par = implode($par);

$xI = $par . $impar;

echo $xI;
?>

<!-- AO.. -->