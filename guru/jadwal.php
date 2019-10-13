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
        <?php include "nav.php";include("koneksi.php");
include ("func.php");
$id_mengajar= $_SESSION['id_mengajar']; ?>
		
		<div id="page-wrapper">
		<div class="graphs">
		<div class="grid_6 grid_5">
		<h3>Jadwal Mengajar <?php echo $_SESSION["nama"];?>
		</h3>
			<?php
			if(isset($_GET['aksi']) == 'delete'){ if(isset($_GET['id_pelajaran'])){
			$id_pelajaran = mysqli_real_escape_string($koneksi,$_GET['id_pelajaran']);
			$jam_belajar = mysqli_real_escape_string($koneksi,$_GET['jam_belajar']);
			$hari2 = mysqli_real_escape_string($koneksi,$_GET['hari2']);
			$cek = mysqli_query($koneksi, "SELECT * FROM tb_jadwalpelajaran WHERE id_pelajaran='$id_pelajaran' and hari='$hari2' and jam_belajar='$jam_belajar'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info">Data tidak ditemukan.</div>';
				    //$hari = 0;
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM tb_jadwalpelajaran WHERE id_pelajaran='$id_pelajaran' and hari='$hari2' and jam_belajar='$jam_belajar'");
					if($delete){
						//$hari = 0;
						echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
					}else{
						//$hari = 0;
						echo '<div class="alert alert-info">Data gagal dihapus.</div>';
					}
				}
			};};
		?>
		<form class="form-inline" method="get">
				<div class="form-group">
					<div class="col-md-2 ">
					<select name="hari" class="form-control btn-primary " onchange="form.submit()">
						<option value="0">Cari Berdasarkan Hari</option>
						<option value="0">Semua</option>
						<?php $hari = (isset($_GET['hari']) ?  mysqli_real_escape_string($koneksi,($_GET['hari'])) : '0');  ?>
						<option value='SENIN' <?php if($hari == 'SENIN'){ echo 'selected'; } ?>>SENIN</option>
						<option value='SELASA' <?php if($hari  == 'SELASA'){ echo 'selected'; } ?>>SELASA</option>
						<option value='RABU' <?php if($hari == 'RABU'){ echo 'selected'; } ?>>RABU</option>
						<option value='KAMIS' <?php if($hari  == 'KAMIS'){ echo 'selected'; } ?>>KAMIS</option>
						<option value='JUMAT' <?php if($hari == 'JUMAT'){ echo 'selected'; } ?>>JUMAT</option>
						<option value='SABTU' <?php if($hari  == 'SABTU'){ echo 'selected'; } ?>>SABTU</option>
					</select>
				</div>
				</div>
				<!--<div class="form-group">
					Filter Jenis Kelamin :
					<select name="urut" class="form-control " onchange="form.submit()">
						<option value="0">Jenis Kelamin</option>
						<?php $urut = (isset($_GET['urut']) ? ($_GET['urut']) : NULL);  ?>
						<option value='Laki-laki' <?php if($urut == 'Laki-laki'){ echo 'selected'; } ?>>Laki-laki</option>
						<option value='Perempuan' <?php if($urut == 'Perempuan'){ echo 'selected'; } ?>>Perempuan</option>
					</select>
				</div>
				-->
			</form>
			</br>
		
<div class="col-md-2"><a href="tambahjadwal.php" ><button class=" grid_box1 btn btn-success"> <i class="fa fa-indent nav_icon"></i>Tambah Jadwal</button></a>
		</div></div>		
		<div class="grid_6 grid_5">

		<div class="table-responsive">
		
		<table class="table table-bordered">
			
				<tr>
					<th><center>NO.</th>
					<th>ID PELAJARAN</th>
					<th>MATA PELAJARAN</th>
					<th>HARI</th>
					<th>JAM KE-</th>
					<th>KELAS</th>
					<th>SETTING</th>
				</tr>
				<?php
$per_page=10;
if (isset($_GET["page"])) {
$b = $_GET["b"];
$no = $_GET["no"];
$page = $_GET["page"];

}

else {

$page=1;
$no = 1;
$b =1;

}

// Page will start from 0 and Multiple by Per Page
$start_from = ($page-1) * $per_page;

//Selecting the data from table but with limit
				
				if($hari){
					$sql = mysqli_query($koneksi, "SELECT * FROM tb_jadwalpelajaran WHERE id_mengajar='$id_mengajar' and hari='$hari'");
				}else 
				{
					$sql = mysqli_query($koneksi, "SELECT * FROM tb_jadwalpelajaran WHERE id_mengajar='$id_mengajar' ORDER BY kelas ASC");
				};
				if(mysqli_num_rows($sql) == 0){
 					echo '<tr><td colspan="8">Tidak ada data.  </td></tr>';
				}else{
					
					for($row;$row = mysqli_fetch_assoc($sql);$row++){
					
					echo '
						<tr>
							<td><center>'.$no.'</td>
							<td>'.$row['id_pelajaran'].'</td>
							<td>'.$row['materi'].'</td>	
							
							<td>'.$row['hari'].'</td>
						<td>'.$row['jam_belajar'].'</td>
							<td>'.$row['kelas'].'</td>
							<td>
								<a href="jadwal.php?aksi=delete&id_pelajaran='.$row['id_pelajaran'].'&jam_belajar='.$row['jam_belajar'].'&hari2='.$row['hari'].'" title="Hapus Data" onclick="return confirm(\'Yakin?\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						
						';
						$no++;
						
					}
				}
					
				?>
				</table>
			</div>
			
		
		
		</div>
		
		<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				<div class="panel-heading">
					<h2>Keterangan Jam Belajar</h2>
					<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
				</div>
				<div class="panel-body no-padding" style="display: block;border:1;">
					<table class="table table-striped" style="border-table:1;border-color:silver;" border="1" color="silver">
						<thead>
							<tr class="warning">
								<th><center>No</th>
								<th><center>Jam Belajar Ke-</th>
								<th><center>Mulai</th>
								<th><center>Selesai</th>
							</tr>
						</thead>
						<tbody>
<?php $sql = mysqli_query($koneksi, "SELECT * FROM tb_jambelajar");	
if(mysqli_num_rows($sql) == 0){
 					echo '<tr><td colspan="8">Tidak ada data. </td></tr>';
				}else{
					$n=1;
					for($row;$row = mysqli_fetch_assoc($sql);$row++){
					
					echo '					
						<tr>
								<td><center>'.$n.'</td>
								<td><center>'.$row['jam_belajar'].'</td>
								<td><center>'.$row['mulai'].'</td>
								<td><center>'.$row['selesai'].'</td>
				</tr>';$n++;};};?>
							
						</tbody>
					</table>
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
;}else{{header ("location:logout.php");}};}else
{header ("location:../index.php");}
?>