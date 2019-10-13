<!DOCTYPE HTML>
<?php
session_start();
if(isset($_SESSION["user_id"])) 
{ if(($_SESSION["user_akses"]) == "user") 
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
																			<strong>Alamat</strong>
																			<br>
																			<p class="text-muted"><?php echo $_SESSION["alamat"];?></p>
																		</div>
																		<div class="about-info-p m-b-0">
																			<strong>Status Kelas</strong>
																			<br>
																			<p class="text-muted">Kelas			:<?php echo $_SESSION["kelas"];?></p>
																			<p class="text-muted">Wali Kelas	:<?php echo $_SESSION["wali_kelas"];?></p>
																		</div>
																	</div>
																 </div>
																<br/>
																<h3 class="inner-tittle two">Alamat </h3>
																	
																     <div class="main-grid3 map">
	
																			  <iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Karawang,+Central+Java,+Indonesia&amp;aq=0&amp;oq=purwo&amp;sll=37.0625,-95.677068&amp;sspn=50.291089,104.238281&amp;ie=UTF8&amp;hq=&amp;hnear=Purwokerto,+Banyumas,+Central+Java,+Indonesia&amp;ll=-7.431391,109.24783&amp;spn=0.031022,0.050898&amp;t=m&amp;z=14&amp;output=embed"></iframe>
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