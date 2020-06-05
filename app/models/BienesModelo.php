<?php

class BienesModelo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtenerBienes()
    {
        $this->db->query('SELECT * from tbl_bien');
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function contarBienes()
    {
        $this->db->query('SELECT count(*) from tbl_bien');
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function mostrarUnBien()
    {
        $this->db->query('SELECT * from tbl_bien where idbien = 10');
        $resultados = $this->db->registros();
        return $resultados;
    }

    
    public function crearBienes($datos)
    {
        $this->db->query('INSERT INTO tbl_bien(identificacion, tipo, marca,serie) VALUES (:identificacion,  :tipo, :marca,
         :serie );');
        
        // Vinculamos los valores que llegan del formulario con la consulta sql
        $this->db->bind(':identificacion', $datos['identificacion']);
        $this->db->bind(':tipo', $datos['tipo']);
        $this->db->bind(':marca', $datos['marca']);
        $this->db->bind(':serie', $datos['serie']);
       
        // Ejecutamos la consulta
        if ($this->db->execute()) {
            return 'Inserción exitosa';
        } else {
            return 'Error en la inserción';
        }
    }
   
    public function actualizarBienes($datos)
    {
        $this->db->query('UPDATE tbl_bien SET identificacion = :identificacion, tipo = :tipo, marca = :marca,
        serie = :serie
        WHERE idbien = :id');

        // Vinculamos los valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':identificacion', $datos['identificacion']);
        $this->db->bind(':tipo', $datos['tipo']);
        $this->db->bind(':marca', $datos['marca']);
        $this->db->bind(':serie', $datos['serie']);        

        // Ejecutar
        if ($this->db->execute()) {
            return 'Actualizó con exito';
        } else {
            return 'Error en la actualización';
        }
    }
    
    public function eliminarBienes($datos)
    {
        $this->db->query('DELETE FROM tbl_bien WHERE idbien = :id');
        $this->db->bind(':id', $datos['id_bien']);

        // Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}