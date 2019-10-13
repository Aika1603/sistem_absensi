<?php
$hasil="";
$perpass='';
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
include "koneksi.php";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(mysqli_connect_errno()){
echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();}
$user_name=mysqli_real_escape_string($koneksi,$_POST['user_name']); 
$no_hp=mysqli_real_escape_string($koneksi,$_POST['no_hp']);
$id_mengajar=mysqli_real_escape_string($koneksi,$_POST['kelas']);  
$email=mysqli_real_escape_string($koneksi,$_POST['email']); 
$password=mysqli_real_escape_string($koneksi,$_POST['password']); 
$password2=mysqli_real_escape_string($koneksi,$_POST['password2']); 
if($password !== $password2){$perpass = '
		<br/><div class="alert alert-danger" role="alert">
        <strong>Password Tidak Sama!</strong> </br>Silahkan periksa kembali password anda
</div>';}else{
	$perpass='';
$password=md5($password); // Encrypted Pasword
$sql="Insert into user(user_name,user_akses,password,avatar,kelas,no_hp,email) values('$user_name','user', '$password','avatar.png', '$id_mengajar','$no_hp','$email');";
$result=mysqli_query($koneksi,$sql);
$hasil = '
		<br/><div class="alert alert-success" role="alert">
        <strong>Registrasi Sukses!</strong> </br>Silahkan kembali pada menu login...
       </div>';
};};
?>

<html>
<head>
<title>Registrasi Sistem Absensi</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css1/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css1/style3.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css1/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<script src="js1/jquery-1.10.2.min.js"></script>
<!--clock init-->
</head> 
<body>
								<!--/login-->
								
									   <div class="error_page">
												<!--/login-top-->
												
													<div class="error-top">
													<div class="login">
														<h3 class="inner-tittle t-inner">Registrasi User</h3>
																<!--<div class="buttons login">
																			<ul>
																				<li><a href="#" class="hvr-sweep-to-right">Facebook</a></li>
																				<li class="lost"><a href="#" class="hvr-sweep-to-left">Twitter</a> </li>
																				<div class="clearfix"></div>
																			</ul>
																		</div>--></br>
																<form action="" name="frmUser" method="post">
																		<input type="text" class="text" name="email"   placeholder="Alamat Email" required>
																		<input type="text" class="text" name="user_name"   placeholder="Nama lengkap" required>
																		<input type="text" class="text" name="no_hp"   placeholder="No. HP" required>
																		<input type="text" class="text" name="kelas"   placeholder="kelas" required>
																		<input type="password" name="password" placeholder="Password" required>
																		<input type="password" name="password2" placeholder="Masukan Ulang Password" required>
																		
																		<br/><?php echo $hasil;?><?php echo $perpass;?>
																		
																		<div class="submit"><input type="submit"  value="Daftar" ></div>
																		<a href="index.php"><div class="btn btn-default">Login</div></a>
																		<div class="clearfix"></div>
																		
																	</form>
														</div>

														
													</div>
													
													
												<!--//login-top-->
										   </div>
						
										  	<!--//login-->
										    <!--footer section start-->
										<div class="footer">
												
										</div>
									<!--footer section end-->
									<!--/404-->
<!--js -->
<script src="js1/jquery.nicescroll.js"></script>
<script src="js1/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js1/bootstrap.min.js"></script>
</body>
</html>