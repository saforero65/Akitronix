<?php


// while ($pregunta == TRUE) {
        
//     if ($nodo % 2 == 0) {
        $nodo = $nodo * 2;
        $nodohermano = $nodo + 1;
        $personaje = prediction($nodo,$nodohermano);

//     } else {
//         $nodo = $nodo * 2 + 1;
//         // costoimpar($nodo);
//     }
// }

function prediction($nodo,$nodohermano)
{

   $consulta1 = consulta($nodo);
   $consulta2 = consulta($nodohermano);
   $costonodo = $consulta1[0];
   $costohermano = $consulta2[0];
   echo $costonodo.'-'. $costohermano;

    while(($consulta1[1] || $consulta2[1])){

        if($costonodo < $costohermano){
            $nodomayor = $nodohermano;
        }
        else{
            $nodomayor = $nodo;     
        }

        if(($consulta1[1]==false) || ($consulta2[1] == false)){
            if($consulta1[1] == false){
                if($nodo == $nodomayor){
                    break;
                }
                else{
                    $nodo = $nodo + 1;
                }
 
            }
            else{

                if($nodohermano == $nodomayor){

                    break;
                }
                else{
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
        
        echo '<br>'. $costonodo.'-'. $costohermano. '<br>'; 

    }
    
    if($nodo == $nodomayor){
        $personaje = $consulta1[2];

    }
    else{
        $personaje = $consulta2[2];
    }
    return $personaje;
}

function consulta($nodoconsulta)
{
    require 'conexion.php';

    $consulta = 'SELECT costo,pregunta,texto FROM arbol WHERE nodo=' . $nodoconsulta . ';';
    $array = [];
    if ($resultado = mysqli_query($db, $consulta)) {
        if ($resultado->num_rows === 0) {
            echo 'error - el nodo no existe :' . $nodoconsulta;
        } else {

            while ($fila = mysqli_fetch_row($resultado)) { 
                // $costo = $fila[0];
                // $pregunta = $fila[1];
                $array=[$fila[0], $fila[1],$fila[2]];
            }
        }
    }
    // echo $array[1];
    return $array;
}