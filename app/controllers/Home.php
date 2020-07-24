<?php

	class Home extends Controlador 
	{
		private $sesion;
		public function __construct() 
		{
			$this->usuariomodelo = $this->modelo('UsuarioModelo');
		}

		public function index() 
		{
			$this->vista('home/Homevista');
		}

		public function ValidarIngreso()
        {
            if (isset($_POST['usuario']) && isset($_POST['password'])) {
                $usuario= filter_var(trim($_POST['usuario']), FILTER_SANITIZE_STRING);
                $clave= filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
                $datos =[
                    'usuario' => strtolower($usuario),
                    'password' =>  $clave];
                $datos = $this->usuariomodelo->validarIngreso($datos);
                if ($datos[0]->ususuario!='') {
                    session_start();                    
					$_SESSION['nombre'] =  $datos[0]->usnombre;
					$_SESSION['login'] =  $datos[0]->ususuario;
                    $_SESSION['rol'] =  $datos[0]->usrol;
                    echo json_encode('true');
                } else {
                    echo json_encode('false');
                }
            } else {
                echo json_encode('false');
            }
		}
		
	}
