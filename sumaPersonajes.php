<?php



function consultaElecciones($nodoconsulta)
{
    require 'conexion.php';

    $consulta = 'SELECT elecciones FROM arbol WHERE nodo=' . $nodoconsulta . ';';
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
            }
        }
    }
    // echo $array[1];
    return $elecciones;
}
function consultaPersonas($nodoconsulta)
{
    require 'conexion.php';

    $consulta = 'SELECT personas FROM arbol WHERE nodo=' . $nodoconsulta . ';';
    $texto = '';
    $pregunta = true;
    $resultado;
    $array = [];
    if ($resultado = mysqli_query($db, $consulta)) {
        if ($resultado->num_rows === 0) {
            echo 'error - el nodo no existe :' . $nodoconsulta;
        } else {

            while ($fila = mysqli_fetch_row($resultado)) {

                $personas = $fila[0];
            }
        }
    }
    // echo $array[1];
    return $personas;
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


$elecciones = consultaElecciones($nodo);

if ($nodo % 2 == 0) {

    $nodoPersonaje = $nodo / 2;
    $personas = consultaPersonas($nodoPersonaje);
    UpdatePersonas($nodo, $personas);
    UpdatePersonas(($nodo + 1), $personas);
} else {
    $nodoPersonaje = ($nodo - 1) / 2;
    $personas = consultaPersonas($nodoPersonaje);

    UpdatePersonas($nodo, $personas);
    UpdatePersonas(($nodo - 1), $personas);
}
updateElecciones($nodo, ($elecciones + 1));


require 'priori.php';
