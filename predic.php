<?php

$nodopredic = $nodo * 2;
$nodohermano = $nodopredic + 1;
$prediccion = prediction($nodopredic, $nodohermano);
$probabilidad = $prediccion[1];
$personaje = $prediccion[0];

function prediction($nodo, $nodohermano)
{
    $cont = 0;

    $consulta1 = consulta($nodo);
    $consulta2 = consulta($nodohermano);
    $costonodo = $consulta1[0];
    $costohermano = $consulta2[0];
    $probabilidad = 1;
    while (($consulta1[1] || $consulta2[1])) {
        $cont++;
        if ($costonodo > $costohermano) {
            $nodomayor = $nodo;
            $probabilidadMayor = $consulta1[4];
            // $probabilidad = $probabilidadMayor;
        } else {
            $nodomayor = $nodohermano;
            $probabilidadMayor = $consulta2[4];
            // $probabilidad = $probabilidadMayor;
        }
        echo '<br>' . $probabilidad . 'X' . $probabilidadMayor;
        $probabilidad = abs($probabilidad * $probabilidadMayor);
        echo ' =' . $probabilidad;

        echo '<p class="arbol"> <b>Costo: </b>' . $costonodo . ' <b> Nodo: </b> ' . $consulta1[3] . ' <--->  <b>Costo: </b>' . $costohermano . '<b> Nodo: </b>' . $consulta2[3] . '</p> contador: ' . $cont . 'Probabilidad Mayor:' . $probabilidadMayor;
        if (($consulta1[1] == false) || ($consulta2[1] == false)) {
            if ($consulta1[1] == false) {
                if ($nodo == $nodomayor) {
                    break;
                } else {
                    $nodo = $nodo + 1;
                }
            } else {

                if ($nodohermano == $nodomayor) {

                    break;
                } else {
                    $nodo = $nodo - 1;
                }
            }
        }

        $nodo = $nodomayor * 2;
        $nodohermano = $nodo + 1;

        $consulta1 = consulta($nodo);
        $consulta2 = consulta($nodohermano);
        $costonodo = $consulta1[0];
        $costohermano = $consulta2[0];
    }
    // $cont++;
    if ($costonodo > $costohermano) {
        $personaje = $consulta1[2];
        $probabilidad = $probabilidad - 1;
    } else {
        $personaje = $consulta2[2];
        $probabilidad = $probabilidad - 1;
    }
    if ($probabilidad == 0) {
        echo '<br>entroooo: ' . $probabilidad;
        $probabilidad = (consultaProbPersonaje($personaje));
        $probabilidad = ($probabilidad);
    }
    echo '<br>1 Probabilidad TOTAL: ' . abs($probabilidad);


    $resultados = [$personaje, abs($probabilidad)];

    return $resultados;
}

function consulta($nodoconsulta)
{
    require 'conexion.php';

    $consulta = 'SELECT costo,pregunta,texto,nodo,probabilidad FROM arbol WHERE nodo=' . $nodoconsulta . ';';
    $array = [];
    if ($resultado = mysqli_query($db, $consulta)) {
        if ($resultado->num_rows === 0) {
            echo 'error - el nodo no existe :' . $nodoconsulta;
        } else {

            while ($fila = mysqli_fetch_row($resultado)) {

                $array = [$fila[0], $fila[1], $fila[2], $fila[3], $fila[4]];
            }
        }
    }

    // echo $array[1];
    return $array;
}
function consultaProbPersonaje($nombre)
{
    require 'conexion.php';

    $consulta = 'SELECT probabilidad FROM arbol WHERE texto="' . $nombre . '";';
    $array = [];

    if ($resultado = mysqli_query($db, $consulta)) {
        if ($resultado->num_rows === 0) {
            echo 'error - el nodo no existe :' . $nodoconsulta;
        } else {

            while ($fila = mysqli_fetch_row($resultado)) {

                $prob = $fila[0];
            }
        }
    }

    // echo $array[1];
    return $prob;
}
