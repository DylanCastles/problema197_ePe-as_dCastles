<?php

// ----------- INPUT -----------

$xII = "Aauirnedleiua nBo";

// ----------- DE X^II a X^I -----------
$proceso1 = str_split($xII);
$par = [];
$impar = [];

for ($i=0; $i < count($proceso1); $i++) { 
    if ($i % 2 == 0) {
        array_push($par, $proceso1[$i]);
    }else {
        array_push($impar, $proceso1[$i]);
    }
}

$impar = strrev(implode($impar));
$par = implode($par);

$xI = $par . $impar;

// ----------- DE X^I a X -----------

$arrayCaracteres = str_split($xI);

$proceso2 = [];
$caracteres = "";
$vocales = ["a","e","i","o","u","A","E","I","O","U"];
$valor = "";

for ($i=0; $i < count($arrayCaracteres); $i++){
    if (in_array($arrayCaracteres[$i], $vocales)) {
        array_push($proceso2, $arrayCaracteres[$i]);
    } else{
        $caracteres = $caracteres . $arrayCaracteres[$i];
        if (($i+1) < count($arrayCaracteres)) {
            if (in_array($arrayCaracteres[$i+1], $vocales)) {
                array_push($proceso2, strrev($caracteres));
                $caracteres = "";
            }
        } else{
            array_push($proceso2, strrev($caracteres));
        }
    }
}

echo "<br>";

$x = implode($proceso2);

// ----------- RESULTADOS -----------
echo "Resultados:<br>";
echo "xII = " . $xII . "<br>";
echo "xI = " . $xI . "<br>";
echo "x = " . $x . "<br>";