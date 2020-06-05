<?php

class Controles extends Controlador
{
    public function __construct()
    {
        $this->controlesmodelo = $this->modelo('ControlesModelo');
    }

    /*
     Método que muestra la VISTA correspondiente
     @param N/A
     @return /views/ControlesVista
     @throws Respuesta Negativa renderizando la vista
     */
    public function index()
    {
        $this->vista('Controles/ControlesVista');
    }
    
    /*
    Método que consulta la BD para poder llenar el DATATABLE
    @param N/A
    @return Archivo Json con todos los Controles
    @throws Respuesta Negativa de la base de datos
    */
    public function llenarTablaControles()
    {
        $datos = $this->controlesmodelo->obtenerControles();
        echo json_encode($datos);
    }

    /*
    Método que Crea o inserta un Control en la base de datos, usando el modelo correspondiente
    @param los datos que llegan del formulario
    @return Respuesta de la base de datos en formato JSON para JS
    @throws Respuesta Negativa de la base de datos
    */
    public function crearControles()
    {
        $id=$_POST['id'];
        
        if (empty($id)) {
            $datos = [
                'identificacion' => $_POST['identificacion'],
                'fechae' => $_POST['fechae'],
                'fechas' => $_POST['fechas']
        ];
            $datos = $this->controlesmodelo->crearControles($datos);
            echo json_encode($datos);
        } else {
            $datos = [
                'id' => $_POST['id'],
                'identificacion' => $_POST['identificacion'],
                'fechae' => $_POST['fechae'],
                'fechas' => $_POST['fechas']
                    
        ];
            $datos = $this->controlesmodelo->actualizarControles($datos);
            echo json_encode($datos);
        }
    }

    /*
    Método que Elimina un Control en la base de datos, usando el modelo correspondiente
    @param El id de Controles que llegan del formulario
    @return Respuesta de la base de datos en formato JSON para JS
    @throws Respuesta Negativa de la base de datos
    */
    public function eliminarControles()
    {
        $datos =[
            'id_control' => $_POST['id']
        ];

        $datos = $this->controlesmodelo->eliminarControles($datos);
        echo json_encode($datos);
    }
}
