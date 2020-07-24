<?php

class RptBienes extends Controlador
{
    public function __construct()
    {
        $this->bienesmodelo = $this->modelo('BienesModelo');
    }

    public function index()
    {
        $datos = $this->bienesmodelo->obtenerBienes();
        $this->vista('Reportes/totalbienes', $datos);
    }
}