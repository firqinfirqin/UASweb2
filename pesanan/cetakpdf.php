<?php
require('../fpdf.php');
$pdf = new FPDF('l','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,7,'Data Pesanan',0,1,'L');


$pdf->Cell(10,7,'',0,1); //space

$pdf->SetFont('Arial','B',10);
$pdf->Cell(6,8,'ID',1,0);
$pdf->Cell(50,8,'Jenis Restoran',1,0);
$pdf->Cell(100,8,'Makanan',1,0);
$pdf->Cell(15,8,'Harga',1,0);
$pdf->Cell(33,8,'Nama',1,0);
$pdf->Cell(30,8,'No Hp',1,0);
$pdf->Cell(45,8,'Email',1,1);

$pdf->SetFont('Arial','',10);

include '../koneksi.php';
$select = mysqli_query($koneksi, "select * from pesanan");
while ($row = mysqli_fetch_array($select)){
    $pdf->Cell(6,10,$row['id'],1,0);
    $pdf->Cell(50,10,$row['jenis_resto'],1,0);
    $pdf->Cell(100,10,$row['makanan'],1,0);    
    $pdf->Cell(15,10,$row['harga'],1,0); 
    $pdf->Cell(33,10,$row['nama'],1,0); 
    $pdf->Cell(30,10,$row['no_hp'],1,0); 
    $pdf->Cell(45,10,$row['email'],1,1); 
}

$pdf->Output();
?>
