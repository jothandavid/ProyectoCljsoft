<?php

class RptPersonal extends Controlador
{
    public function __construct()
    {
        $this->personalmodelo = $this->modelo('PersonalModelo');
    }

    public function index()
    {
        $datos = $this->personalmodelo->obtenerPersonal();
        $this->vista('Reportes/totalpersonal', $datos);
    }
}