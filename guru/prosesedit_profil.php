<?php 		
session_start();	
include "koneksi.php";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
};
				if(isset($_POST['save'])){
$user_name = htmlspecialchars($_POST['user_name']);
$user_id = $_SESSION["user_id"];
$akses = $_SESSION["user_akses"]; 
$nama = htmlspecialchars($_POST['nama']) ;
$NIP = htmlspecialchars($_POST['NIP']) ;
$id_jk = htmlspecialchars($_POST['id_jk']) ;

$tgl_lahir = htmlspecialchars($_POST['tgl_lahir']) ;
$tempat_lahir = htmlspecialchars($_POST['tempat_lahir']) ;

$alamat = htmlspecialchars($_POST['alamat']) ;
$email = htmlspecialchars($_POST['email']) ;
$no_hp = htmlspecialchars($_POST['no_hp']);
				
				$update = mysqli_query($koneksi,"UPDATE ".$akses." SET user_name='$user_name',tgl_lahir='$tgl_lahir', tempat_lahir='$tempat_lahir', NIP='$NIP', nama='$nama', alamat='$alamat', email='$email', no_hp='$no_hp', id_jk='$id_jk' WHERE user_id='$user_id'");
				if($update){
$sql = mysqli_query($koneksi, "SELECT * FROM ".$akses." WHERE user_id='$user_id'");
$row = mysqli_fetch_assoc($sql);
$_SESSION["user_id"] = $row[user_id];
$_SESSION["user_name"] = $row[user_name];
$_SESSION["user_akses"] = $row[user_akses];
$_SESSION["avatar"] = $row[avatar];

$_SESSION["alamat"] = $row[alamat];
$_SESSION["email"] = $row[email];
$_SESSION["id_jk"] = $row[id_jk];
$_SESSION["NIP"] = $row[NIP];

$_SESSION["tgl_lahir"] = $row[tgl_lahir];
$_SESSION["tempat_lahir"] = $row[tempat_lahir];
$_SESSION["nama"] = $row[nama];
$_SESSION["no_hp"] = $row[no_hp];
					header("Location:edit_profil.php?kondisi=ya");
					
				}else{
					echo '<div class="alert alert-danger">Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}