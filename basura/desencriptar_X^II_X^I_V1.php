<?php
$mensajeEncriptado = str_split("HkoilraE");
$par = [];
$impar = [];
$primeraEntrada = true;

for ($i=0; $i < count($mensajeEncriptado); $i++) { 
    if ($i % 2 == 0) {
        array_push($par, $mensajeEncriptado[$i]);
    }else {
        if ($primeraEntrada){
            $posicion = (count($mensajeEncriptado))-1;
            $primeraEntrada = false;
        }else {
            $posicion = $posicion - 2;
        }
        array_push($impar, $mensajeEncriptado[$posicion]);
    }
}

echo "Valores pares:";
foreach ($par as $letraPar) {
    echo $letraPar;
}
echo "<br>";
echo "Valores impares:";
foreach ($impar as $letraImpar) {
    echo $letraImpar;
}


?>