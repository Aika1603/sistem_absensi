<!DOCTYPE HTML>
<?php
session_start();
if(isset($_SESSION["user_id"])) 
{ if(($_SESSION["user_akses"]) == "guru") 
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
		
		
		
		<?php 	if(isset($_POST['kls'])){
		$kls = mysqli_real_escape_string($koneksi,$_POST['kls']);}else{$kls = NULL;};
$id_mengajar = $_SESSION['id_mengajar'];
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
              <label class="col-sm-2 control-label">Kelas</label>
              <div class="col-sm-3">
			    <select name="kls" class="form-control btn-primary" required placeholder="<?php 
			  if($kls==NULL){echo "Masukan Kelas";}
			  else{echo "$kls";}
			  ?>"/>

						<option value="">Pilih Salah Satu  <span class="fa arrow"></span></option>
<?php $sq= mysqli_query($koneksi, "SELECT * FROM tb_kelas ORDER BY 'kelas' ASC"); 
		while($row = mysqli_fetch_assoc($sq)){?>
			
						<option value="<?php echo $row['kelas'];?>"><?php echo $row['kelas'];?></option>
	<?php }?>	
	</select>
		  </div></div>
            
			
			<div class="form-group">
				
				<label class="col-sm-2 control-label">Dari Pertemuan Ke :</label>
				<div class="col-sm-3">
				
				<?php $pertemuan1 = (isset($_POST['pertemuan1']) ? mysqli_real_escape_string($koneksi,($_POST['pertemuan1'])) : NULL);  ?>
             <input  type="text" name="pertemuan1" class="form-control1" value="<?php 
			  if($pertemuan1==NULL){echo "";}
			  else{echo "$pertemuan1";}
			  ?>" placeholder="Pertemuan Ke .." required>
            
						</div>
			<label class="col-sm-2 control-label">Sampai Pertemuan Ke :</label>
			<div class="col-sm-3">
			
			<?php $pertemuan2 = (isset($_POST['pertemuan2']) ? mysqli_real_escape_string($koneksi,($_POST['pertemuan2'])) : 0);  ?>
              <input  type="text" name="pertemuan2"class="form-control1" value="<?php 
			  if($pertemuan2==0){echo "";}
			  else{echo "$pertemuan2";}
			  ?>" placeholder="Pertemuan Ke ..">
            
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
							
													






			if($pertemuan2 && $pertemuan1){
			
				?>
				
				
				
		<div class="grid_6 grid_5">
			<div class='but_list'><div class='alert alert-success'><h4> Hasil Rekapitulasi kelas <b><?php echo $kls;?></b> dari pertemuan <i><b><?php echo $pertemuan1;?></b></i> sampai pertemuan <i><b><?php echo $pertemuan2; ?></b></i> adalah :</h4></div>
					
			<div class="table-responsive" >
			<table class="table table-striped table-hover" border="1" >
				<tr>
					<th><center>NO.</th>
					<th><center>NIS</th>
					<th><center>NAMA</th>
					<?php
					



?>
					<?php 
					for($a=$pertemuan1;$a<=$pertemuan2;$a++){
						echo '<th><center>'.$a.'</th>'
					
					;};?>
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
					$p = $pertemuan1;
					for($row;$row = mysqli_fetch_assoc($sql);$row++){
						
						echo '
						
						<tr>
							<td><center>'.$no.'</td>
							
							<td>'.$row['NIS'].'</td>
							<td>'.$row['nama'].'</td>	
							
							';
							
							 
							
							$NIS = $row['NIS'];
							$p = $pertemuan1;
							for($b=$p;$b<=$pertemuan2;$b++)
							{ 
							
							$sdl = mysqli_query($koneksi, "SELECT * FROM tb_absenpelajaran WHERE NIS='$NIS' and pertemuan='$p' and id_mengajar='$id_mengajar'");
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
							
							$p++;
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
				<div class="col-md-2"><a href="excelpelajaran.php?ln='.$kls.'&pertemuan1='.$pertemuan1.'&pertemuan2='.$pertemuan2.'" title="Cetak Data" target="blank">
				<img src="images/xl.png" style="height:50px;

  border-radius: 0em;
  border: 0px solid #c0caff;
  margin-top: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  position:center;"/></a>
			</div>';
				
				}else{};
				}else{ echo "<div class='alert alert-danger'>Silahkan pilih jangkauan pertemuan di atas</div></div></h1>";};
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