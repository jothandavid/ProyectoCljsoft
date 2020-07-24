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
$pdf->Cell(100, 5, 'Listado General de Bienes', 1, 0, 'C');
$pdf->Ln(10);

//Creamos las celdas para los títulos de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Courier', 'B', 9);
$pdf->Cell(40, 5, 'Identificacion', 1, 0, 'C', 1);
$pdf->Cell(50, 5, 'Tipo', 1, 0, 'C', 1);
$pdf->Cell(50, 5, 'Marca', 1, 0, 'C', 1);
$pdf->Cell(50, 5, 'Serie', 1, 0, 'C', 1);

$pdf->Ln(10);

$pdf->SetWidths(array(40,50,50,50));

foreach ($datos as $index => $valor) {
    $ident = $valor ->identificacion;
    $tipo = $valor ->tipo;
    $marca = $valor ->marca;
    $serie = $valor ->serie;
    $pdf->SetFont('Courier', '', 8);
    $pdf->Row(array(number_format($ident),$tipo,$marca,$serie));
}


//Mostramos el documento pdf
$pdf->Output();
