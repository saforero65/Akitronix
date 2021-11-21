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

    $nodo = 1;
    if (isset($_GET['n'])) {
        $nodo = $_GET['n'];
    }
    // calucalr los siguientes nodos
    $nodoSi = $nodo * 2;
    $nodoNo = $nodo * 2 + 1;
    echo 'Nodo ACTUAL: ' . $nodo;
    ?>
    <button id="mostrar" type="button" class="btn btn-primary">Mostrar Arbol</button>


    <?php


    $consulta = 'SELECT texto,pregunta,costo,probabilidad,elecciones,personas FROM arbol WHERE nodo=' . $nodo . ';';
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
                $elecciones = $fila[4];
                $personas = $fila[5];
            }
        }
    }


    ?>

    <?php

    if ($pregunta == TRUE) {

        echo " <h3>Pregunta:</h3>";
        echo "   <h2>" . $texto . " </h2>";

    ?>
        <div id="arbol_info" class="info_arbol none">
            <?php
            $personaje = '';
            require 'predic.php';
            ?>
        </div>
        <div>
            <?php
            echo '<a onclick="test(' .  $nodo . ')" class="btn btn-success" href="preguntas.php?n=' . $nodoSi . '">CLARO QUE SI</a>';

            echo '<a onclick="test2(' .  $nodo . ')"  class="btn btn-danger" href="preguntas.php?n=' . $nodoNo . '">CLARO QUE NO</a>';
            ?>
        </div>
    <?php
    } else {
        echo " <h3>Ud esta pensando en:</h3>";
        echo "   <h2>" . $texto . " </h2>";
    ?>
        <div id="arbol_info" class="info_arbol none">
            <?php

            require 'sumaPersonajes.php';
            require 'posteriori.php';
            ?>
        </div>
    <?php

        $nodo = 0;
        $nodoSi = 0;
        $nodoNo = 0;
    }
    ?>

    <p>Estoy un <span><?php echo ($probabilidad * 100) . '%'; ?></span> seguro que estas pensando en <span> <?php echo $personaje; ?> </span>
    </p>
    <?php
    echo "   <span>" . 'Costo del Nodo: ' . $costo . " </span>";
    echo "   <span>" . 'Probabilidad de que responda que si: '  . $probabilidad . " </span>";
    echo "   <span>" . 'Contador de SI: '  . $elecciones . " </span>";
    echo "   <span>" . 'Contador personas: '  . $personas . " </span>";
    ?>

    <b> </b>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        function test(nodo) {
            $.ajax({
                type: 'POST',
                url: "reporte.php",
                data: 'nodo=' + nodo,
                success: function(result) {
                    $("b").text(result);
                }
            })
        }

        function test2(nodo) {
            $.ajax({
                type: 'POST',
                url: "reporte2.php",
                data: 'nodo=' + nodo,
                success: function(result) {
                    $("b").text(result);
                }
            })
        }
    </script>
    <script>
        $("#mostrar").click(function() {

            $('#arbol_info').removeClass('none');
        });
    </script>
</body>

</html>