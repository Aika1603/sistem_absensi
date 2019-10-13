<!DOCTYPE HTML>
<?php
session_start();
if(isset($_SESSION["user_id"])) 
{ if(($_SESSION["user_akses"]) == "admin") 
{?>
<html>
<?php include "head.html";
include("koneksi.php");
include ("func.php");?>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <?php include "nav.php";?>
		
		<div id="page-wrapper">
		<div class="graphs">
		
		
		
		<?php 	if(isset($_GET['kelas'])){
			$kls = mysqli_real_escape_string($koneksi,$_GET['kelas']);}
							$cari = "'";	
							$adatidak = strpos($kls,$cari);
							if($adatidak == TRUE){echo"<div class='alert alert-danger'>Ups, ada karakter terlarang dalam sistem kami</div></div></h1>";}else{
						
			
			
			
			if(isset($_GET['aksi']) == 'delete'){
				$NIS = mysqli_real_escape_string($koneksi,$_GET['NIS']);
				$tanggal = mysqli_real_escape_string($koneksi,$_GET['tanggal']);
				$cek = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE NIS='$NIS' && tanggal='$tanggal'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info">Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM tb_absen WHERE NIS='$NIS'");
					if($delete){
						echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-info">Data gagal dihapus.</div>';
					}
				}
			}
			?>
			<div class="grid_6 grid_5">
			<form class="form-horizontal" method="POST">
			<div class="form-group">
				
				<label class="col-sm-2 control-label">Dari Tanggal :</label>
				<div class="col-sm-3">
				
				<?php $tanggal1 = (isset($_POST['tanggal1']) ? mysqli_real_escape_string($koneksi,($_POST['tanggal1'])) : 0);  ?>
             <input  type="date" name="tanggal1"class="form-control1" value="<?php 
			  if($tanggal1==0){echo "Dari Tanggal...";}
			  else{echo "$tanggal1";}
			  ?>" placeholder="Cari Tanggal.." onfocus="this.value = '<?php echo $tanggal1;?>';" onblur="if (this.value == '<?php echo $tanggal1;?>') {this.value = 'Search...';}">
            
						</div>
			<label class="col-sm-2 control-label">Sampai Tanggal :</label>
			<div class="col-sm-3">
			
			<?php $tanggal2 = (isset($_POST['tanggal2']) ? mysqli_real_escape_string($koneksi,($_POST['tanggal2'])) : 0);  ?>
              <input  type="date" name="tanggal2"class="form-control1" value="<?php 
			  if($tanggal2==0){echo "Sampai Tanggal...";}
			  else{echo "$tanggal2";}
			  ?>" placeholder="Cari Tanggal.." onfocus="this.value = '<?php echo $tanggal2;?>';" onblur="if (this.value == '<?php echo $tanggal2;?>') {this.value = 'Search...';}">
            
						</div>
			<input type="hidden" name="kelas" value="<?php echo $kls;?>"/>
			<div class="col-sm-2">
			<button name="cari" class="btn btn-success ">Cari</button>	</div>	
			</div>
				</form>
			</div>
		<br>
			<?php
			
			// Pengamanan pada tanggal
							
													






			if($tanggal2 && $tanggal1){
			
				?>
				
				
				
		<div class="grid_6 grid_5">
			<div class='but_list'><div class='alert alert-success'><h4> Hasil Rekapitulasi dari tanggal <i><b><?php echo tanggal($tanggal1);?></b></i> sampai tanggal <i><b><?php echo tanggal($tanggal2); ?></b></i> adalah :</h4></div>
					
			<div class="table-responsive" >
			<table class="table table-striped table-hover" border="1" >
				<tr>
					<th><center>NO.</th>
					<th><center>NIS</th>
					<th><center>NAMA</th>
					<?php
					
$tanggal10 = $tanggal1;
$awaldate = strtotime("$tanggal10");
$startdate = strtotime("$tanggal1");
$enddate = strtotime("$tanggal2");

$p = ceil(($enddate-$startdate)/60/60/24);




?>
					<?php 
					
					while ($startdate <= $enddate){
					echo'<th><center>'.date("d", $startdate).'</th>';
					$startdate = strtotime("+1 days", $startdate);};?>
					<th><center>JUMLAH</th>
					
			</tr>
				<?php
				
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE kelas='$kls'");
				
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Tidak ada data.</td></tr>';
				}else{
					$sakit=0;
					$alfa=0;
					$ijin=0;
					$masuk=0;
					$no = 1;
					$a=0;
						$msk = array();
						$skt = array();
						$ijn = array();
						$alf = array();
						$isi = 0;
						for($i=1;$i<=40;$i++){
						$msk[$isi] = 0;
						$skt[$isi] = 0;
						$ijn[$isi] = 0;
						$alf[$isi] = 0;
						$isi++;}
					
					for($row;$row = mysqli_fetch_assoc($sql);$row++){
						
						echo '
						
						<tr>
							<td><center>'.$no.'</td>
							
							<td>'.$row['NIS'].'</td>
							<td>'.$row['nama'].'</td>	
							
							';
							
							 
							
							$awaldate = strtotime("$tanggal10");
							$NIS = $row['NIS'];
							$p;
							
							for($b=0;$b<=$p;$b++)
							{ 
							$tgl = date('Y-m-d', $awaldate);
							$sdl = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE NIS='$NIS' and tanggal='$tgl'");
							$raw = mysqli_fetch_assoc($sdl);
							echo '<td><center>'.$raw['status'].'</td>';
							if($raw['status']=="M"){
							
							$msk[$a]+=1;
							$masuk=$masuk+1;}else
							
							if($raw['status']=="S"){
							$skt[$a]+=1;
							$sakit=$sakit+1;}else
							
							if($raw['status']=="I"){
							$ijn[$a]+=1;
							$ijin=$ijin+1;}else
								
							if($raw['status']=="A"){
							$alf[$a]+=1;
							$alfa=$alfa+1;}
							
							$awaldate = strtotime("+1 days", $awaldate);
							};
							echo '<td><center>Masuk = '.$msk[$a].' Sakit = '.$skt[$a].' Ijin = '.$ijn[$a].' alfa = '.$alf[$a].'</td>';
							
							echo '
							
						</tr>
						
						';
						$no++;
						$a++;
						;
						
					};
					$no-=1;$p = ($p+1)*$no;
				}	
				?>
				</table>
				</div>
					
			
		<hr/>
		<?php if(isset($masuk)){?>
			<div class="widget_1">
		<div class='h4'>
		Rekapitulasi Total :
		</div>
			<div class="col-sm-3 widget_1_box">
                <div class="tile-progress bg-info">
                    <div class="content">
                        <h4><i class="fa fa-dashboard icon-sm"></i> Masuk = <?php echo $masuk;?></h4>
                        <div class="progress"><div class="progress-bar inviewport animated visible slideInLeft" style="width: <?php $persenmasuk = ($masuk/$p)*100; echo $persenmasuk;?>%;"></div></div>
                        <span><?php echo $persenmasuk;?>% terpenuhi</span>
                    </div>
                </div>
             </div>
             <div class="col-sm-3 widget_1_box">
                <div class="tile-progress bg-primary">
                    <div class="content">
                        <h4><i class="fa fa-dashboard icon-sm"></i> Sakit = <?php echo $sakit;?></h4>
                        <div class="progress"><div class="progress-bar inviewport animated visible slideInLeft" style="width: <?php $persensakit = ($sakit/$p)*100; echo $persensakit;?>;"></div></div>
                        <span><?php echo $persensakit;?>% terpenuhi</span>
                    </div>
                </div>
             </div>
             <div class="col-sm-3 widget_1_box">
                <div class="tile-progress bg-danger">
                    <div class="content">
                        <h4><i class="fa fa-dashboard icon-sm"></i> Izin = <?php echo $ijin;?></h4>
                        <div class="progress"><div class="progress-bar inviewport animated visible slideInLeft" style="width: <?php $persenijin = ($ijin/$p)*100; echo $persenijin;?>;"></div></div>
                        <span><?php echo $persenijin;?>% terpenuhi</span>
                    </div>
                </div>
             </div>
             <div class="col-sm-3 widget_1_box">
                <div class="tile-progress bg-secondary">
                    <div class="content">
                        <h4><i class="fa fa-dashboard icon-sm"></i> Alfa = <?php echo $alfa;?></h4>
                        <div class="progress"><div class="progress-bar inviewport animated visible slideInLeft" style="width: <?php $persenalfa = ($alfa/$p)*100; echo $persenalfa;?>;"></div></div>
                        <span><?php echo $persenalfa;?>% terpenuhi</span>
                    </div>
                </div>
             </div>
              <div class="clearfix"> </div>
		   </div>

				<?php
		
				echo '
				<label class="col-md-1 grid_box1 btn btn-warning">Export :</label>
				<div class="col-md-2"><a href="excel.php?ln='.$kls.'&tgl1='.$tanggal1.'&tgl2='.$tanggal2.'" title="Cetak Data" target="blank">
				<img src="images/xl.png" style="height:50px;

  border-radius: 0em;
  border: 0px solid #c0caff;
  margin-top: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  position:center;"/></a>
			</div>';
				
				}else{};
				}else{ echo "<div class='alert alert-danger'>Silahkan pilih jangkauan tanggal di atas</div></div></h1>";};
				?>
		
		
			</div>
				</div>
					<div class="clearfix"> </div>
					<script src="js/bootstrap.min.js"></script>
					<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
	</script>
</body>
</html>

<?php

};}else{{header ("location:logout.php");}};}else
{header ("location:../index.php");}
?>