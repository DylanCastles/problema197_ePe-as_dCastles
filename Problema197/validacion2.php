<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Validacion2</title>
    <style>
        .hecho-por {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 0.8em;
            color: rgba(0, 0, 0, 0.5);
        }
        .problema {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 1.2em;
            color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body style="background: #BFBFBF; height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div class="card bg-secondary text-white" style="width: 25%; padding: 20px; display: inline;">
        <?php
            if(isset($_POST["desencriptar"])){
                // ----------- RECUPERAR VALOR -----------

                if (empty($_POST['valor'])) {
                    header('location: index.php');
                    exit();
                }

                $xI = $_POST['valor'];

                // ----------- DE X^II a X^I -----------

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

                $x = implode($proceso2);
                
                // ----------- IMPRIMIR RESULTADO -----------

                echo '<strong>X</strong> = "' . $x . '"<br><br>';

                echo '<form action="index.php" method="POST">';
                    echo '<input type="submit" name="regresar" class="btn btn-dark" value="Regresar al principio"><br>';
                echo '</form>';

            // ----------------------------------------------------------------------------------------------
            
            } elseif(isset($_POST["encriptar"])) {
                // ----------- RECUPERAR VALOR -----------

                if (empty($_POST['valor'])) {
                    header('location: index.php');
                    exit();
                }

                $xI = $_POST['valor'];
                
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


                for ($i=0; $i < $mitad; $i++) { 
                    array_push($xII, $array1[$i]);
                    if (!($parImpar === 1 && $i === $mitad - 1)) {
                        array_push($xII, $array2[$i]);
                    }
                }

                $xII = implode($xII);

                // ----------- IMPRIMIR RESULTADO -----------

                echo '<strong>X^II</strong> = "' . $xII . '"<br><br>';

                echo '<form action="index.php" method="POST">';
                    echo '<input type="submit" name="regresar" class="btn btn-dark" value="Regresar al principio"><br>';
                echo '</form>';

            } else {
                header('location: index.php');
                exit();
            }

        ?>
    </div>
    <div class="hecho-por">
        <strong>Hecho por:</strong> Dylan Castles y Erik Peñas
    </div>
    <div class="problema">
        <strong>Problema 197</strong>
    </div>
</body>
</html>

