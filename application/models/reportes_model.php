<?php

class Reportes_model extends CI_Model
{

    public function InsertarRegistrosKardex($idEquipo, $idAlquiler, $idProduccion, $idProductor, $pesoInicio, $pesoFinal, $cantidad, $fechaInicio, $fechaFinal)
    {

        $this->db->query("CALL InsertarRegistrosKardex($idEquipo, $idAlquiler, $idProduccion, $idProductor, $pesoInicio, $pesoFinal, $cantidad, '$fechaInicio', '$fechaFinal')");
    }


    public function obtenerTotalesPorClasificacion()
    {
        $this->db->SELECT('C.nombre AS Clasificacion, COUNT(*) AS TotalManzanas, ROUND(SUM(peso) / 1000, 2) AS TotalKilos,  ROUND(SUM(peso) / 1000, 2) AS TotalKilos, ROUND(SUM(peso), 2) AS TotalGramos');
        $this->db->FROM('kardex AS K');
        $this->db->JOIN('clasificacion AS C', 'K.idClasificacion = C.id');
        $this->db->group_by('C.nombre');
        $this->db->order_by('C.nombre');

        $query = $this->db->get();

        return $query->result();
    }

    public function obtenerTotalesGenerales()
    {
        $this->db->SELECT('COUNT(id) AS TotalManzanasGeneral, ROUND(SUM(peso) / 1000, 2) AS TotalKilosGeneral, ROUND(SUM(peso), 2) AS TotalGramosGeneral');
        $this->db->FROM('kardex');
        $this->db->WHERE('estado', 1);

        return $this->db->get();
    }
    public function obtenerProductoresActivos()
    {
        $this->db->SELECT('COUNT(id) AS productores');
        $this->db->FROM('productor');
        $this->db->WHERE('estado', 1);

        return $this->db->get();
    }

    // ver equipo por productor 
    public function obtenerAlquileresPorProductor($idProductor)
    {
        $this->db->select('A.id AS idAlquiler, CONCAT("Alquiler - ",A.fechaAlquiler) AS alquilerDatos');
        $this->db->from('productor P');
        $this->db->join('alquiler A', 'A.idProductor = P.id');
        $this->db->where('A.idProductor', $idProductor);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); // Devuelve un array vacío si no se encuentran resultados
        }
    }

    // consulta que muestra el el equipo alquilado al productor
    public function productorEquiposAlquilados($idAlquiler)
    {
        $this->db->SELECT('E.id AS idEquipo, CONCAT(E.serie, " - ", E.descripcion) AS nombreEquipo');
        $this->db->FROM('productor P');
        $this->db->JOIN('alquiler A', 'A.idProductor = P.id');
        $this->db->JOIN('detallealquiler DA', 'A.id = DA.idAlquiler');
        $this->db->JOIN('equipo E', 'DA.idEquipo = E.id');
        $this->db->WHERE('A.id', $idAlquiler);

        $query = $this->db->get();
        return $query->result();
    }
    // consulta para que me muestre las produccion de dicho productor
    public function productorProduccion($idProductor)
    {
        $this->db->select('PD.id AS idProduccion, PD.nombre AS nombreProduccion, P.nombres AS Productor');
        $this->db->from('productor P');
        $this->db->join('produccion PD', 'PD.idProductor = P.id');
        $this->db->where('PD.idProductor', $idProductor);

        $query = $this->db->get();
        return $query->result();
    }

    // OBTENER EQUIPO POR PRODUCCION QUE PARTICIPARON POR PRODUCCION
    public function obtenerEquiposPorProduccion($idProduccion)
    {
        $this->db->distinct();
        $this->db->select('K.idEquipo AS idEquipo, CONCAT(E.serie, " - ", E.descripcion) AS nombreEquipo');
        $this->db->from('produccion P');
        $this->db->join('kardex K', 'K.idProduccion = P.id');
        $this->db->join('equipo E', 'E.id = K.idEquipo');
        $this->db->where('K.idProduccion', $idProduccion);

        $query = $this->db->get();
        return $query->result();
    }

    public function obtenerTotalPorEquipo($idProductor, $idProduccion, $idEquipo, $fechaInicio, $fechaFin)
    {
        $this->db->select('C.id AS idClasificacion, C.nombre AS nombreClasificacion');
        $this->db->select('(SELECT COUNT(K.id) FROM kardex K WHERE K.idClasificacion=C.id AND K.idProduccion=' . $idProduccion . ' AND K.idEquipo=' . $idEquipo . ' AND K.fechaRegistro>="' . $fechaInicio . '" AND K.fechaRegistro<="' . $fechaFin . '") AS totalPorEquipo');
        $this->db->from('produccion P');
        $this->db->join('produccionclasificacion PC', 'PC.idProduccion=P.id');
        $this->db->join('clasificacion C', 'C.id=PC.idClasificacion');
        $this->db->where('P.idProductor', $idProductor);
        $this->db->where('P.id', $idProduccion);

        $query = $this->db->get();

        return $query->result();
    }
}
