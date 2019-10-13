
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<?php
session_start();
$peringatan="";
if(count($_POST)>0) {
include ("koneksi.php");
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE user_name='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'");
$row = mysqli_fetch_assoc($sql);
if(is_array($row)) {
$_SESSION["user_id"] = $row[user_id];
$_SESSION["user_name"] = $row[user_name];
$_SESSION["user_akses"] = $row[user_akses];
$_SESSION["avatar"] = $row[avatar];

} else {
	?>
		<script language="JavaScript">
			alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
			
		</script>
		<?php
		$peringatan = '
		<br/><div class="alert alert-danger" role="alert">
        <strong>Login gagal!</strong> </br>Silahkan periksa kembali username dan password anda.
       </div>';
}
}
if(isset($_SESSION["user_id"])) {
header("Location:menu.php");
}
?>
<html>
<head>
<title>Login Sistem Absensi</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css1/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css1/style1.css" rel='stylesheet' type='text/css' />
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
														<h3 class="inner-tittle t-inner">Sistem Absensi</h3>
																<!--<div class="buttons login">
																			<ul>
																				<li><a href="#" class="hvr-sweep-to-right">Facebook</a></li>
																				<li class="lost"><a href="#" class="hvr-sweep-to-left">Twitter</a> </li>
																				<div class="clearfix"></div>
																			</ul>
																		</div>--></br>
																<form action="" name="frmUser" method="post">
																		<input type="text" class="text" name="user_name" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}" >
																		<input type="password" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
																		<br/><?php echo $peringatan;?>
																		
																		<div class="submit"><input type="submit" onclick="myFunction()" value="Login" ></div>
																		<div class="clearfix"></div>
																		
																		<div class="new">
																			<p><label class="checkbox11"><input type="checkbox" name="checkbox"><i> </i>Lupa Password ?</label></p>
																			<p class="sign">Belum punya akun ? <a href="sign.html">Daftar</a></p>
																			<div class="clearfix"></div>
																		</div>
																		
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