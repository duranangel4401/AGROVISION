<?php
class Equipo_model extends CI_Model
{
    public function listaEquipos()
    {
        $this->db->SELECT('*');
        $this->db->FROM('equipo');
        $this->db->WHERE('estado', '1');
        return $this->db->get();
    }
    public function listaEquiposDisponibles()
    {
        $this->db->SELECT('*');
        $this->db->FROM('equipo');
        $this->db->WHERE('estado', '1');
        $this->db->WHERE('disponible', '1');
        $this->db->WHERE('vendido', '0');
        $this->db->WHERE('alquiler', '0');
        return $this->db->get();
    }
    public function agregarEquipo($data){
        $this->db->INSERT('equipo', $data);
    }
    public function recuperarDatosEquipo($idEquipo){
        $this->db->SELECT('*');
        $this->db->FROM('equipo');
        $this->db->WHERE('id',$idEquipo);
        return $this->db->get();
    }
    public function modificarEquipo($idEquipo,$data){
        $this->db->where('id',$idEquipo,);
        $this->db->update('equipo',$data);
    }
    public function DeshabilitarEquipo($idEquipo,$data){
        $this->db->where('id',$idEquipo);
        $this->db->update('equipo',$data);
    }
}
