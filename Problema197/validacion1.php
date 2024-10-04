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
            require_once('./funciones.php');
            if(isset($_POST['desencriptar'])){
                // ----------- RECUPERAR VALOR -----------

                if (empty($_POST['valor'])) {
                    header('location: index.php');
                    exit();
                }

                $xII = $_POST['valor'];

                // ----------- DE X^II a X^I -----------
                
                $xI = xII_xI($xII);

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

                $xI = x_xI($x);

                // ----------- IMPRIMIR RESULTADO -----------

                echo '<strong>X^I</strong> = "' . $xI . '"<br><br>';

                echo '<form action="validacion2.php" method="POST">';
                    echo '<input type="hidden" name="valor" value="' . $xI . '">';
                    echo '<input type="submit" name="encriptar" class="btn btn-danger" value="Encriptar X^I -> X^II"><br>';
                echo '</form>';

            } elseif (isset($_POST["desencriptar_X"])){
                // ----------- RECUPERAR VALOR -----------

                if (empty($_POST['valor'])) {
                    header('location: index.php');
                    exit();
                }

                $xII = $_POST['valor'];

                // ----------- DE X^II a X^I -----------
                $xI = xII_xI($xII);

                // ----------- DE X^I a X -----------
                $x = xI_x($xI);

                // ----------- IMPRIMIR RESULTADO -----------

                echo '<strong>X</strong> = "' . $x . '"<br><br>';

                echo '<form action="index.php" method="POST">';
                    echo '<input type="submit" name="regresar" class="btn btn-dark" value="Regresar al principio"><br>';
                echo '</form>';

            } elseif (isset($_POST["encriptar_xII"])){
                // ----------- RECUPERAR VALOR -----------

                if (empty($_POST['valor'])) {
                    header('location: index.php');
                    exit();
                }

                $x = $_POST['valor'];

                // ----------- DE X a X^I -----------
                $xI = x_xI($x);

                // ----------- DE X^I a X^II -----------
                $xII = xI_xII($xI);

                // ----------- IMPRIMIR RESULTADO -----------

                echo '<strong>X^II</strong> = "' . $xII . '"<br><br>';

                echo '<form action="index.php" method="POST">';
                    echo '<input type="submit" name="regresar" class="btn btn-dark" value="Regresar al principio"><br>';
                echo '</form>';
            }
                else {
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

