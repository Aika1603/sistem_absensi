<?php 		
session_start();	
include "koneksi.php";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
};
				if(isset($_POST['save'])){
$user_name = htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['user_name']));
$user_id = $_SESSION["user_id"];
$akses = $_SESSION["user_akses"]; 
//$avatar =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['avatar'])) ;
$pass =  htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['password'])) ;
$pass=md5($pass);
$alamat =  htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['alamat'])) ;
$email =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['email'])) ;
$no_hp =  mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['no_hp']));
				
				$update = mysqli_query($koneksi,"UPDATE ".$akses." SET user_name='$user_name', password='$pass', alamat='$alamat', email='$email', no_hp='$no_hp' WHERE user_id='$user_id'");
				if($update){
$sql = mysqli_query($koneksi, "SELECT * FROM ".$akses." WHERE user_id='$user_id'");
$row = mysqli_fetch_assoc($sql);
$_SESSION["user_id"] = $row[user_id];
$_SESSION["user_name"] = $row[user_name];
$_SESSION["user_akses"] = $row[user_akses];
$_SESSION["avatar"] = $row[avatar];
$_SESSION["alamat"] = $row[alamat];
$_SESSION["email"] = $row[email];
$_SESSION["no_hp"] = $row[no_hp];
					header("Location:edit_profil.php?kondisi=ya");
					
				}else{
					header("Location:edit_profil.php?kondisi=tidak");
				}
			}