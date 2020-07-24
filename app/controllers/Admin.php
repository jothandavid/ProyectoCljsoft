<?php
class Admin extends Controlador
{
    public function __construct()
    {
    }
   
    public function index()
    {
        $this->vista('Admin/AdminVista');
    }

    public function cerrarSesion()
    {
        session_start();
        session_unset();
        session_destroy();
        redireccionar('/home');
    }
}