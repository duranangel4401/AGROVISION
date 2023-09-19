<?php
class ReportesProductor_model extends CI_Model
{
    public function obtenerTotalProduccion($idProduccion, $idProductor)
    {
        $sql = "SELECT  C.id AS idClasificacion, C.nombre AS nombreClasificacion, (SELECT COUNT(K.id) FROM kardex K WHERE K.idClasificacion=C.id AND K.idProduccion=?) AS total FROM produccion P INNER JOIN produccionclasificacion PC ON PC.idProduccion=P.id INNER JOIN clasificacion C ON C.id=PC.idClasificacion WHERE P.idProductor=? AND P.id=?";
        $binds = array($idProduccion, $idProductor, $idProduccion);
        $query = $this->db->query($sql, $binds);
        return $query->result_array();
    }

    public function obtenerTotalProductor($idProductor)
    {
        $sql = "SELECT DISTINCT C.id AS idClasificacion, C.nombre AS nombreClasificacion, (SELECT COUNT(K.id) FROM kardex K WHERE K.idClasificacion=C.id) AS total FROM produccion P INNER JOIN produccionclasificacion PC ON PC.idProduccion=P.id INNER JOIN clasificacion C ON C.id=PC.idClasificacion WHERE P.idProductor=?";
        $binds = array($idProductor);
        $query = $this->db->query($sql, $binds);
        return $query->result_array();
    }

    public function obtenerDatosPorParametros($idProductor, $idProduccion, $idEquipos, $fechaInicio, $fechaFin)
    {
        $sql = "SELECT C.id AS idClasificacion, C.nombre AS nombreClasificacion, (SELECT COUNT(K.id) FROM kardex K WHERE K.idClasificacion=C.id AND K.idProduccion=? AND K.idEquipo=? AND K.fechaRegistro>=? AND K.fechaRegistro <=?) AS totalPorEquipo FROM produccion P INNER JOIN produccionclasificacion PC ON PC.idProduccion=P.id INNER JOIN clasificacion C ON C.id=PC.idClasificacion WHERE P.idProductor=? AND P.id=?";
        $binds = array($idProduccion, $idEquipos, $fechaInicio, $fechaFin, $idProductor, $idProduccion);
        $query = $this->db->query($sql, $binds);
        return $query->result_array();
    }

    public function totalSeleccionadosProductor($idProductor)
    {
        $this->db->select('COUNT(K.id) AS totalSelect');
        $this->db->from('kardex K');
        $this->db->join('produccion P', 'P.id=K.idProduccion');
        $this->db->where('idProductor', $idProductor);

        $query = $this->db->get();

        return $query; // Devuelve el objeto de consulta en lugar de result()
    }

    public function totalKilosProductor($idProductor)
    {
        $this->db->select('ROUND(SUM(K.peso / 1000), 2) AS totalKilos');
        $this->db->from('kardex K');
        $this->db->join('produccion P', 'P.id=K.idProduccion');
        $this->db->where('idProductor', $idProductor);

        $query = $this->db->get();

        return $query; // Devuelve el objeto de consulta en lugar de result()
    }


    public function obtenerTotalKilosBs($idProductor)
    {
        $this->db->distinct();
        $this->db->select('C.id AS idClasificacion, C.nombre AS nombreClasificacion');
        $this->db->select('(
        SELECT ROUND(SUM(K.peso / 1000), 2)
        FROM kardex K
        WHERE K.idClasificacion = C.id
    ) AS TOTALkILOS');
        $this->db->select('(
        SELECT ROUND(SUM(K.peso / 1000) * PC.costoKilo, 2)
        FROM kardex K
        WHERE K.idClasificacion = C.id
    ) AS TOTALbs,  PC.costoKilo AS costo');
        $this->db->from('produccion P');
        $this->db->join('produccionclasificacion PC', 'PC.idProduccion = P.id');
        $this->db->join('clasificacion C', 'C.id = PC.idClasificacion');
        $this->db->where('P.idProductor', $idProductor);

        return $this->db->get()->result();
    }

    public function totalIngresoBs($idProductor)
    {
        $this->db->select("SUM(TOTALbs) AS TotalSuma");
        $this->db->from("(
        SELECT DISTINCT C.id AS idClasificacion, C.nombre AS nombreClasificacion, 
            (SELECT ROUND(SUM(K.peso / 1000) * PC.costoKilo, 2) 
            FROM kardex K 
            WHERE K.idClasificacion = C.id) AS TOTALbs
        FROM produccion P
        INNER JOIN produccionclasificacion PC ON PC.idProduccion = P.id
        INNER JOIN clasificacion C ON C.id = PC.idClasificacion
        WHERE P.idProductor = $idProductor
    ) AS Subconsulta");

        $query = $this->db->get();

        return $query->row()->TotalSuma;
    }
}
