<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto I.A</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <?php
    require 'conexion.php';

    #recoger numero del nodo
    $costo;
    $probabilidad;
    $intentos;
    $nodo = 1;
    if (isset($_GET['n'])) {
        $nodo = $_GET['n'];
    }
    // calucalr los siguientes nodos
    $nodoSi = $nodo * 2;
    $nodoNo = $nodo * 2 + 1;
    echo 'Nodo ACTUAL: ' . $nodo;



    $consulta = 'SELECT texto,pregunta,costo,probabilidad,intentos FROM arbol WHERE nodo=' . $nodo . ';';
    $texto = '';
    $pregunta = true;
    $resultado;
    if ($resultado = mysqli_query($db, $consulta)) {
        if ($resultado->num_rows === 0) {
            echo 'error - el nodo no existe';
        } else {
            while ($fila = mysqli_fetch_row($resultado)) {
                $texto = $fila[0];
                $pregunta = $fila[1];
                $costo = $fila[2];
                $probabilidad = $fila[3];
                $intentos = $fila[4];
            }
        }
    }


    ?>
    <?php
    if ($pregunta == TRUE) {

        echo " <h3>Pregunta:</h3>";
        echo "   <h2>" . $texto . " </h2>";
        echo "   <span>" . 'costo: ' . $costo . " </span>";
        echo "   <span>" . 'probabilidad: '  . $probabilidad . " </span>";
        echo "   <span>" . 'intentos: '  . $intentos . " </span>";
    } else {
        echo " <h3>Ud esta pensando en:</h3>";
        echo "   <h2>" . $texto . " </h2>";
        $nodo = 0;
        $nodoSi = 0;
        $nodoNo = 0;
    }
    echo "   <div>";
    echo '<a class="btn btn-success" href="preguntas.php?n=' . $nodoSi . '">CLARO QUE SI</a>';
    echo '<a class="btn btn-danger" href="preguntas.php?n=' . $nodoNo . '">CLARO QUE NO</a>';
    ?>
    </div>
    <p>Estoy un <span>-%</span> seguro que estas pensando en <span>personaje X</span> <br> sin embargo podrias estar
        pensando
        en:
    <ul>
        <li>personaje1</li>
        <li>personaje2</li>
        <li>personaje3</li>
    </ul>
    </p>


</body>

</html>