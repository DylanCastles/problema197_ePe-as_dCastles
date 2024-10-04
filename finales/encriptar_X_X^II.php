<?php

// ----------- INPUT -----------

$x = "Aureliano Buendia";

// ----------- DE X a X^I -----------

$arrayCaracteres = str_split($x);

$proceso1 = [];
$caracteres = "";
$vocales = ["a","e","i","o","u","A","E","I","O","U"];
$valor = "";

for ($i=0; $i < count($arrayCaracteres); $i++){
    if (in_array($arrayCaracteres[$i], $vocales)) {
        array_push($proceso1, $arrayCaracteres[$i]);
    } else{
        $caracteres = $caracteres . $arrayCaracteres[$i];
        if (($i+1) < count($arrayCaracteres)) {
            if (in_array($arrayCaracteres[$i+1], $vocales)) {
                array_push($proceso1, strrev($caracteres));
                $caracteres = "";
            }
        } else{
            array_push($proceso1, strrev($caracteres));
        }
    }
}

echo "<br>";

$xI = implode($proceso1);

// ----------- DE X^I a X^II -----------


$proceso2 = str_split($xI);
$array1 = [];
$array2 = [];
$contador = 0;

$parImpar = (count($proceso2)) % 2;

if ($parImpar == 0) {
    $mitad = count($proceso2) / 2;
} else {
    $mitad = (count($proceso2) + 1) / 2;
}

for ($i=0; $i < $mitad; $i++) {
    $array1[$i] = $proceso2[$i];
}
for ($i=$mitad; $i < count($proceso2); $i++) {
    $array2[$contador] = $proceso2[$i];
    $contador = $contador + 1;
}
$array2 = array_reverse($array2);

$xII = [];
// hol la
// hloal
for ($i=0; $i < $mitad; $i++) { 
    array_push($xII, $array1[$i]);
    if (!($parImpar === 1 && $i === $mitad - 1)) {
        array_push($xII, $array2[$i]);
    }
}

$xII = implode($xII);

echo $xII;

// for ($i=0; $i < count($proceso2); $i++) { 
//     if ($i % 2 == 0) {
//         array_push($par, $proceso2[$i]);
//     }else {
//         array_push($impar, $proceso2[$i]);
//     }
// }

// $impar = strrev(implode($impar));
// $par = implode($par);

// $xI = $par . $impar;

// // ----------- RESULTADOS -----------
// echo "Resultados:<br>";
// echo "xII = " . $xII . "<br>";
// echo "xI = " . $xI . "<br>";
// echo "x = " . $x . "<br>";