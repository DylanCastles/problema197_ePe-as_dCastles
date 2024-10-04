<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Validacion1</title>
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
            if(isset($_POST['desencriptar'])){
                // ----------- RECUPERAR VALOR -----------

                if (empty($_POST['valor'])) {
                    header('location: index.php');
                    exit();
                }

                $xII = $_POST['valor'];

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
                
                // ----------- IMPRIMIR RESULTADO -----------

                echo '<strong>X^I</strong> = "' . $xI . '"<br><br>';

                echo '<form action="validacion2.php" method="POST">';
                    echo '<input type="hidden" name="valor" value="' . $xI . '">';
                    echo '<input type="submit" name="desencriptar" class="btn btn-success" value="Desencriptar X^I -> X"><br>';
                echo '</form>';

            // ----------------------------------------------------------------------------------------------

            } elseif(isset($_POST["encriptar"])) {
                // ----------- RECUPERAR VALOR -----------

                if (empty($_POST['valor'])) {
                    header('location: index.php');
                    exit();
                }

                $x = $_POST['valor'];

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

                $xI = implode($proceso1);

                // ----------- IMPRIMIR RESULTADO -----------

                echo '<strong>X^I</strong> = "' . $xI . '"<br><br>';

                echo '<form action="validacion2.php" method="POST">';
                    echo '<input type="hidden" name="valor" value="' . $xI . '">';
                    echo '<input type="submit" name="encriptar" class="btn btn-danger" value="Encriptar X^I -> X^II"><br>';
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

