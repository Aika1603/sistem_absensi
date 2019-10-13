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
	if(($_SESSION["user_akses"]) == "guru") 
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
        <strong>Oh snap!</strong> Akun Anda belum selesai.</div>';};
		
		date_default_timezone_set('Asia/Jakarta');
		
		$hari = date('D');
		if($hari == "Sun"){$hari = "AHAD";}
		else if($hari == "Mon"){$hari = "SENIN";}
		else if($hari == "Tue"){$hari = "SELASA";}
		else if($hari == "Wed"){$hari = "RABU";}
		else if($hari == "Thu"){$hari = "KAMIS";}
		else if($hari == "Fri"){$hari = "JUMAT";}
		else {$hari = "SABTU";};
		
		
		$now	=	date('H:i:s');
		$nol = date('H:i:s', strtotime('07:00:00')); 
		$satu = date('H:i:s', strtotime('08:00:00')); 
		$dua = date('H:i:s', strtotime('09:30:00'));
		$tiga = date('H:i:s', strtotime('11:00:00')); 
		$empat = date('H:i:s', strtotime('12:00:00'));
		$lima = date('H:i:s', strtotime('01:00:00 pm')); 
		$enam = date('H:i:s', strtotime('02:00:00 pm'));
		$tujuh = date('H:i:s', strtotime('03:00:00 pm')); 
		 
		
		if($now <= $satu and $now>=$nol){$jam_belajar = 1;}
		else if($now <= $dua){$jam_belajar = 2;}
		else if($now <= $tiga){$jam_belajar = 3;}
		else if($now <= $empat){$jam_belajar = 4;}
		else if($now <= $lima){$jam_belajar = 5;}
		else if($now <= $enam){$jam_belajar = 6;}
		else if($now <= $tujuh){$jam_belajar = 7;}else {$jam_belajar = "";};
		
		
		
		
		?>
      </div>
     	
		
      <div class="col_1">
		    <div class="col-md-3 span_7">	
		      <div class="cal1 cal_2"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">July 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day adjacent-month last-month calendar-day-2015-06-28"><div class="day-contents">28</div></td><td class="day adjacent-month last-month calendar-day-2015-06-29"><div class="day-contents">29</div></td><td class="day adjacent-month last-month calendar-day-2015-06-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-01"><div class="day-contents">1</div></td><td class="day calendar-day-2015-07-02"><div class="day-contents">2</div></td><td class="day calendar-day-2015-07-03"><div class="day-contents">3</div></td><td class="day calendar-day-2015-07-04"><div class="day-contents">4</div></td></tr><tr><td class="day calendar-day-2015-07-05"><div class="day-contents">5</div></td><td class="day calendar-day-2015-07-06"><div class="day-contents">6</div></td><td class="day calendar-day-2015-07-07"><div class="day-contents">7</div></td><td class="day calendar-day-2015-07-08"><div class="day-contents">8</div></td><td class="day calendar-day-2015-07-09"><div class="day-contents">9</div></td><td class="day calendar-day-2015-07-10"><div class="day-contents">10</div></td><td class="day calendar-day-2015-07-11"><div class="day-contents">11</div></td></tr><tr><td class="day calendar-day-2015-07-12"><div class="day-contents">12</div></td><td class="day calendar-day-2015-07-13"><div class="day-contents">13</div></td><td class="day calendar-day-2015-07-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-07-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-07-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-07-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-07-18"><div class="day-contents">18</div></td></tr><tr><td class="day calendar-day-2015-07-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-07-20"><div class="day-contents">20</div></td><td class="day calendar-day-2015-07-21"><div class="day-contents">21</div></td><td class="day calendar-day-2015-07-22"><div class="day-contents">22</div></td><td class="day calendar-day-2015-07-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-07-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-07-25"><div class="day-contents">25</div></td></tr><tr><td class="day calendar-day-2015-07-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-07-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-07-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-07-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-07-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-08-01"><div class="day-contents">1</div></td></tr></tbody></table></div></div>
				
			</div> <hr/> 
		    <div class="grid_3 grid_5 col-md-9 span_8">
		     
		        
   <?php
   //awal menu 2
