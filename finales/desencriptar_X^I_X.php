<?php
$mensajeInicial = "...ae.iofl..la....";
// $mensajeInicial="Ola somos Dylan y Erik.";

$arrayCaracteres = str_split($mensajeInicial);

$primerPaso = [];
$caracteres = "";
$vocales = ["a","e","i","o","u"];
$valor = "";

for ($i=0; $i < count($arrayCaracteres); $i++){
    if (in_array($arrayCaracteres[$i], $vocales)) {
        array_push($primerPaso, $arrayCaracteres[$i]);
    } else{
        $caracteres = $caracteres . $arrayCaracteres[$i];
        if (($i+1) < count($arrayCaracteres)) {
            if (in_array($arrayCaracteres[$i+1], $vocales)) {
                array_push($primerPaso, strrev($caracteres));
                $caracteres = "";
            }
        } else{
            array_push($primerPaso, strrev($caracteres));
        }
    }
}


echo "<br>";

echo implode($primerPaso);

