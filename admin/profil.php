<!DOCTYPE HTML>
<?php
session_start();
if(isset($_SESSION["user_id"])) 
{ if(($_SESSION["user_akses"]) == "admin") 
{?>
<html>
<?php include "head.html";?>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <?php include "nav.php";
		
		
		
		?>
		<div class="outter-wp">
		<div id="page-wrapper">
        <div class="graphs">
		<div class="grid_3 grid_5">
									<!--sub-heard-part-->
									  <div class="sub-heard-part">
									   <ol class="breadcrumb m-b-0">
											<li><a href="index.html">Home</a></li>
											<li class="active">Profile</li>
										</ol>
									   </div>
								    <!--//sub-heard-part-->
										<!--/profile-->
										<h3 class="sub-tittle pro">Profile</h3>
									       <div class="profile-widget">
														<a href="avatar_profil.php?user_name=<?php echo $_SESSION["user_name"]?>"><img src="images/<?php echo $_SESSION["avatar"];?>" alt=" " style=" 
 height: 150px;
  -webkit-border-radius: 50em;
  -moz-border-radius: 50em;
  border-radius: 5em;
  border: 5px solid #c0caff;
  margin-top: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  position:center;"/></a>
														<h3 class="inner-tittle two"><?php echo $_SESSION["user_name"];?></h3>
														<p><?php echo $_SESSION["user_akses"];?></p>
													</div>
														<!--/profile-inner-->
														 <div class="profile-section-inner">
														       <div class="col-md-6 ">
																	<h3 class="inner-tittle">Data Diri </h3>
																	<div class="main-grid3 ">
																     <div class="p-20">
																		<div class="about-info-p">
																			<strong>Nama Lengkap</strong>
																			<br>
																			<p class="text-muted"><?php echo $_SESSION["user_name"];?></p>
																		</div>
																		<div class="about-info-p">
																			<strong>Handphone</strong>
																			<br>
																			<p class="text-muted"><?php echo $_SESSION["no_hp"];?></p>
																		</div>
																		<div class="about-info-p">
																			<strong>Email</strong>
																			<br>
																			<p class="text-muted"><a href="mailto:<?php echo $_SESSION["email"];?>"><?php echo $_SESSION["email"];?></a></p>
																		</div>
																		<div class="about-info-p m-b-0">
																			<strong>Lokasi</strong>
																			<br>
																			<p class="text-muted"><?php echo $_SESSION["alamat"];?></p>
																		</div>
																	</div>
																 </div>
																<br/>
																<h3 class="inner-tittle two">Alamat </h3>
																	
																     <div class="main-grid3 map">
	
																			  <iframe src="https://www.google.co.id/maps/place/SMA+Negeri+5+Karawang/@-6.2962432,107.2936912,17z/data=!4m12!1m6!3m5!1s0x2e6977e381771633:0x9f2849d656a0cefb!2sSMA+Negeri+5+Karawang!8m2!3d-6.2962485!4d107.2958799!3m4!1s0x2e6977e381771633:0x9f2849d656a0cefb!8m2!3d-6.2962485!4d107.2958799?hl=en"></iframe>
																							<div class="gmap-info">
																									<h4> <i class="fa fa-map-marker"></i> <b><a href="#" class="text-dark">Sistem Absensi</a></b></h4>
																									<p><?php echo $_SESSION["alamat"];?></p>
																									 
																								</div>
																	
																	</div>
																    
															  </div>
															   
																<div class="clearfix"></div>
															</div>
															
											 	<!--//profile-inner-->
												<!--//profile-->
									</div>
								</div>
								</div>
								</div>
								</div>
								<div class="clearfix"> </div>
								   <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
;}else{{header ("location:logout.php");}};
}else
{header ("location:../index.php");}
?>