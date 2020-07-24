<?php

class UsuarioModelo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtenerUsuario()
    {
        $this->db->query('SELECT * from tbl_usuario');
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function contarUsuario()
    {
        $this->db->query('SELECT count(*) from tbl_usuario');
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function mostrarUnUsuario()
    {
        $this->db->query('SELECT * from tbl_usuario where idusuario = 10');
        $resultados = $this->db->registros();
        return $resultados;
    }

    
    public function crearUsuario($datos)
    {
        $this->db->query('INSERT INTO tbl_usuario (usnombre, ususuario, usclave,usrol) VALUES (:nombre,  :usuario, :clave,
         :rol);');
        
        // Vinculamos los valores que llegan del formulario con la consulta sql
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':usuario', $datos['usuario']);
        $this->db->bind(':clave', $datos['clave']);
        $this->db->bind(':rol', $datos['rol']);
        // Ejecutamos la consulta
        if ($this->db->execute()) {
            return 'Inserción exitosa';
        } else {
            return 'Error en la inserción';
        }
    }
   
    public function actualizarUsuario($datos)
    {
        $this->db->query('UPDATE tbl_usuario SET usnombre = :nombre, ususuario = :usuario, usclave = :clave,
        usrol = :rol
        WHERE idusuario = :id');

        // Vinculamos los valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':usuario', $datos['usuario']);
        $this->db->bind(':clave', $datos['clave']);
        $this->db->bind(':rol', $datos['rol']);
        // Ejecutar
        if ($this->db->execute()) {
            return 'Actualizó con exito';
        } else {
            return 'Error en la actualización';
        }
    }
    
    public function eliminarUsuario($datos)
    {
        $this->db->query('DELETE FROM tbl_usuario WHERE idusuario = :id');
        $this->db->bind(':id', $datos['id_usuario']);

        // Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}