include("koneksi.php");
						
						//include("func.php");
						$id_mengajar = $_SESSION["id_mengajar"];
						//melhat jadwal pelajaran
					$jadwal = mysqli_query($koneksi, "SELECT * FROM tb_jadwalpelajaran WHERE hari = '$hari' and id_mengajar='$id_mengajar' and jam_belajar = '$jam_belajar' ");	
						if(mysqli_num_rows($jadwal) == 0)
							{echo '<div class="alert alert-danger" role="alert">
        <strong>Maaf! </strong> Belum waktunya mengisi absensi. Tidak ada jadwal</div>';}
						else 
							{
				$baris = mysqli_fetch_assoc($jadwal);
							$id_pelajaran = $baris['id_pelajaran'];	
							$kelas = $baris['kelas'];	
							$materi = $baris['materi'];	
							
					
								
					
				
				
					?> 
					
						
				<?php
					$waktu = mysqli_query($koneksi, "SELECT * FROM tb_jambelajar WHERE jam_belajar='$jam_belajar' ");	
					$isi = mysqli_fetch_assoc($waktu);
					$mulai = $isi['mulai'];
					$selesai = $isi['selesai'];
					$tanggal   = date('Y-m-d');
					$now	=	date('H:i:s');
		$mulai = date('H:i:s', strtotime($mulai)); 
		//echo $mulai; echo $selesai;
		$selesai = date('H:i:s', strtotime($selesai));
		if($mulai <= $now and $now <= $selesai){$time = TRUE;}else{$time = '';};
		if($time){echo '<div class="alert alert-success" role="alert">
        <strong>Sudah Waktunya!</strong> Silahkan Anda input absen hari ini.</div>';};
				//melihat isi absen pelajaran
					$cek = mysqli_query($koneksi, "SELECT * FROM tb_absenpelajaran WHERE tanggal = '$tanggal' and kelas='$kelas' and id_pelajaran='$id_pelajaran'");
						if(mysqli_num_rows($cek) == 0)
							{
								
							if($time)
							{
							echo '<div class="but_list">
							<div class="alert alert-success" role="alert">Silahkan isi absensi tanggal  
							
					';			
					
				$tgl   = date('Y-m-d H:i:s');
				echo "<b>".date('d-m-Y')."</b>";echo " Pukul ";echo "<b>".date('H:i:s')."</b>"; echo " untuk kelas <b>".$kelas."</b> & pelajaran <b>".$materi.""; echo'</b></div>
						</div>';
		      					
								
							if(isset($_POST['no']) == 'NULL'){
								$no = mysqli_real_escape_string($koneksi,$_POST['no']);
								$nis = "nis01";
								$nama = "nama01";
								$status = "status01";
								$pertemuan = mysqli_real_escape_string($koneksi,$_POST['pertemuan']);
									for($isi=1;$isi<$no;$isi++){
										$NIS = mysqli_real_escape_string($koneksi,$_POST[''.$nis.'']);
										$NAMA = mysqli_real_escape_string($koneksi,$_POST[''.$nama.'']);
										$kelas = mysqli_real_escape_string($koneksi,$_POST['kelas']);
										$tanggal   = mysqli_real_escape_string($koneksi,$_POST['tanggal']);
										$STATUS = mysqli_real_escape_string($koneksi,$_POST[''.$status.'']);
											if($STATUS == 'M'){$keterangan = "Hadir";}else{$keterangan = "Tidak Hadir";}
												$INSERT = mysqli_query($koneksi, "INSERT INTO tb_absenpelajaran 
												VALUES ('','$id_pelajaran','$id_mengajar','$NIS', '$NAMA', '$kelas', '$pertemuan', '$tanggal', '$STATUS', '$keterangan')");
	 
												$nis++;
												$nama++;
												$status++;
												//echo $kelas;echo '</br>';echo $NIS ; echo '</br>';
									};
								if (($INSERT) === TRUE) {   
									
								}else {   
									echo "<div class='alert alert-danger'>Data baru gagal dibuat: </div>";  
								} echo "<div class='alert alert-success'><b>Absensi Sudah Masuk!</b> Silahkan anda kembali mengajar...</div>";
							}else{
				
				
				?>
			<form class="form-horizontal" name="kirim" method="post" action="">
				<div class="form-group">
				<label class="col-sm-3 control-label"></label>
					<div class="col-sm-6">
						<input type="text" name="pertemuan" class="form-control1"  placeholder="Pertemuan Ke-" required>
						
					</div>
				</div>
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
							echo '<div class="alert alert-danger" role="alert">
        <strong>Maaf !</strong> Belum waktunya mengisi absensi</div>';
		?>
			
		
					

						<?php
								 }
							}else {
							echo "<div class='alert alert-success'><b>Absensi Sudah Masuk!</b> Silahkan anda mulai pembelajaran...</div>";};};	
						?>
		
<?php 

$koneksi->close();    
//akhir menu 2
?>	

    
		         
		    
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