<?php
session_start();
if(isset($_SESSION["user_id"])) 
{ if(isset($_SESSION["user_akses"]) == "user") 
{
include "koneksi.php";
$kelasn = mysqli_real_escape_string($koneksi,($_GET['ln']));
$tanggal1 = mysqli_real_escape_string($koneksi,($_GET['tgl1']));
$tanggal2 = mysqli_real_escape_string($koneksi,($_GET['tgl2']));
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
 

//taanggal
$tanggal10 = $tanggal1;
$awaldate = strtotime("$tanggal10");
$startdate = strtotime("$tanggal1");
$enddate = strtotime("$tanggal2");

$p = ceil(($enddate-$startdate)/60/60/24);
	$g = 'D';
					for($a=0;$a<=$p;$g++){
					$objPHPExcel->getSheet(0)
					->setCellValue($g.'10',date("d", $startdate));
					$startdate = strtotime("+1 days", $startdate);$a++;};
					$r = $g;
					$u = $r;
	 $x = $r;
for($a=1;$a<=4;$a++){
;$x++;}
// Kop Laporan
$objPHPExcel->getActiveSheet()->mergeCells('C2:'.$x.'2');
$objPHPExcel->getActiveSheet()->setCellValue('C2', "PEMERINTAH KABUPATEN KARAWANG");
$objPHPExcel->getActiveSheet()->mergeCells('C3:'.$x.'3');
$objPHPExcel->getActiveSheet()->setCellValue('C3', "DINAS PENDIDIKAN, PEMUDA, DAN OLAHRAGA");
$objPHPExcel->getActiveSheet()->mergeCells('C4:'.$x.'4');
$objPHPExcel->getActiveSheet()->setCellValue('C4', "SMA NEGERI 5 KARAWANG");
$objPHPExcel->getActiveSheet()->mergeCells('C5:'.$x.'5');
$objPHPExcel->getActiveSheet()->setCellValue('C5', "Jln. Jend. Ahmad Yani No. 10 Karawang Timur");
$objPHPExcel->getActiveSheet()->mergeCells('A7:B7');
$objPHPExcel->getActiveSheet()->setCellValue('A7', "Kelas");
$objPHPExcel->getActiveSheet()->setCellValue('C7', ": ".$kelasn);//isi kelas disini
$objPHPExcel->getActiveSheet()->mergeCells('A8:B8');
$objPHPExcel->getActiveSheet()->setCellValue('A8', "Wali Kelas ");
$objPHPExcel->getActiveSheet()->setCellValue('C8', ": ".$wali_kelas);//isi guru disini
$objPHPExcel->getActiveSheet()->mergeCells('A6:'.$x.'6');
$objPHPExcel->getActiveSheet()->setCellValue('A6', "Rekapitulasi Absen Tanggal ".tanggal($tanggal1)." Sampai Tanggal ".tanggal($tanggal2)."");
$objPHPExcel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A2:M6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$objPHPExcel->getActiveSheet()->getStyle('C2:'.$x.'5')->getFont()->setName('Times New Roman');
$objPHPExcel->getActiveSheet()->getStyle('C3:'.$x.'4')->getFont()->setSize(20);
$objPHPExcel->getActiveSheet()->getStyle('C5')->getFont()->setSize(12);
$objPHPExcel->getActiveSheet()->getStyle('C2')->getFont()->setSize(22);
$objPHPExcel->getActiveSheet()->getStyle('C2:'.$x.'4')->getFont()->setBold(true);
//garis bawah

$objPHPExcel->getActiveSheet()->getStyle('A6:'.$x.'6')->applyFromArray(
 array(
 'font' => array(
 'bold' => true
 ),
 'alignment' => array(
 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
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
				
		
$sql = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE kelas='$kelasn'");
				
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Tidak ada data.</td></tr>';
				}else{
					$sakit=0;
					$alfa=0;
					$ijin=0;
					$masuk=0;
					$nomor = 1;
					$baris = 11;
					$a=0;
						$msk = array();
						$skt = array();
						$ijn = array();
						$alf = array();
						$isi = 0;
						for($i=1;$i<=40;$i++){
						$msk[$isi] = 0;
						$skt[$isi] = 0;
						$ijn[$isi] = 0;
						$alf[$isi] = 0;
						$isi++;}
						$bb=11;
							$c='D';
$z = $r;
for($b=0;$b<=0;$b++){
;$z++;}
					for($row;$row = mysqli_fetch_assoc($sql);$row++){
						
						$objPHPExcel->getSheet(0)
						->setCellValue('A'.$baris, $nomor)
						->setCellValue('B'.$baris, $row['NIS'])
						->setCellValue('C'.$baris, $row['nama']);
					
							$awaldate = strtotime("$tanggal10");
							$NIS = $row['NIS'];
							$p;
							$c='D';
$z = $r;
for($b=0;$b<=0;$b++){
;$z++;}
							for($o=0;$o<=$p;$o++)
							{ 
							$tgl = date('Y-m-d', $awaldate);
							$sdl = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE NIS='$NIS' and tanggal='$tgl'");
							$raw = mysqli_fetch_assoc($sdl);
							$objPHPExcel->getSheet(0)
							->setCellValue($c.$bb, $raw['status']);
							if($raw['status']=="M"){
							
							$msk[$a]+=1;
							$masuk=$masuk+1;}else
							
							if($raw['status']=="S"){
							$skt[$a]+=1;
							$sakit=$sakit+1;}else
							
							if($raw['status']=="I"){
							$ijn[$a]+=1;
							$ijin=$ijin+1;}else
								
							if($raw['status']=="A"){
							$alf[$a]+=1;
							$alfa=$alfa+1;}
							
							$awaldate = strtotime("+1 days", $awaldate);
							$c++;
							};
							//jumlah
$objPHPExcel->getActiveSheet()->setCellValue($z++.$bb, $msk[$a])
 ->setCellValue($z++.$bb, $skt[$a])
 ->setCellValue($z++.$bb, $ijn[$a])
  ->setCellValue($z.$bb, $alf[$a]);
 //->setCellValue('D9', "Nama")
 //->setCellValue('E9', "L/P")
 //->setCellValue('F9', "Tmp&Tgl.Lahir");
							
						
						
						;$bb++;
						$baris++;
						$nomor++;
						$a++;
						;
						
				}
				//$objPHPExcel->getSheet(0)
					//	->setCellValue($r.$baris, 'M')
						//->setCellValue($r++.$baris, $row['nama']);
				};


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

$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A9:".$x."40");

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
 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A9:".$x."10");
$objPHPExcel->getActiveSheet()->mergeCells('A9:A10');
$objPHPExcel->getActiveSheet()->setCellValue('A9', "No");
$objPHPExcel->getActiveSheet()->mergeCells('B9:B10');
 $objPHPExcel->getActiveSheet()->setCellValue('B9', "NIS");
 $objPHPExcel->getActiveSheet()->mergeCells('C9:C10');
 $objPHPExcel->getActiveSheet()->setCellValue('C9', "Nama");
$objPHPExcel->getActiveSheet()->mergeCells('D9:'.$u--.'9');
 $objPHPExcel->getActiveSheet()->setCellValue('D9', "Tanggal");
 $y = $r;
for($a=0;$a<=0;$a++){
;$y++;}
 $objPHPExcel->getActiveSheet()->mergeCells($y.'9:'.$x.'9');

$objPHPExcel->getActiveSheet()->setCellValue($y.'9', "Jumlah");
$objPHPExcel->getActiveSheet()->setCellValue($y++.'10', "M");

$objPHPExcel->getActiveSheet()->setCellValue($y++.'10', "S");
$objPHPExcel->getActiveSheet()->setCellValue($y++.'10', "I");
$objPHPExcel->getActiveSheet()->setCellValue($y.'10', "A");

 $objPHPExcel->getActiveSheet()->setCellValue('B41', "Total Rekapitulasi Kelas : ");
 $objPHPExcel->getActiveSheet()->setCellValue('B42', "Masuk ");
 $objPHPExcel->getActiveSheet()->setCellValue('C42', ": ".$msk[$a]);
 $objPHPExcel->getActiveSheet()->setCellValue('B43', "Sakit ");
 
 $objPHPExcel->getActiveSheet()->setCellValue('C43', ": ".$skt[$a]);
 $objPHPExcel->getActiveSheet()->setCellValue('B44', "Alfa ");
 
 $objPHPExcel->getActiveSheet()->setCellValue('C44', ": ".$alf[$a]);
 $objPHPExcel->getActiveSheet()->setCellValue('B45', "Ijin ");
 
 $objPHPExcel->getActiveSheet()->setCellValue('C45', ": ".$ijn[$a]);
 //Lebar Tabel DAN Posisi Teks
 $objPHPExcel->getActiveSheet()->getStyle('A6:'.$x.'1000')->getFont()->setName('Times New Roman');
$objPHPExcel->getActiveSheet()->getStyle('A9:'.$x.'1000')->getFont()->setSize(10);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4.43);
$objPHPExcel->getActiveSheet()->getStyle('A9:M9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A9:A40')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(11.14);
$objPHPExcel->getActiveSheet()->getStyle('B9:B40')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getStyle('D9:D1000')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

for($s = 'D';$s <= 'Z'; $s++){
$objPHPExcel->getActiveSheet()->getColumnDimension($s)->setAutoSize(true);};
for($s = 'AA';$s <= $r; $s++){
$objPHPExcel->getActiveSheet()->getColumnDimension($s)->setAutoSize(true);};

$objPHPExcel->getActiveSheet()->getStyle('D9:'.$x.'40')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


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
$bulan = date('m');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="RekapAbsenKelas'.$kelasn.'.xlsx"');
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

