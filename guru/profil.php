<!DOCTYPE HTML>
<?php
session_start();
if(isset($_SESSION["user_id"])) 
{ if(($_SESSION["user_akses"]) == "guru") 
{?>
<html>
<?php include "head.html";?>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <?php include "nav.php";
		include "func.php";
		
		
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
 width: 150px;
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
																			<strong>ID Mengajar</strong>
																			<br>
																			<p class="text-muted"><?php echo $_SESSION["id_mengajar"];?></p>
																		</div>
																	 
																	 <div class="about-info-p">
																			<strong>NIP</strong>
																			<br>
																			<p class="text-muted"><?php echo $_SESSION["NIP"];?></p>
																		</div>
																		<div class="about-info-p">
																			<strong>Nama Lengkap</strong>
																			<br>
																			<p class="text-muted"><?php echo $_SESSION["nama"];?></p>
																		</div>
																		<div class="about-info-p">
																			<strong>User Name</strong>
																			<br>
																			<p class="text-muted"><?php echo $_SESSION["user_name"];?></p>
																		</div>
																		<div class="about-info-p m-b-0">
																			<strong>Jenis Kelamin</strong>
																			<br>
																			<p class="text-muted"><?php echo $_SESSION["id_jk"];?></p>
																		</div>
																		<div class="about-info-p m-b-0">
																			<strong>Tempat Lahir</strong>
																			<br>
																			<p class="text-muted"><?php echo $_SESSION["tempat_lahir"];?></p>
																		</div>
																		<div class="about-info-p m-b-0">
																			<strong>Tanggal Lahir</strong>
																			<br>
																			<p class="text-muted"><?php echo tanggal($_SESSION["tgl_lahir"]);?></p>
																		</div>
																		<div class="about-info-p m-b-0">
																			<strong>Status</strong>
																			<br>
																			<p class="text-muted">Guru</p>
																		</div>
																		<div class="about-info-p m-b-0">
																			<strong>Kepegawaian</strong>
																			<br>
																			<p class="text-muted"><?php echo $_SESSION["status"];?></p>
																		</div>
																		<div class="about-info-p m-b-0">
																			<strong>Jabatan</strong>
																			<br>
																			<p class="text-muted"><?php echo $_SESSION["jabatan"];?></p>
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
																			<strong>Alamat</strong>
																			<br>
																			<p class="text-muted"><?php echo $_SESSION["alamat"];?></p>
																		</div>
																		<div class="about-info-p m-b-0">
																			<strong>Status Wali Kelas</strong>
																			<br>
																			<p class="text-muted">Kelas			: <?php echo $_SESSION["kelas"];?></p>
												
																		</div>
																	</div>
																 </div>
																<br/>
																<h3 class="inner-tittle two">Alamat </h3>
																	
																     <div class="main-grid3 map">
	
																			 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.749260534831!2d107.29276698901752!3d-6.296644914097092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6977e381771633%3A0x9f2849d656a0cefb!2sSMA+Negeri+5+Karawang!5e0!3m2!1sid!2sid!4v1497324382477" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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