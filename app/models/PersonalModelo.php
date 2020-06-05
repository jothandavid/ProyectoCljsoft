<?php

class PersonalModelo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtenerPersonal()
    {
        $this->db->query('SELECT * from tbl_personal');
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function contarPersonal()
    {
        $this->db->query('SELECT count(*) from tbl_personal');
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function mostrarUnPersonal()
    {
        $this->db->query('SELECT * from tbl_personal where idpersonal = 10');
        $resultados = $this->db->registros();
        return $resultados;
    }

    
    public function crearPersonal($datos)
    {
        $this->db->query('INSERT INTO tbl_personal (identificacion, nombre, telefono,correo,fichaformacion,rol) VALUES (:identificacion, :nombre, :telefono,
         :correo, :fichaformacion, :rol);');
        
        // Vinculamos los valores que llegan del formulario con la consulta sql
        $this->db->bind(':identificacion', $datos['identificacion']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':telefono', $datos['telefono']);
        $this->db->bind(':correo', $datos['correo']);
        $this->db->bind(':fichaformacion', $datos['fichaformacion']);
        $this->db->bind(':rol', $datos['rol']);
        // Ejecutamos la consulta
        if ($this->db->execute()) {
            return 'Inserción exitosa';
        } else {
            return 'Error en la inserción';
        }
    }
   
    public function actualizarPersonal($datos)
    {
        $this->db->query('UPDATE tbl_personal SET identificacion = :identificacion, nombre = :nombre, telefono = :telefono,
        correo = :correo, fichaformacion=:fichaformacion, rol = :rol
        WHERE idpersonal = :id');

        // Vinculamos los valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':identificacion', $datos['identificacion']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':telefono', $datos['telefono']);
        $this->db->bind(':correo', $datos['correo']);
        $this->db->bind(':fichaformacion', $datos['fichaformacion']);
        $this->db->bind(':rol', $datos['rol']);

        // Ejecutar
        if ($this->db->execute()) {
            return 'Actualizó con exito';
        } else {
            return 'Error en la actualización';
        }
    }
    
    public function eliminarPersonal($datos)
    {
        $this->db->query('DELETE FROM tbl_personal WHERE idpersonal = :id');
        $this->db->bind(':id', $datos['id_personal']);

        // Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}