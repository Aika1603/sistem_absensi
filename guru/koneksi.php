<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "1";
$db_name = "db_alikhlas";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
?>