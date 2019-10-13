<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<?php
session_start();
if(isset($_SESSION["user_id"])) 
{
	if(($_SESSION["user_akses"]) == "admin") 
{?>
<html>
<?php include "head.html";?>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <?php include "nav.php";?>
	 <!-- End Navigation -->
        <div id="page-wrapper">
        <div class="graphs">
		<div class="grid_3 grid_5">
		<h3>Selamat Datang <?php echo $_SESSION["user_name"];?></h3>
		<?php if($_SESSION["avatar"] == "avatar.png"){echo '<div class="alert alert-danger" role="alert">
        <strong>Oh snap!</strong> Akun Anda belum selesai.</div>';};?>
       
		</div>
     	
		
      <div class="col_1">
		    <div class="col-md-3 span_7">	
		      <div class="cal1 cal_2"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">July 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day adjacent-month last-month calendar-day-2015-06-28"><div class="day-contents">28</div></td><td class="day adjacent-month last-month calendar-day-2015-06-29"><div class="day-contents">29</div></td><td class="day adjacent-month last-month calendar-day-2015-06-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-01"><div class="day-contents">1</div></td><td class="day calendar-day-2015-07-02"><div class="day-contents">2</div></td><td class="day calendar-day-2015-07-03"><div class="day-contents">3</div></td><td class="day calendar-day-2015-07-04"><div class="day-contents">4</div></td></tr><tr><td class="day calendar-day-2015-07-05"><div class="day-contents">5</div></td><td class="day calendar-day-2015-07-06"><div class="day-contents">6</div></td><td class="day calendar-day-2015-07-07"><div class="day-contents">7</div></td><td class="day calendar-day-2015-07-08"><div class="day-contents">8</div></td><td class="day calendar-day-2015-07-09"><div class="day-contents">9</div></td><td class="day calendar-day-2015-07-10"><div class="day-contents">10</div></td><td class="day calendar-day-2015-07-11"><div class="day-contents">11</div></td></tr><tr><td class="day calendar-day-2015-07-12"><div class="day-contents">12</div></td><td class="day calendar-day-2015-07-13"><div class="day-contents">13</div></td><td class="day calendar-day-2015-07-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-07-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-07-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-07-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-07-18"><div class="day-contents">18</div></td></tr><tr><td class="day calendar-day-2015-07-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-07-20"><div class="day-contents">20</div></td><td class="day calendar-day-2015-07-21"><div class="day-contents">21</div></td><td class="day calendar-day-2015-07-22"><div class="day-contents">22</div></td><td class="day calendar-day-2015-07-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-07-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-07-25"><div class="day-contents">25</div></td></tr><tr><td class="day calendar-day-2015-07-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-07-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-07-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-07-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-07-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-08-01"><div class="day-contents">1</div></td></tr></tbody></table></div></div>
				
			</div> <hr/> 
		    <div class="grid_3 grid_5 col-md-9 span_8">
		     
		        
   <?php
   //awal menu 2
include("koneksi.php");
						if(isset($_POST['kelas']) == 'NULL')
							{
						//include("func.php");
					?> 
					
						<div class="but_list">
							<div class="alert alert-success" role="alert">Absen Tanggal = 
							<?php
								
					$kelas =htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST["kelas"]));
				$tanggal   =htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST["tanggal"]));

				echo $tanggal; 
							?>
							</div>
						</div>
				<?php

					$cek = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE tanggal = '$tanggal' and kelas='$kelas'");
						if(mysqli_num_rows($cek) == 0)
							{
							if(isset($_POST['no']) == 'NULL'){
								$no =htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['no']));
								$nis = "nis01";
								$nama = "nama01";
								$status = "status01";
									for($isi=1;$isi<$no;$isi++){
										$NIS =htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST[''.$nis.'']));
										$NAMA =htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST[''.$nama.'']));
										$kelas =htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['kelas']));
										$tanggal   =htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['tanggal']));
										$STATUS =htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST[''.$status.'']));
											if($STATUS == 'M'){$keterangan = "Hadir";}else{$keterangan = "Tidak Hadir";}
												$INSERT = mysqli_query($koneksi, "INSERT INTO tb_absen 
												VALUES ('','$NIS', '$NAMA', '$kelas', '$tanggal', '$STATUS', '$keterangan')");
	 
												$nis++;
												$nama++;
												$status++;
												//echo $kelas;echo '</br>';echo $NIS ; echo '</br>';
									};
								if (($INSERT) === TRUE) {   
									echo "<div class='alert alert-success'>Data baru berhasil ditambahkan...</div>";  
								}else {   
									echo "<div class='alert alert-danger'>Data baru gagal dibuat: </div>" ;  
								}echo '<a href="menu.php"><button class="btn btn-primary">Kembali</button>';
							}else{
				?>
		<div class="bs-example4" data-example-id="simple-responsive-table">
		<div class="table-responsive">
      <table class="table table-bordered">
      
				<tr>
					<th>NO.</th>
					<th>NIS</th>
					<th>NAMA LENGKAP</th>
					<th>KELAS</th>
					<th>STATUS</th>
				</tr>
			<?php
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE kelas='$kelas'");
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Tidak ada data.</td></tr>';
				}else{
					$nis = "nis01";
					$nama = "nama01";
					$status = "status01";
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
				
						echo '
						<form  action="" method="post" name="kirim">
						<input type="hidden" name="tanggal" value="'.$tanggal.'"/>
						
						<tr>
							<td><center>'.$no.'<input type="hidden" name="'.$no.'" value="'.$no.'"/></td>
							<td>'.$row['NIS'].'<input type="hidden" name="'.$nis.'" value="'.$row['NIS'].'"/></td>
							<td>'.$row['nama'].'<input type="hidden" name="'.$nama.'" value="'.$row['nama'].'"/></td>
							
							<td>'.$row['kelas'].'<input type="hidden" name="kelas" value="'.$kelas.'"/></td>
						   
								<td>
							<input type="radio" name="'.$status.'" value="M" required><span class="label label-success" style="margin-left:10px;margin-top:5px;">Masuk</span></input>
							<input name="'.$status.'" type="radio" value="S" required><span class="label label-danger" style="margin-left:10px;margin-top:5px;">Sakit</span></input>
							<input type="radio" name="'.$status.'" value="I" required><span class="label label-info" style="margin-left:10px;margin-top:5px;">Ijin</span></input>
							<input name="'.$status.'" type="radio" value="A" required><span class="label label-success" style="margin-left:10px;margin-top:5px;">Alfa</span></input>
							
							</td>
							
							</tr>
						
						';
						$nis++;
						$status++;
						$nama++;
						$no++;
						
					}
				}
		    ?>
			</table>
				
				<input type="hidden" name="no" value="<?php echo $no ?>"/>
					<div class="">
						<input type="submit" class="btn btn-primary" value="Selesai">
					</div>
						</form></div>	</div>
						<?php
							}
							}else{
						?>
					<!--<div class='alert alert-danger'>Maaf, Input absen sudah pernah dilakukan...</div>-->
		<script language="JavaScript">
			alert('Input pada tanggal tersebut sudah pernah dilakukan. Silahkan diulang kembali!');
			document.write("<div class='alert alert-danger'>Maaf, Input absen sudah pernah dilakukan...</div>");	
		</script>
			<a href="menu.php"><button class="btn btn-primary">Kembali</button>
		
					

						<?php
								 }
							}else{
						?>
		<br/>
		<form action="" method="post" name="frmUser">

			<div class="form-group">
					<label class=" control-label">KELAS</label>
					
						<select name="kelas" class="form-control btn-primary" required>

						<option value="">Pilih Salah Satu  <span class="fa arrow"></span></option>
<?php $sq= mysqli_query($koneksi, "SELECT * FROM tb_kelas ORDER BY 'kelas' ASC"); 
		while($row = mysqli_fetch_assoc($sq)){?>
			
						<option value="<?php echo $row['kelas'];?>"><?php echo $row['kelas'];?></option>
	<?php }?>	
	</select>
					</div>
		
			
			
            <div class="form-group">
              <label class="control-label normal">Tanggal</label>
              <div class="input-group date" >
			  <input type="date" name="tanggal" class="form-control1  btn-primary" placeholder="Tanggal"  required="" >
            <div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					
			</div>
	<div class="form-group">
		<label class="control-label">&nbsp;</label>
			
				<input type="submit" class="btn btn-primary" value="Input Absen">
			
	</div>
		</form>	
<?php 
};
$koneksi->close();    
//akhir menu 2
?>	

    </div>
		 </div>        
		    
            <div class="clearfix"> </div>
	  </div>
	  
	<div class="span_11">
		
		  <!----Calender -------->
			<link rel="stylesheet" href="css/clndr.css" type="text/css" />
			<script src="js/underscore-min.js" type="text/javascript"></script>
			<script src= "js/moment-2.2.1.js" type="text/javascript"></script>
			<script src="js/clndr.js" type="text/javascript"></script>
			<script src="js/site.js" type="text/javascript"></script>
			<!----End Calender -------->
	
    <div class="content_bottom">
     
	   <div class="col-md-4 span_4">
		 
		  
		</div>
		<div class="clearfix"> </div>
	    </div>
		
		</div>
		
       </div></div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
</body>
</html>

<?php
}else{{header ("location:logout.php");}};
}else
{header ("location:../index.php");}
?>