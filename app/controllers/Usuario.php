<?php
class Usuario extends Controlador
{
    public function __construct()
    {
        $this->usuariomodelo = $this->modelo('Usuariomodelo');
    }
    /*
     Método que muestra la VISTA correspondiente
     @param N/A
     @return /views/UsuarioVista
     @throws Respuesta Negativa renderizando la vista
     */
    public function index()
    {
        $this->vista('Usuario/UsuarioVista');
    }

    /*
    Método que consulta la BD para poder llenar el DATATABLE
    @param N/A
    @return Archivo Json con todos los Usuarios
    @throws Respuesta Negativa de la base de datos
    */
    public function llenarTablaUsuario()
    {
        $datos = $this->usuariomodelo->obtenerUsuario();
        echo json_encode($datos);
    }

    /*
    Método que Crea o inserta un Usuario en la base de datos, usando el modelo correspondiente
    @param los datos que llegan del formulario
    @return Respuesta de la base de datos en formato JSON para JS
    @throws Respuesta Negativa de la base de datos
    */
    public function crearUsuario()
    {
        $id=$_POST['id'];
        
        if (empty($id)) {
            $datos = [
                'nombre' => $_POST['nombre'],
                'usuario' => $_POST['usuario'],
                'clave' => $_POST['clave'],
                'rol' => $_POST['rol']
        ];
            $datos = $this->usuariomodelo->crearUsuario($datos);
            echo json_encode($datos);
        } else {
            $datos = [
                'id' => $_POST['id'],
                'nombre' => $_POST['nombre'],
                'usuario' => $_POST['usuario'],
                'clave' => $_POST['clave'],
                'rol' => $_POST['rol']
                    
        ];
            $datos = $this->usuariomodelo->actualizarUsuario($datos);
            echo json_encode($datos);
        }
    }   

    /*
    Método que Elimina un Usuario en la base de datos, usando el modelo correspondiente
    @param El id del Usuario que llegan del formulario
    @return Respuesta de la base de datos en formato JSON para JS
    @throws Respuesta Negativa de la base de datos
    */
    public function eliminarUsuario()
    {
        $datos =[
            'id_usuario' => $_POST['id']
        ];

        $datos = $this->usuariomodelo->eliminarUsuario($datos);
        echo json_encode($datos);
    }
}