<?php
class Clasificacion_model extends CI_Model
{
    public function listaClasificacion($idProductor)
    {
        $this->db->select('c.id AS idClasificacion, c.nombre AS nombreClasificacion, c.rangoMinimo AS rangoMinimo, c.rangoMaximo AS rangoMaximo, c.fechaRegistro AS fechaRegistro, c.idProductor');
        $this->db->from('productor P');
        $this->db->join('clasificacion c', 'P.id = c.idProductor');
        $this->db->where('c.idProductor', $idProductor);
        $this->db->WHERE('c.estado', '1');

        return $this->db->get();
    }
    public function agregarClasificacion($data)
    {
        $this->db->INSERT('clasificacion', $data);
    }
    public function recuperarDatosClasificacion($idClasificacion)
    {
        $this->db->SELECT('*');
        $this->db->FROM('clasificacion');
        $this->db->WHERE('id', $idClasificacion);
        return $this->db->get();
    }
    public function modificarClasificacion($idClasificacion, $data)
    {
        $this->db->where('id', $idClasificacion,);
        $this->db->update('clasificacion', $data);
    }
    public function deshabilitarClasificacion($idClasificacion, $data)
    {
        $this->db->where('id', $idClasificacion);
        $this->db->update('clasificacion', $data);
    }


    // obtener la clasificacion
    public function obtenerClasificaciones($idProductor) {
        $this->db->distinct();
        $this->db->select('C.id AS idClasificacion, CONCAT(C.nombre, " Rango de Peso: ", C.rangoMinimo, " - ", C.rangoMaximo, " gramos ") AS clasificacion');
        $this->db->from('productor P');
        $this->db->join('clasificacion C', 'C.idProductor = P.id');
        $this->db->where('C.idProductor', $idProductor);
        $query = $this->db->get();
        return $query->result();
    }
}
