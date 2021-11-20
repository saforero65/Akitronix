<?php

$nodo = $_POST["nodo"];

function consultaIntentos($nodoconsulta)
{
    require 'conexion.php';

    $consulta = 'SELECT elecciones,personas FROM arbol WHERE nodo=' . $nodoconsulta . ';';
    $texto = '';
    $pregunta = true;
    $resultado;
    $array = [];
    if ($resultado = mysqli_query($db, $consulta)) {
        if ($resultado->num_rows === 0) {
            echo 'error - el nodo no existe :' . $nodoconsulta;
        } else {

            while ($fila = mysqli_fetch_row($resultado)) {
                $elecciones = $fila[0];
                $personas = $fila[1];

                $array = [$fila[0], $fila[1]];
            }
        }
    }
    // echo $array[1];
    return $array;
}

function updateElecciones($nodoconsulta, $elecciones)
{
    require 'conexion.php';
    echo  "<h2>" . $nodoconsulta . "</h2>";
    $sql = "UPDATE arbol SET elecciones='$elecciones' WHERE nodo='$nodoconsulta'";

    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully updateElecciones" . $nodoconsulta;;
    } else {
        echo "Error updating record: " . $db->error;
    }
    $db->close();
}
function updatePersonas($nodoconsulta, $personas)
{
    require 'conexion.php';
    echo  "<h2>" . $nodoconsulta . "</h2>";
    $sql = "UPDATE arbol SET personas='$personas' WHERE nodo='$nodoconsulta'";

    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully updatePersonas" . $nodoconsulta;;
    } else {
        echo "Error updating record: " . $db->error;
    }
    $db->close();
}

$intentos = consultaIntentos($nodo);
$elecciones = $intentos[0] + 1;
$personas = $intentos[1] + 1;
updateElecciones($nodo, $elecciones);
UpdatePersonas($nodo, $personas);
require 'priori.php';
