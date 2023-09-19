<?php
class Alquiler_model extends CI_Model
{
    public function listaAlquiler()
    {
        $this->db->select('A.id AS idAlquiler, CONCAT(P.nombres," ",P.primerApellido," ",IFNULL(P.segundoApellido,"")) AS productor, E.serie AS serie, A.total AS total, A.fechaAlquiler AS fechaAlquiler,A.fechaDevolucion, A.fechaRealDevolucion');
        $this->db->from('alquiler A');
        $this->db->join('detallealquiler DA', 'A.id=DA.idAlquiler');
        $this->db->join('equipo E', 'E.id=DA.idEquipo');
        $this->db->join('productor P', 'P.id=A.idProductor');
        $this->db->where('A.estado', 1);
        return $this->db->get();
    }
    public function registrarAlquiler($datosAlquiler, $detalleAlquiler)
    {
        // Iniciar una transacción
        $this->db->trans_start();

        // Insertar en la tabla VENTA
        $this->db->insert('alquiler', $datosAlquiler);

        // Obtener el ID de la venta recién insertada
        $idAlquiler = $this->db->insert_id();

        // Calcular el total de la venta
        $totalAlquiler = 0;

        // Insertar el detalle de alquiler en la tabla detalleAlquiler
        $detalleAlquiler['idAlquiler'] = $idAlquiler;
        $this->db->insert('detalleAlquiler', $detalleAlquiler);

        // Calcular el subtotal del detalle y sumarlo al total del alquiler
        $subtotal = $detalleAlquiler['precioAlquiler'] * $detalleAlquiler['cantidad'];
        $totalAlquiler += $subtotal;

        // Actualizar el atributo ALQUILER en la tabla EQUIPO a 1 para indicar que ha sido alqulado y no vendido
        $this->db->where('id', $detalleAlquiler['idEquipo']);
        $this->db->update('equipo', array('alquiler' => 1));

        // Actualizar el campo "total" en la tabla alquiler con el valor calculado
        $this->db->where('id', $idAlquiler);
        $this->db->update('alquiler', array('total' => $totalAlquiler));

        // Finalizar la transacción
        $this->db->trans_complete();

        // Verificar si la transacción se completó con éxito
        if ($this->db->trans_status() === FALSE) {
            // Si hubo un error, deshacer la transacción
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function obtenerDetalleAlquiler($idAlquiler)
    {
        $this->db->select('a.id AS idAlquiler, p.id AS idProductor, CONCAT(p.nombres, " ", p.primerApellido, " ", IFNULL(p.segundoApellido,"")) AS nombreProductor,
                       e.id AS idEquipo, CONCAT(e.serie, " - ", e.descripcion) AS equipo,
                       a.total AS precio, a.fechaDevolucion AS fechaDevolucion, a.fechaAlquiler AS fechaAlquiler');
        $this->db->from('alquiler AS a');
        $this->db->join('productor AS p', 'a.idProductor = p.id', 'inner');
        $this->db->join('detalleAlquiler AS da', 'a.id = da.idAlquiler', 'inner');
        $this->db->join('equipo AS e', 'da.idEquipo = e.id', 'inner');
        $this->db->where('a.id', $idAlquiler);

        return $this->db->get();
    }
    public function modificarAlquilerYDetalle($idAlquiler, $idEquipo, $datosAlquiler, $detalleAlquiler)
    {
        // Inicia una transacción
        $this->db->trans_start();

        // Actualiza la tabla Alquiler
        $this->db->where('id', $idAlquiler);
        $this->db->update('alquiler', $datosAlquiler);

        // Actualiza la tabla DetalleAlquiler
        $this->db->where('idAlquiler', $idAlquiler);
        $this->db->where('idEquipo', $idEquipo);
        $this->db->update('detallealquiler', $detalleAlquiler);

        // Finaliza la transacción
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            // La transacción ha fallado, puedes manejar esto como desees
            return FALSE;
        } else {
            // La transacción se ha completado exitosamente
            return TRUE;
        }
    }

    public function cancelarAlquiler($idAlquiler, $idUsuario)
    {
        // Iniciar una transacción
        $this->db->trans_start();

        // Actualizar el estado de la venta a 0 y la fecha de actualización
        $this->db->where('id', $idAlquiler);
        $this->db->update('alquiler', array(
            'estado' => 0,
            'fechaActualizacion' => date('Y-m-d H:i:s'),
            'idUsuario' => $idUsuario
        ));

        // Obtener los equipos vendidos en esta venta
        $this->db->select('idEquipo');
        $this->db->from('detalleAlquiler');
        $this->db->where('idAlquiler', $idAlquiler);
        $query = $this->db->get();
        $equiposAlquilados = $query->result_array();

        // Actualizar la disponibilidad y el atributo de venta de los equipos vendidos
        foreach ($equiposAlquilados as $equipo) {
            $this->db->where('id', $equipo['idEquipo']);
            $this->db->update('equipo', array(
                'disponible' => 1,
                'fechaActualizacion' => date('Y-m-d H:i:s'),
                'alquiler' => 0
            ));
        }

        // Finalizar la transacción
        $this->db->trans_complete();

        // Verificar si la transacción se completó con éxito
        if ($this->db->trans_status() === FALSE) {
            // Si hubo un error, deshacer la transacción
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
