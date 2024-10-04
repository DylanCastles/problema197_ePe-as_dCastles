<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <div class="card bg-secondary text-white" style="width: 25%; padding: 20px;">
        <h1>Codigo Secreto</h1>
        <form action="validacion1.php" method="post" style="align-items: center;">
            
            <label for="valor" class="form-label">Escribe el mensaje:</label>
            <input type="text" class="form-control" size="25" id="valor" name="valor" placeholder='X o X"'><br>
            
            <input type="submit" name="desencriptar" class="btn btn-success" value="Desencriptar X^II -> X^I" style="margin-left: auto; margin-right:auto"><br><br>
            <input type="submit" name="encriptar" class="btn btn-danger" value="Encriptar X -> X^I">
             
        </form>
    </div>
    <div class="hecho-por">
        <strong>Hecho por:</strong> Dylan Castles y Erik Peñas
    </div>
    <div class="problema">
        <strong>Problema 197</strong>
    </div>
</body>
</html>
