<?php
class Venta_model extends CI_Model
{
    public function listaVentas()
    {
        $this->db->select('V.id AS idVenta, CONCAT(P.nombres," ",P.primerApellido," ",IFNULL(P.segundoApellido,"")) AS comprador, E.serie AS serie, V.total AS total, V.fecha AS fechaVenta');
        $this->db->from('venta V');
        $this->db->join('detalleVenta DV', 'V.id = DV.idVenta');
        $this->db->join('equipo E', 'E.id = DV.idEquipo');
        $this->db->join('productor P', 'P.id = V.idProductor');
        $this->db->where('V.estado', 1);
        return $this->db->get();
    }

    public function registrarVenta($datosVenta, $detalleVenta)
    {
        // Iniciar una transacción
        $this->db->trans_start();

        // Insertar en la tabla VENTA
        $this->db->insert('venta', $datosVenta);

        // Obtener el ID de la venta recién insertada
        $idVenta = $this->db->insert_id();

        // Calcular el total de la venta
        $totalVenta = 0;

        // Insertar el detalle de venta en la tabla DETALLEVENTA
        $detalleVenta['idVenta'] = $idVenta;
        $this->db->insert('detalleventa', $detalleVenta);

        // Calcular el subtotal del detalle y sumarlo al total de la venta
        $subtotal = $detalleVenta['precioUnitario'] * $detalleVenta['cantidad'];
        $totalVenta += $subtotal;

        // Actualizar el atributo Vendido en la tabla EQUIPO a 1 para indicar que ha sido vendido y no alquilado
        $this->db->where('id', $detalleVenta['idEquipo']);
        $this->db->update('equipo', array('vendido' => 1));
        // Actualizar el campo "total" en la tabla VENTA con el valor calculado
        $this->db->where('id', $idVenta);
        $this->db->update('venta', array('total' => $totalVenta));

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
    public function obtenerDetalleVenta($idVenta)
    {
        $this->db->select('v.id AS idVenta, v.fecha, v.total');
        $this->db->select('p.id AS idProductor, CONCAT(p.nombres," ",p.primerApellido," ",IFNULL(p.segundoApellido,"")) AS productor');
        $this->db->select('e.id AS idEquipo, CONCAT(e.serie, " - ",e.descripcion) AS equipo');
        $this->db->select('dv.precioUnitario, dv.cantidad');
        $this->db->from('venta AS v');
        $this->db->join('productor AS p', 'v.idProductor = p.id', 'inner');
        $this->db->join('detalleventa AS dv', 'v.id = dv.idVenta', 'inner');
        $this->db->join('equipo AS e', 'dv.idEquipo = e.id', 'inner');
        $this->db->where('v.id', $idVenta);

        return $this->db->get();
    }

    public function modificarVenta($idVenta, $dataVenta, $dataDetalleVenta)
    {
        // Inicia la transacción
        $this->db->trans_start();

        // Actualiza la tabla 'venta'
        $this->db->where('id', $idVenta);
        $this->db->update('venta', $dataVenta);

        // Actualiza la tabla 'detalleventa' (asumiendo que tengas un campo para identificar el detalle específico)
        $this->db->where('idVenta', $idVenta);
        $this->db->update('detalleventa', $dataDetalleVenta);

        // Completa la transacción
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            // Si algo salió mal, revierte la transacción
            $this->db->trans_rollback();
            return FALSE;
        } else {
            // Si todo salió bien, confirma la transacción
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function cancelarVenta($idVenta, $idUsuario)
    {
        // Iniciar una transacción
        $this->db->trans_start();

        // Actualizar el estado de la venta a 0 y la fecha de actualización
        $this->db->where('id', $idVenta);
        $this->db->update('venta', array(
            'estado' => 0,
            'fechaActualizacion' => date('Y-m-d H:i:s'),
            'idUsuario' => $idUsuario
        ));

        // Obtener los equipos vendidos en esta venta
        $this->db->select('idEquipo');
        $this->db->from('detalleventa');
        $this->db->where('idVenta', $idVenta);
        $query = $this->db->get();
        $equiposVendidos = $query->result_array();

        // Actualizar la disponibilidad y el atributo de venta de los equipos vendidos
        foreach ($equiposVendidos as $equipo) {
            $this->db->where('id', $equipo['idEquipo']);
            $this->db->update('equipo', array(
                'disponible' => 1,
                'fechaActualizacion' => date('Y-m-d H:i:s'),
                'vendido' => 0
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
