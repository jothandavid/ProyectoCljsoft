<?php
//Incluímos a la clase PDF_MC_Table
require RUTA_APP.'/fpdf/PDF_MC_Table.php' ;
//Instanciamos la clase para generar el documento pdf
$pdf=new PDF_MC_Table();
$pdf->AliasNbPages();
//Agregamos la primera página al documento pdf
$pdf->AddPage();

//Seteamos el inicio del margen superior en 25 pixeles
$y_axis_initial = 15;

//Seteamos el tipo de letra y creamos el título de la página. No es un encabezado no se repetirá
$pdf->SetFont('Courier', 'B', 9);
$pdf->Cell(40, 6, '', 0, 0, 'C');
$pdf->Cell(100, 5, 'Listado General de Usuarios', 1, 0, 'C');
$pdf->Ln(10);

//Creamos las celdas para los títulos de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Courier', 'B', 9);
$pdf->Cell(60, 5, 'Nombre', 1, 0, 'C', 1);
$pdf->Cell(50, 5, utf8_decode('Usuario'), 1, 0, 'C', 1);
$pdf->Cell(50, 5, utf8_decode('Clave'), 1, 0, 'C', 1);
$pdf->Cell(30, 5, 'Rol', 1, 0, 'C', 1);

$pdf->Ln(10);

$pdf->SetWidths(array(60,50,50,30));

foreach ($datos as $index => $valor) {
    $nombre = $valor ->usnombre;
    $usuario = $valor ->ususuario;
    $clave = $valor ->usclave;
    $rol = $valor ->usrol;
    $pdf->SetFont('Courier', '', 8);
    $pdf->Row(array($nombre,$usuario,$clave,$rol));
}


//Mostramos el documento pdf
$pdf->Output();
