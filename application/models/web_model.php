<?php
class Web_model extends CI_Model
{
    public function listaPublicoWeb($idProductor)
    {
        $this->db->select('P.id AS idProductor, TP.id AS idTemaPromocion, TP.titulo AS titulo,TP.fechaRegistro AS fechaRegistro,C.foto AS foto, TP.descripcion AS descripcion, C.id AS idContenido, C.foto AS foto, C.detalle');
        $this->db->from('productor P');
        $this->db->join('temapromocion TP', 'TP.idProductor = P.id');
        $this->db->join('contenido C', 'C.idTemaPromocion = TP.id');
        $this->db->where('TP.estado', 1);
        $this->db->where('TP.idProductor', $idProductor);
        return $this->db->get();
    }

    public function listaProductorWeb($idProductor)
    {
        $this->db->select('P.id AS idProductor, TP.id AS idTemaPromocion,CONCAT(P.nombres, " ",P.primerApellido," ",IFNULL(P.segundoApellido,"")) AS nombreProductor ,TP.titulo AS titulo,TP.fechaRegistro AS fechaRegistro, TP.descripcion AS descripcion, C.id AS idContenido, C.foto AS foto, C.detalle');
        $this->db->from('productor P');
        $this->db->join('temapromocion TP', 'TP.idProductor = P.id');
        $this->db->join('contenido C', 'C.idTemaPromocion = TP.id');
        $this->db->where('TP.estado', 1);
        $this->db->where('TP.idProductor', $idProductor);
        return $this->db->get();
    }

    public function nombreProductor($idProductor)
    {
        $this->db->select('CONCAT(P.nombres, " ",P.primerApellido," ",IFNULL(P.segundoApellido,"")) AS nombreProductor');
        $this->db->from('productor P');
        $this->db->where('P.id', $idProductor);
        return $this->db->get();
    }

    public function recuperarDatos($idTemaPromocion)
    {
        $this->db->select('P.id AS idProductor, TP.id AS idTemaPromocion, TP.titulo AS titulo,TP.fechaRegistro AS fechaRegistro,C.foto AS foto, TP.descripcion AS descripcion, C.id AS idContenido, C.foto AS foto, C.detalle');
        $this->db->from('productor P');
        $this->db->join('temapromocion TP', 'TP.idProductor = P.id');
        $this->db->join('contenido C', 'C.idTemaPromocion = TP.id');
        $this->db->where('TP.id', $idTemaPromocion);
        return $this->db->get();
    }

    public function insertarPublicacion($data_tema, $data_contenido)
    {
        // Iniciar una transacción
        $this->db->trans_start();

        // Insertar en la tabla temapromocion
        $this->db->insert('temapromocion', $data_tema);

        // Obtener el ID insertado en la tabla temapromocion
        $idTemaPromocion = $this->db->insert_id();

        // Asignar el ID a $data_contenido
        $data_contenido['idTemaPromocion'] = $idTemaPromocion;

        // Insertar en la tabla contenido
        $this->db->insert('contenido', $data_contenido);

        // Finalizar la transacción
        $this->db->trans_complete();

        // Verificar si la transacción fue exitosa
        if ($this->db->trans_status() === FALSE) {
            // Si ocurrió un error, hacer un rollback
            $this->db->trans_rollback();
            return FALSE;
        } else {
            // Si la transacción fue exitosa, hacer un commit
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function modificarPublicacion($idTemaPromocion, $data_tema, $data_contenido)
    {
        // Iniciar una transacción
        $this->db->trans_start();

        // Actualizar la tabla temapromocion
        $this->db->where('id', $idTemaPromocion);
        $this->db->update('temapromocion', $data_tema);

        // Actualizar la tabla contenido
        $this->db->where('idTemaPromocion', $idTemaPromocion);
        $this->db->update('contenido', $data_contenido);

        // Finalizar la transacción
        $this->db->trans_complete();

        // Verificar si la transacción fue exitosa
        if ($this->db->trans_status() === FALSE) {
            // Si ocurrió un error, hacer un rollback
            $this->db->trans_rollback();
            return FALSE;
        } else {
            // Si la transacción fue exitosa, hacer un commit
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function bajarPublicidad($idTemaPromocion, $data)
    {
        $this->db->where('id', $idTemaPromocion);
        $this->db->update('temapromocion', $data);
    }

    public function modificarContenido($idTemaPromocion,$data){
        $this->db->where('idTemaPromocion',$idTemaPromocion,);
        $this->db->update('contenido',$data);
    }

}
