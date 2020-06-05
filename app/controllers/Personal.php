<?php

class Personal extends Controlador
{
    public function __construct()
    {
        $this->personalmodelo = $this->modelo('PersonalModelo');
    }

    /*
     Método que muestra la VISTA correspondiente
     @param N/A
     @return /views/PersonalVista
     @throws Respuesta Negativa renderizando la vista
     */
    public function index()
    {
        $this->vista('Personal/PersonalVista');
    }

    /*
    Método que consulta la BD para poder llenar el DATATABLE
    @param N/A
    @return Archivo Json con todos los Personales
    @throws Respuesta Negativa de la base de datos
    */
    public function llenarTablaPersonal()
    {
        $datos = $this->personalmodelo->obtenerPersonal();
        echo json_encode($datos);
    }

     /*
    Método que Crea o inserta un Personal en la base de datos, usando el modelo correspondiente
    @param los datos que llegan del formulario
    @return Respuesta de la base de datos en formato JSON para JS
    @throws Respuesta Negativa de la base de datos
    */
    public function crearPersonal()
    {
        $id=$_POST['id'];
        
        if (empty($id)) {
            $datos = [
                'identificacion' => $_POST['identificacion'],
                'nombre' => $_POST['nombre'],
                'telefono' => $_POST['telefono'],
                'correo' => $_POST['correo'],
                'fichaformacion' => $_POST['fichaformacion'],
                'rol' => $_POST['rol']
        ];
            $datos = $this->personalmodelo->crearPersonal($datos);
            echo json_encode($datos);
        } else {
            $datos = [
                'id' => $_POST['id'],
                'identificacion' => $_POST['identificacion'],
                'nombre' => $_POST['nombre'],
                'telefono' => $_POST['telefono'],
                'correo' => $_POST['correo'],
                'fichaformacion' => $_POST['fichaformacion'],
                'rol' => $_POST['rol']
                    
        ];
            $datos = $this->personalmodelo->actualizarPersonal($datos);
            echo json_encode($datos);
        }
    }

    /*
    Método que Elimina un Personal en la base de datos, usando el modelo correspondiente
    @param El id del Personal que llegan del formulario
    @return Respuesta de la base de datos en formato JSON para JS
    @throws Respuesta Negativa de la base de datos
    */
    public function eliminarPersonal()
    {
        $datos =[
            'id_personal' => $_POST['id']
        ];

        $datos = $this->personalmodelo->eliminarPersonal($datos);
        echo json_encode($datos);
    }
}