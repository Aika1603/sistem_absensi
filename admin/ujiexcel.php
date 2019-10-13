<?php
session_start();
if(isset($_SESSION["user_id"])) 
{
include "koneksi.php";
$kelasn = mysqli_real_escape_string($koneksi,($_GET['ln']));
$tanggal1 = mysqli_real_escape_string($koneksi,($_GET['tgl1']));
$tanggal2 = mysqli_real_escape_string($koneksi,($_GET['tgl2']));
if(($_GET['ln']) !== '0' ){
require_once 'Classes/PHPExcel.php';

include ("func.php");
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Asep Saepul Pahmit");

$objPHPExcel->getSheet(0)->setTitle('Sheet Ke-1');


// Add a drawing to the worksheet
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Logo');
$objDrawing->setDescription('Logo');
$objDrawing->setPath('images/SMAN5.jpg');
$objDrawing->setCoordinates('C2');
$objDrawing->setHeight(110);
$objDrawing->setWidth(110);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
 
$objPHPExcel->getActiveSheet()->getStyle('A6:M1000')->getFont()->setName('Times New Roman');
$objPHPExcel->getActiveSheet()->getStyle('A6:M1000')->getFont()->setSize(12);
 

//taanggal
$tanggal10 = $tanggal1;
$awaldate = strtotime("$tanggal10");
$startdate = strtotime("$tanggal1");
$enddate = strtotime("$tanggal2");

$p = ceil(($enddate-$startdate)/60/60/24);
	$g = 4;
	$g2 = 10;
					for($a=0;$a<=$p;$g++){
					$objPHPExcel->getSheet(0)
					->setCellValueByColumnAndRow($g, $g2, date("d", $startdate));
					
					$startdate = strtotime("+1 days", $startdate);$a++;$g2++;};
			
	
// Kop Laporan
$objPHPExcel->getActiveSheet()->mergeCellsByColumnAndRow(2,$g2, 5,$g2);
$objPHPExcel->getActiveSheet()->setCellValue('C2', "PEMERINTAH KABUPATEN KARAWANG");

// mengeset sheet pertama yang aktif
$objPHPExcel->setActiveSheetIndex(0);


//posisi kertas
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
$objPHPExcel->getActiveSheet()->getPageMargins()->setTop(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setRight(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(0.75);
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
 
// Set title row bold;
// Set fills
// Set autofilter
 // Always include the complete filter range!
 // Excel does support setting only the caption
 // row, but that's not a best practise...
$objPHPExcel->getActiveSheet()->setAutoFilter($objPHPExcel->getActiveSheet()->calculateWorksheetDimension());
 
 
// output file dengan nama file 'contoh.xls'
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Datakelas.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
}else{

?>
					<script language="JavaScript">
			alert('Anda belum memilih kelas yang akan dicetak! silahkan pilih berdasarkan kelas terlebih dahulu');
			document.location='datasiswa.php';
		</script><?php

}}else{header('index.php');}
?>

