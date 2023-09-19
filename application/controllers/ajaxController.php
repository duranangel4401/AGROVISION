<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AjaxController  extends CI_Controller
{

    public function obtenerProduccion($productor_id)
    {
        // Realiza la consulta para obtener las producciones correspondientes al productor
        $producciones = $this->reportes_model->productorProduccion($productor_id);

        // Devuelve los datos como respuesta JSON
        echo json_encode($producciones);
    }
    public function productorEquiposAlquilados($alquiler_id)
    {
        // Realiza la consulta para obtener las producciones correspondientes al productor
        $equipo = $this->reportes_model->productorEquiposAlquilados($alquiler_id);

        // Devuelve los datos como respuesta JSON
        echo json_encode($equipo);
    }
    public function obtenerAlquileresPorProductor($productor_id)
    {
        // Realiza la consulta para obtener las producciones correspondientes al productor
        $alquiler = $this->reportes_model->obtenerAlquileresPorProductor($productor_id);

        // Devuelve los datos como respuesta JSON
        echo json_encode($alquiler);
    }

    public function obtenerEquiposPorProduccion($produccion_id)
    {
        // Realiza la consulta para obtener las producciones correspondientes al productor
        $equipoProduccion = $this->reportes_model->obtenerEquiposPorProduccion($produccion_id);

        // Devuelve los datos como respuesta JSON
        echo json_encode($equipoProduccion);
    }
}

