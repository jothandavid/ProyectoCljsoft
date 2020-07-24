<?php

class RptUsuarios extends Controlador
{
    public function __construct()
    {
        $this->usuariomodelo = $this->modelo('UsuarioModelo');
    }

    public function index()
    {
        $datos = $this->usuariomodelo->obtenerUsuario();
        $this->vista('Reportes/totalusuarios', $datos);
    }
}