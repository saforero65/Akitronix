
<?php
function consultaProbabilidad($nodoconsulta)
{
    require 'conexion.php';

    $consulta = 'SELECT nodo,elecciones,personas FROM arbol WHERE nodo=' . $nodoconsulta . ';';
    $texto = '';
    $pregunta = true;
    $resultado;
    $array = [];
    if ($resultado = mysqli_query($db, $consulta)) {
        if ($resultado->num_rows === 0) {
            echo 'error - el nodo no existe :' . $nodoconsulta;
        } else {

            while ($fila = mysqli_fetch_row($resultado)) {
                $nodo = $fila[0];
                $elecciones = $fila[1];
                $personas = $fila[2];

                $array = [$fila[0], $fila[1], $fila[2]];

                if ($array[2] == 0) {
                    $probabilidad = 0;
                } else {

                    $probabilidad = ($array[1] / $array[2]);
                }
                echo $probabilidad;

                updateProbabilidad($nodo, $probabilidad);
            }
        }
    }
    // echo $array[1];
    return $array;
}

function consultaProbabilidadTodo()
{
    require 'conexion.php';

    $consulta = 'SELECT nodo,elecciones,personas FROM arbol ;';
    $texto = '';
    $pregunta = true;
    $resultado;
    $array = [];
    if ($resultado = mysqli_query($db, $consulta)) {
        if ($resultado->num_rows === 0) {
            echo 'error - el nodo no existe :' . $nodoconsulta;
        } else {

            while ($fila = mysqli_fetch_row($resultado)) {
                $nodo = $fila[0];
                $elecciones = $fila[1];
                $personas = $fila[2];

                $array = [$fila[0], $fila[1], $fila[2]];

                if ($array[2] == 0) {
                    $probabilidad = 0;
                } else {

                    $probabilidad = ($array[1] / $array[2]);
                }
                echo $probabilidad;

                updateProbabilidad($nodo, $probabilidad);
            }
        }
    }
    // echo $array[1];
    return $array;
}

function updateProbabilidad($nodoconsulta, $probabilidad)
{
    require 'conexion.php';

    $sql = "UPDATE arbol SET probabilidad='$probabilidad' WHERE nodo='$nodoconsulta'";

    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully probabilidad PRIORI";
    } else {
        echo "Error updating record: " . $db->error;
    }
    $db->close();
}

consultaProbabilidad($nodo);
if ($pregunta == false) {
    consultaProbabilidadTodo();
}
