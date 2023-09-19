<?php
class Contrasenia_model extends CI_Model
{
    public function verificarPasswordProductor($idProductor, $contraseniaActual)
    {
        $this->db->SELECT('*');
        $this->db->FROM('productor');
        $this->db->WHERE('id', $idProductor);
        $this->db->WHERE('contrasenia', md5($contraseniaActual));
        return $this->db->get();
    }
    public function actualizarContraseniaProductor($idProctores, $data){ 

        $this->db->where('id',$idProctores,);
        $this->db->update('productor',$data);
    }

    public function verificarPasswordAdministrador($idProductor, $contraseniaActual)
    {
        $this->db->SELECT('*');
        $this->db->FROM('usuario');
        $this->db->WHERE('id', $idProductor);
        $this->db->WHERE('contrasenia', md5($contraseniaActual));
        return $this->db->get();
    }
    public function actualizarContraseniaAdministrador($idProctores, $data){ 

        $this->db->where('id',$idProctores,);
        $this->db->update('usuario',$data);
    }

}
