<?php

class RptControles extends Controlador
{
    public function __construct()
    {
        $this->controlesmodelo = $this->modelo('ControlesModelo');
    }

    public function index()
    {
        $datos = $this->controlesmodelo->obtenerControles();
        $this->vista('Reportes/totalcontroles', $datos);
    }
}