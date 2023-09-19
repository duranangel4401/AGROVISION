<?php

class Usuario_model extends CI_Model
{
    public function validarAdmin($login, $password)
    {
        $this->db->SELECT('id, CONCAT(nombres," ",primerApellido," ",IFNULL(segundoApellido,"")) AS fullName, sexo, nombreUsuario, contrasenia, fechaNacimiento, fechaRegistro, rol');
        $this->db->FROM('usuario');
        $this->db->WHERE('nombreUsuario', $login);
        $this->db->WHERE('contrasenia', $password);
        $this->db->WHERE('estado', '1');
        return $this->db->get();
    }
    public function validarProductor($login, $password)
    {
        $this->db->SELECT('id, CONCAT(nombres," ",primerApellido," ",IFNULL(segundoApellido,"")) AS fullName, sexo, nombreUsuario, contrasenia, fechaNacimiento,rol,descripcion,email,telefonos, fechaRegistro, idUsuario');
        $this->db->FROM('productor');
        $this->db->WHERE('nombreUsuario', $login);
        $this->db->WHERE('contrasenia', $password);
        $this->db->WHERE('estado', '1');
        return $this->db->get();
    }

    public function verificarNameUser($nombreUsuario)
    {
        $this->db->SELECT('*');
        $this->db->FROM('usuario');
        $this->db->WHERE('nombreUsuario', $nombreUsuario);
        return $this->db->get();
    } public function verificarNameUserProductor($nombreUsuario)
    {
        $this->db->SELECT('*');
        $this->db->FROM('productor');
        $this->db->WHERE('nombreUsuario', $nombreUsuario);
        return $this->db->get();
    }


    /* ---------------------------------------------------------------------------------------------------------------------------------------- */
    /*------------------   SONSULTAS SQL PARA EL LA REALIZACION DEL CRUD ---------------------------------------------------------------------- */
    /* ---------------------------------------------------------------------------------------------------------------------------------------- */
    public function listaUsuarios()
    {
        $this->db->select('id, CONCAT(nombres, " ", primerApellido, " ", IFNULL(segundoApellido, "")) AS nombreCompleto, email, telefono, nombreUsuario, rol, fechaRegistro');
        $this->db->from('usuario');
        $this->db->WHERE('id <>',$this->session->userdata('idUsuario'));
        $this->db->where('estado', 1);
        return $this->db->get();
    }
    public function listaUsuariosLogeado()
    {
        $this->db->select('id, CONCAT(nombres, " ", primerApellido, " ", IFNULL(segundoApellido, "")) AS nombreCompleto, email, telefono, nombreUsuario, rol, fechaRegistro');
        $this->db->from('usuario');
        $this->db->WHERE('id',$this->session->userdata('idUsuario'));
        $this->db->where('estado', 1);
        return $this->db->get();
    }
    public function datosProductorLogeado($idProductor)
    {
        $this->db->select('*');
        $this->db->from('productor');
        $this->db->WHERE('id', $idProductor);
        $this->db->where('estado', 1);
        return $this->db->get();
    }

    public function agregarUsuario($data)
    {
        $this->db->INSERT('usuario', $data);
    }

    public function recuperarDatosUsuario($idUsuario)
    {
        $this->db->SELECT('*');
        $this->db->FROM('usuario');
        $this->db->WHERE('id', $idUsuario);
        return $this->db->get();
    }
    public function modificarUsuario($idUsuario, $data)
    {
        $this->db->where('id', $idUsuario,);
        $this->db->update('usuario', $data);
    }
    public function deshabilitarUsuario($idUsuario, $data)
    {
        $this->db->where('id', $idUsuario);
        $this->db->update('usuario', $data);
    }
    
}
