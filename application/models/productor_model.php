<?php
class Productor_model extends CI_Model
{
    public function listaProductores()
    {
        $this->db->SELECT('id,
                           CONCAT(nombres," ",primerApellido," ",IFNULL(segundoApellido,"")) AS productor,
                           fechaNacimiento,
                           sexo,
                           telefonos,
                           email,
                           descripcion,
                           nombreUsuario,
                           rol,
                           fechaRegistro,
                           idUsuario  
            ');
        $this->db->FROM('productor');
        $this->db->WHERE('estado', '1');
        return $this->db->get();
    }
    public function agregarProductor($data){
        $this->db->INSERT('productor', $data);
    }
    public function recuperarDatosProductor($idProductor){
        $this->db->SELECT('*');
        $this->db->FROM('productor');
        $this->db->WHERE('id',$idProductor);
        return $this->db->get();
    }
    public function modificarProductor($idProductor,$data){
        $this->db->where('id',$idProductor,);
        $this->db->update('productor',$data);
    }
    public function DeshabilitarProductor($idProductor,$data){
        $this->db->where('id',$idProductor);
        $this->db->update('productor',$data);
    }
}
