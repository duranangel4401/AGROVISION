<?php
class Produccion_model extends CI_Model
{
    public function listaProduccion($idProductor)
    {
        $this->db->select('PD.id AS idProduccion, PD.nombre AS nombreProduccion, PD.descripcion, PD.fechaInicio, PD.fechaFin, PD.idProductor AS idProductor');
        $this->db->from('productor P');
        $this->db->join('produccion PD', 'P.id = PD.idProductor', 'inner');
        $this->db->where('PD.idProductor', $idProductor);
        $this->db->where('PD.estado', 1);
        return $this->db->get();
    }

    public function nombreProduccion($idProduccion)
    {
        $this->db->select('CONCAT(nombre," - ",descripcion) AS nombreProduccion');
        $this->db->from('produccion');
        $this->db->where('id', $idProduccion);
        return $this->db->get();
    }
    
    public function agregarProduccion($data)
    {
        $this->db->INSERT('produccion', $data);
    }
    public function recuperarDatosProduccion($idProductor, $idProduccion)
    {
        $this->db->SELECT('*');
        $this->db->FROM('produccion');
        $this->db->WHERE('id', $idProduccion);
        $this->db->WHERE('idProductor', $idProductor);
        return $this->db->get();
    }
    public function modificarProduccion($idProduccion, $data)
    {
        $this->db->where('id', $idProduccion,);
        $this->db->update('produccion', $data);
    }
    public function DeshabilitarProduccion($idProduccion, $data)
    {
        $this->db->where('id', $idProduccion);
        $this->db->update('produccion', $data);
    }
}
