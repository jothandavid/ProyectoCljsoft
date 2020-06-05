<?php

class Bienes extends Controlador
{
    public function __construct()
    {
        $this->bienesmodelo = $this->modelo('BienesModelo');
    }
    /*
     Método que muestra la VISTA correspondiente
     @param N/A
     @return /views/BienesVista
     @throws Respuesta Negativa renderizando la vista
     */
    public function index()
    {
        $this->vista('Bienes/BienesVista');
    }
    /*
    Método que consulta la BD para poder llenar el DATATABLE
    @param N/A
    @return Archivo Json con todos los Bienes
    @throws Respuesta Negativa de la base de datos
    */
    public function llenarTablaBienes()
    {
        $datos = $this->bienesmodelo->obtenerBienes();
        echo json_encode($datos);
    }

    /*
    Método que Crea o inserta un Bien en la base de datos, usando el modelo correspondiente
    @param los datos que llegan del formulario
    @return Respuesta de la base de datos en formato JSON para JS
    @throws Respuesta Negativa de la base de datos
    */
    public function crearBienes()
    {
        $id=$_POST['id'];
        
        if (empty($id)) {
            $datos = [
                'identificacion' => $_POST['identificacion'],
                'tipo' => $_POST['tipo'],
                'marca' => $_POST['marca'],
                'serie' => $_POST['serie']
        ];
            $datos = $this->bienesmodelo->crearBienes($datos);
            echo json_encode($datos);
        } else {
            $datos = [
                'id' => $_POST['id'],
                'identificacion' => $_POST['identificacion'],
                'tipo' => $_POST['tipo'],
                'marca' => $_POST['marca'],
                'serie' => $_POST['serie']                    
        ];
            $datos = $this->bienesmodelo->actualizarBienes($datos);
            echo json_encode($datos);
        }
    }

    /*
    Método que Elimina un Bien en la base de datos, usando el modelo correspondiente
    @param El id de Bienes que llegan del formulario
    @return Respuesta de la base de datos en formato JSON para JS
    @throws Respuesta Negativa de la base de datos
    */
    public function eliminarBienes()
    {
        $datos =[
            'id_bien' => $_POST['id']
        ];

        $datos = $this->bienesmodelo->eliminarBienes($datos);
        echo json_encode($datos);
    }
}