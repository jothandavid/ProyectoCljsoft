<?php

class ControlesModelo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtenerControles()
    {
        $this->db->query('SELECT * from tbl_controles');
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function contarControles()
    {
        $this->db->query('SELECT count(*) from tbl_controles');
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function mostrarUnControl()
    {
        $this->db->query('SELECT * from tbl_controles where idcontrol = 10');
        $resultados = $this->db->registros();
        return $resultados;
    }

    
    public function crearControles($datos)
    {
        $this->db->query('INSERT INTO tbl_controles(identificacion, fechae, fechas) VALUES (:identificacion, :fechae, :fechas);');
        
        // Vinculamos los valores que llegan del formulario con la consulta sql
        $this->db->bind(':identificacion', $datos['identificacion']);
        $this->db->bind(':fechae', $datos['fechae']);
        $this->db->bind(':fechas', $datos['fechas']);
        // Ejecutamos la consulta
        if ($this->db->execute()) {
            return 'Inserción exitosa';
        } else {
            return 'Error en la inserción';
        }
    }
   
    public function actualizarControles($datos)
    {
        $this->db->query('UPDATE tbl_controles SET identificacion = :identificacion, fechae = :fechae, fechas = :fechas
         WHERE idcontrol = :id');

        // Vinculamos los valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':identificacion', $datos['identificacion']);
        $this->db->bind(':fechae', $datos['fechae']);
        $this->db->bind(':fechas', $datos['fechas']);

        // Ejecutar
        if ($this->db->execute()) {
            return 'Actualizó con exito';
        } else {
            return 'Error en la actualización';
        }
    }
    
    public function eliminarControles($datos)
    {
        $this->db->query('DELETE FROM tbl_controles WHERE idcontrol = :id');
        $this->db->bind(':id', $datos['id_control']);

        // Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

