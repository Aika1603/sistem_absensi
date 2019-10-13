<?php
session_start();
if(isset($_SESSION["user_id"])) 
{ if(isset($_SESSION["user_akses"]) == "user") 
{
include "koneksi.php";

$kelasn = mysqli_real_escape_string($koneksi,($_GET['ln']));
if(($_GET['ln']) !== '0' ){
	

$SQL = mysqli_query($koneksi, "SELECT * FROM tb_kelas WHERE kelas='$kelasn'");
$ROW = mysqli_fetch_assoc($SQL);
$wali_kelas = $ROW['wali_kelas'];

	
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
 
// Kop Laporan
$objPHPExcel->getActiveSheet()->mergeCells('C2:M2');
$objPHPExcel->getActiveSheet()->setCellValue('C2', "PEMERINTAH KABUPATEN KARAWANG");
$objPHPExcel->getActiveSheet()->mergeCells('C3:M3');
$objPHPExcel->getActiveSheet()->setCellValue('C3', "DINAS PENDIDIKAN, PEMUDA, DAN OLAHRAGA");
$objPHPExcel->getActiveSheet()->mergeCells('C4:M4');
$objPHPExcel->getActiveSheet()->setCellValue('C4', "SMA NEGERI 5 KARAWANG");
$objPHPExcel->getActiveSheet()->mergeCells('C5:M5');
$objPHPExcel->getActiveSheet()->setCellValue('C5', "Jln. Jend. Ahmad Yani No. 10 Karawang Timur");
$objPHPExcel->getActiveSheet()->mergeCells('A7:B7');
$objPHPExcel->getActiveSheet()->setCellValue('A7', "Data Siswa Kelas");
$objPHPExcel->getActiveSheet()->setCellValue('C7', ": ".$kelasn);//isi kelas disini
$objPHPExcel->getActiveSheet()->mergeCells('A8:B8');
$objPHPExcel->getActiveSheet()->setCellValue('A8', "Wali Kelas ");
$objPHPExcel->getActiveSheet()->setCellValue('C8', ": ".$wali_kelas);//isi guru disini
$objPHPExcel->getActiveSheet()->getStyle('A2:M5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$objPHPExcel->getActiveSheet()->getStyle('C2:M5')->getFont()->setName('Times New Roman');
$objPHPExcel->getActiveSheet()->getStyle('C3:M4')->getFont()->setSize(20);
$objPHPExcel->getActiveSheet()->getStyle('C5')->getFont()->setSize(12);
$objPHPExcel->getActiveSheet()->getStyle('C2')->getFont()->setSize(22);
$objPHPExcel->getActiveSheet()->getStyle('C2:M4')->getFont()->setBold(true);
//garis bawah

$objPHPExcel->getActiveSheet()->getStyle('A6:M6')->applyFromArray(
 array(
 'font' => array(
 'bold' => true
 ),
 'alignment' => array(
 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
 ),
 'borders' => array(
 'top' => array(
 'style' => PHPExcel_Style_Border::BORDER_MEDIUM
 )
 ),
 'endcolor' => array(
 'argb' => 'FFFFFFFF'
 )
 )
 )
;

//MEmanggil Database
$sql = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE kelas='".$kelasn."'");

			if(mysqli_num_rows($sql) == 0){
 					echo '<tr><td colspan="8">Tidak ada data. Silahkan cari berdasarkan Kelas atau Nama Siswa. </td></tr>';
				}else{
					$baris = 10;
					$no=1;
					for($row;$row = mysqli_fetch_assoc($sql);$row++){
					$objPHPExcel->getSheet(0)
                    ->setCellValue('A'.$baris, $no)
                    ->setCellValue('B'.$baris, $row['NIS'])
					->setCellValue('C'.$baris, $row['NISN'])
					->setCellValue('D'.$baris, $row['nama'])
					->setCellValue('E'.$baris, $row['id_jk'])
					->setCellValue('F'.$baris, $row['tempat_lahir'].",".tanggal($row['tgl_lahir']))
					->setCellValue('G'.$baris, $row['alamat'])
					->setCellValue('H'.$baris, $row['no_hp'])
					->setCellValue('I'.$baris, $row['kelas'])
					->setCellValue('J'.$baris, $row['email']);
					$baris++;$no++;
					}
				;};	

//Tabel Laporan
$sharedStyle2 = new PHPExcel_Style();
$sharedStyle2->applyFromArray(
 array('borders' => array(
 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
 'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
 'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
 'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
 ),
 ));
 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A9:M40");

//isi header tabel
$sharedStyle1 = new PHPExcel_Style();
$sharedStyle1->applyFromArray(
 array('borders' => array(
 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
 'top' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
 'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
 'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
 ),
 ));
 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A9:M9");
$objPHPExcel->getActiveSheet()->setCellValue('A9', "No")
 ->setCellValue('B9', "NIS")
 ->setCellValue('C9', "NISN")
 ->setCellValue('D9', "Nama")
 ->setCellValue('E9', "L/P")
 ->setCellValue('F9', "Tmp&Tgl.Lahir")
 ->setCellValue('G9', "Alamat")
 ->setCellValue('H9', "No.Telp/HP")
 ->setCellValue('I9', "Kelas")
 ->setCellValue('J9', "Email");

 //Lebar Tabel DAN Posisi Teks
 $objPHPExcel->getActiveSheet()->getStyle('A6:M1000')->getFont()->setName('Times New Roman');
$objPHPExcel->getActiveSheet()->getStyle('A9:M1000')->getFont()->setSize(9);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4.43);
$objPHPExcel->getActiveSheet()->getStyle('A9:M9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A9:A40')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(11.14);
$objPHPExcel->getActiveSheet()->getStyle('B9:B40')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(11.14);
$objPHPExcel->getActiveSheet()->getStyle('C9:C40')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getStyle('I9:I40')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


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
header('Content-Disposition: attachment;filename="Datakelas'.$kelasn.'.xlsx"');
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

};}else{{header ("location:logout.php");}};}else{header('../index.php');}
?>

