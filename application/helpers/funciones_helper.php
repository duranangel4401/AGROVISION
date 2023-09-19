<?php
//se puede tener como un reposotorio de funciones
function formatearFecha($fecha){
    /* 2023-06-22 23:40:13 */
    $dia=substr($fecha,8,2);
    $mes=substr($fecha,5,2);
    $anio=substr($fecha,0,4);

    $hora=substr($fecha,11,5);
    $fechaFormateada = $dia."-".$mes."-".$anio." ".$hora;
    return $fechaFormateada;
}

function mensajeDisponivilidad($disponible,$vendido, $alquiler){
    if ($disponible == 1 && $vendido == 0 && $alquiler == 0) {
        return "Equipo disponible";
    } elseif ($disponible == 1 && $vendido == 1 && $alquiler == 0) {
        return "Equipo Vendido";
    } elseif ($disponible == 1 && $vendido == 0 && $alquiler == 1) {
        return "Equipo en alquiler";
    } else {
        return "Estado desconocido";
    }
}



?>