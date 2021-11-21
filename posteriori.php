<?php


function recorrido($nodo)
{
    while ($nodo >= 3) {

        if ($nodo % 2 == 0) {
            recorridopar($nodo);
            $nodo = $nodo / 2;
        } else {
            recorridoimpar($nodo);
            $nodo = ($nodo - 1) / 2;
        }
    }
}




function recorridopar($nodo)
{
    $datosconsultaActual = consulta($nodo);
    $costo_actual = $datosconsultaActual[2];
    echo  "<h4> Costo Actual: " . $costo_actual . " nodo: " . ($nodo) . "</h4>";

    $datosconsultaPadre = consulta($nodo / 2);
    $probabilidad_actual = $datosconsultaPadre[3];
    echo  "<h4> Probabilidad Actual: " . $probabilidad_actual . " nodo: " . ($nodo / 2) . "</h4>";

    $datosconsultaHermano = consulta($nodo + 1);
    $costo_hermano = $datosconsultaHermano[2];
    echo  "<h4> Costo Hermano: " . $costo_hermano . " nodo: " . ($nodo + 1) . "</h4>";

    $probabilidad_hermano = abs($probabilidad_actual - 1);
    echo  "<h4> Probabilidad Hermano: " . $probabilidad_hermano . " nodo: " . ($nodo + 1) . "</h4>";

    $costo_padre = (($probabilidad_actual * $costo_actual) + ($probabilidad_hermano * $costo_hermano));
    echo  "<h4> Resultado Costo Padre: " . $costo_padre . " nodo: " . ($nodo / 2) . "</h4>";
    updateCosto($nodo / 2, $costo_padre);
}


function recorridoimpar($nodo)
{
    $datosconsultaActual = consulta($nodo);
    $costo_actual = $datosconsultaActual[2];
    echo  "<h4> Costo Actual: " . $costo_actual . " nodo: " . ($nodo) . "</h4>";

    $datosconsultaPadre = consulta(($nodo - 1) / 2);
    $probabilidad_actual = abs($datosconsultaPadre[3] - 1);
    echo  "<h4> Probabilidad Actual: " . $probabilidad_actual . " nodo: " . (($nodo - 1) / 2) . "</h4>";

    $datosconsultaHermano = consulta($nodo - 1);
    $costo_hermano = $datosconsultaHermano[2];
    echo  "<h4> Costo Hermano: " . $costo_hermano . " nodo: " . ($nodo - 1) . "</h4>";

    $probabilidad_hermano = abs($probabilidad_actual - 1);
    echo  "<h4> Probabilidad Hermano: " . $probabilidad_hermano . " nodo: " . ($nodo - 1) . "</h4>";

    $costo_padre = (($probabilidad_actual * $costo_actual) + ($probabilidad_hermano * $costo_hermano));
    echo  "<h4> Resultado Costo Padre: " . $costo_padre . " nodo: " . (($nodo - 1) / 2) . "</h4>";
    updateCosto((($nodo - 1) / 2), $costo_padre);
}

function consultaPersonajes()
{
    require 'conexion.php';

    $consulta = 'SELECT nodo FROM arbol WHERE pregunta= 0; ';
    $resultado;
    $array = [];
    if ($resultado = mysqli_query($db, $consulta)) {
        if ($resultado->num_rows === 0) {
            echo 'error - el nodo no existe :' . $nodoconsulta;
        } else {

            while ($fila = mysqli_fetch_row($resultado)) {
                $nodo = $fila[0];
                recorrido($nodo);
            }
        }
    }
    // echo $array[1];
    return $array;
}


function consulta($nodoconsulta)
{
    require 'conexion.php';

    $consulta = 'SELECT texto,pregunta,costo,probabilidad,elecciones FROM arbol WHERE nodo=' . $nodoconsulta . ';';
    $texto = '';
    $pregunta = true;
    $resultado;
    $array = [];
    if ($resultado = mysqli_query($db, $consulta)) {
        if ($resultado->num_rows === 0) {
            echo 'error - el nodo no existe :' . $nodoconsulta;
        } else {

            while ($fila = mysqli_fetch_row($resultado)) {
                $texto = $fila[0];
                $pregunta = $fila[1];
                $costo = $fila[2];
                $probabilidad = $fila[3];
                $intentos = $fila[4];
                $array = [$fila[0], $fila[1], $fila[2], $fila[3], $fila[4]];
            }
        }
    }
    // echo $array[1];
    return $array;
}
function updateCosto($nodoconsulta, $costo)
{
    require 'conexion.php';
    echo  "<h2>" . $nodoconsulta . "</h2>";
    $sql = "UPDATE arbol SET costo='$costo' WHERE nodo='$nodoconsulta'";

    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully" . $nodoconsulta;;
    } else {
        echo "Error updating record: " . $db->error;
    }
    $db->close();
}
function updateCostoPersonaje($nodoconsulta, $costo)
{
    require 'conexion.php';
    echo  "<h2>" . $nodoconsulta . "</h2>";
    $sql = "UPDATE arbol SET costo='$costo' WHERE nodo='$nodoconsulta'";

    if ($db->query($sql) === TRUE) {
        echo "Costo cargado exitosamente del nodo: " . $nodoconsulta;;
    } else {
        echo "Error updating record: " . $db->error;
    }
    $db->close();
}
function consultaCostoPersonaje($nodoconsulta)
{
    require 'conexion.php';

    $consulta = 'SELECT costo FROM arbol WHERE nodo=' . $nodoconsulta . ';';

    $resultado;
    $array = [];
    if ($resultado = mysqli_query($db, $consulta)) {
        if ($resultado->num_rows === 0) {
            echo 'error - el nodo no existe :' . $nodoconsulta;
        } else {

            while ($fila = mysqli_fetch_row($resultado)) {

                $costo = $fila[0];
            }
        }
    }
    // echo $array[1];
    return $costo;
}
$costoPersonaje = consultaCostoPersonaje($nodo);
$costoPersonaje = $costoPersonaje + 1;

updateCostoPersonaje($nodo, $costoPersonaje);

consultaPersonajes();
