<?php
session_start();
if(isset($_SESSION["user_id"])) 
{if(($_SESSION["user_akses"]) == "user") 
{
include "koneksi.php";
$kelasn = mysqli_real_escape_string($koneksi,($_GET['ln']));
if(($_GET['ln']) !== '0' ){
$per_page=10;
if (isset($_GET["page"])) {

$no = $_GET["no"];
$page = $_GET["page"];

}

else {
$no=1;
$page=1;

}

// Page will start from 0 and Multiple by Per Page
$start_from = ($page-1) * $per_page;

require('fpdf/fpdf.php');
/**
 Judul  : Laporan PDF (portait):
 Level  : Menengah
 Author : Hakko Bio Richard
 Blog   : www.hakkoblogs.com
 Web    : www.niqoweb.com
 Email  : hakkobiorichard@ygmail.com
 
 Untuk tutorial yang lainnya silahkan berkunjung ke www.hakkoblogs.com
 
 Butuh jasa pembuatan website, aplikasi, pembuatan program TA dan Skripsi.? Hubungi NiqoWeb ==>> 085694984803
 
 **/
//Menampilkan data dari tabel di database

$result=mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE kelas='$kelasn' LIMIT $start_from, $per_page") or die(mysqli_error());

//Inisiasi untuk membuat header kolom
$column_no = "";
$column_NIS = "";
$column_NISN = "";
$column_nama = "";
$column_id_jk = "";
$column_kelas = "";
$column_tgl_lahir = "";
$column_tempat_lahir = "";
$column_email = "";
$column_no_hp = "";
$column_alamat = "";


//For each row, add the field to the corresponding column
//if(mysqli_num_rows($result) <= 15){

for($row;$row = mysqli_fetch_assoc($result);$row++)
{
	
    $no ;
	$NIS = $row["NIS"];
	$NISN = $row["NISN"];
    $nama = $row["nama"];
	if($row["id_jk"] == 'Laki-laki'){
		$id_jk = 'L';}
		else{$id_jk = 'P';};
	$kelas = $row["kelas"];
	$tgl_lahir = $row["tgl_lahir"];
    $tempat_lahir = $row["tempat_lahir"];
    $email = $row["email"];
	$no_hp = $row["no_hp"];
    $alamat = $row["alamat"];

$column_no = $column_no.$no."\n";
$column_NIS = $column_NIS.$NIS."\n";
$column_NISN = $column_NISN.$NISN."\n";
$column_nama = $column_nama.$nama."\n";
$column_id_jk = $column_id_jk.$id_jk."\n";
$column_kelas = $column_kelas.$kelas."\n";
$column_tgl_lahir = $column_tgl_lahir.$tgl_lahir."\n";
$column_tempat_lahir = $column_tempat_lahir.$tempat_lahir."\n";
$column_email = $column_email.$email."\n";
$column_no_hp = $column_no_hp.$no_hp."\n";
$column_alamat = $column_alamat.$alamat."\n"; 
 $no++;
  
  }

//Create a new PDF file
$pdf = new FPDF('L','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('../foto/logo.png',10,10,-175);

$pdf->SetFont('Times','',17);
$pdf->Image('images/SMAN5.jpg',48,12,25);
$pdf->Ln();

$pdf->Cell(120);
$pdf->Cell(30,10,'DINAS PENDIDIKAN, PEMUDA, DAN OLAHRAGA',0,0,'C');

$pdf->Ln();
$pdf->Cell(120);
$pdf->Cell(30,10,'SMA NEGERI 5 KARAWANG',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Times','',10);
$pdf->Cell(120);
$pdf->Cell(30,10,'Jln. Jend. Ahmad Yani No. 10 Karawang Timur',0,0,'C');
$pdf->line(36,40, 250,40 );

$pdf->SetFont('Times','',12);
$pdf->Ln();
$pdf->Cell(120);
$pdf->Cell(30,10,'Daftar Siswa Kelas '.$kelasn.'',0,0,'C');
$pdf->Ln();
$pdf->Cell(120);
$pdf->Cell(30,5,'Tahun Pelajaran 2016/2017',0,0,'C');
$pdf->Ln();


//Fields Name position

$Y_Fields_Name_position = 60;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Times','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(10);
$pdf->Cell(8,8,'No',1,0,'C',1);
$pdf->SetX(18);
$pdf->Cell(20,8,'NIS',1,0,'C',1);
$pdf->SetX(38);
$pdf->Cell(40,8,'Nama',1,0,'C',1);
$pdf->SetX(78); 
$pdf->Cell(15,8,'NISN',1,0,'C',1);
$pdf->SetX(93);
$pdf->Cell(25,8,'L/P',1,0,'C',1);
$pdf->SetX(118);
$pdf->Cell(25,8,'Tempat Lahir',1,0,'C',1);
$pdf->SetX(143);
$pdf->Cell(50,8,'Tanggal Lahir',1,0,'C',1);
$pdf->SetX(193); 
$pdf->Cell(35,8,'Alamat',1,0,'C',1);
$pdf->SetX(228); 
$pdf->Cell(50,8,'Email',1,0,'C',1);

$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 68;

//Now show the columns
$pdf->SetFont('Arial','',8);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(10);
$pdf->MultiCell(8,6,$column_no,1,'C',1);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(18);
$pdf->MultiCell(20,6,$column_NIS,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(38);
$pdf->MultiCell(40,6,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(78);
$pdf->MultiCell(15,6,$column_NISN,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(93);
$pdf->MultiCell(25,6,$column_id_jk,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(118);
$pdf->MultiCell(25,6,$column_tempat_lahir,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(143);
$pdf->MultiCell(50,6,$column_tgl_lahir,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(193);
$pdf->MultiCell(35,6,$column_alamat,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(228);
$pdf->MultiCell(50,6,$column_email,1,'L');

//}else 




$pdf->SetFont('Times','',12);
$pdf->Ln();
$pdf->Cell(220);
$pdf->Cell(30,10,'Kepala SMAN 5 KARAWANG',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->Cell(220);
$pdf->Cell(30,40,'(___________________)',0,0,'C');

$pdf->Output();
}else{

?>
					<script language="JavaScript">
			alert('Anda belum memilih kelas yang akan dicetak! silahkan pilih berdasarkan kelas terlebih dahulu');
			document.location='datasiswa.php';
		</script><?php

};}else{{header ("location:logout.php");}};}else{header ("location:../index.php");}
?>