<?php
class ProduccionClasificacion_model extends CI_Model
{
    public function obtenerProduccionClasificaciones($idProduccion)
    {
        $this->db->select('PC.idClasificacion AS idClasificacion, PC.idProduccion AS idProduccion, CONCAT(C.nombre, " Rango de Peso: ", C.rangoMinimo, " - ", C.rangoMaximo, " gramos ") AS clasificacion, PC.costoKilo AS precio');
        $this->db->from('clasificacion C');
        $this->db->join('produccionclasificacion PC', 'PC.idClasificacion = C.id');
        $this->db->join('produccion P', 'P.id = PC.idProduccion');
        $this->db->where('P.id', $idProduccion);

        return $this->db->get()->result();
    }
}
