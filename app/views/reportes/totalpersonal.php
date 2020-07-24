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
$pdf->Cell(100, 5, 'Listado General de Personal', 1, 0, 'C');
$pdf->Ln(10);

//Creamos las celdas para los títulos de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Courier', 'B', 7);
$pdf->Cell(25, 5, 'Identificacion', 1, 0, 'C', 1);
$pdf->Cell(58, 5, 'Nombre', 1, 0, 'C', 1);
$pdf->Cell(20, 5, utf8_decode('Telefono'), 1, 0, 'C', 1);
$pdf->Cell(50, 5, utf8_decode('Email'), 1, 0, 'C', 1);
$pdf->Cell(25, 5, 'Ficha Formacion', 1, 0, 'C', 1);
$pdf->Cell(15, 5, 'Rol', 1, 0, 'C', 1);

$pdf->Ln(10);

$pdf->SetWidths(array(25,58,20,50,25,15));

foreach ($datos as $index => $valor) {
    $ident = $valor ->identificacion;
    $nombre = $valor ->nombre;
    $telefono = $valor ->telefono;
    $email = $valor ->correo;
    $ficha = $valor ->fichaformacion;
    $rol = $valor ->rol;
    $pdf->SetFont('Courier', '', 7);
    $pdf->Row(array(number_format($ident),$nombre,$telefono,$email,$ficha,$rol));
}


//Mostramos el documento pdf
$pdf->Output();
