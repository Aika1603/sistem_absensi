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
		<h3>Tambah Data</h3>
		<div class="grid_6 grid_5">
		
			
			<?php
			
			if(isset($_POST['add'])){
				$id_mengajar			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['id_mengajar']));
				$id_pelajaran			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['id_pelajaran']));
				$materi			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['materi']));
				$hari	 	= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['hari']));
				$kelas		 	= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['kelas']));
				$jam_belajar	= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['jam_belajar']));
				
				$cek = mysqli_query($koneksi, "SELECT * FROM tb_jadwalpelajaran WHERE id_pelajaran='$id_pelajaran' and hari='$hari' and jam_belajar='$jam_belajar'");
				if(mysqli_num_rows($cek) == 0){
				
						$insert = mysqli_query($koneksi, "INSERT INTO tb_jadwalpelajaran VALUES('','$id_pelajaran', '$id_mengajar', '$hari','$jam_belajar', '$kelas', '$materi')");
						if($insert){
							echo '<div class="alert alert-success">Data Berhasil Masuk</div>';
						}else{
							echo '<div class="alert alert-danger">Data gagal ditambahkan, silahkan coba lagi.</div>';
						}
			}else{
					echo '<div class="alert alert-danger">Jadwal sudah ada</div>';
				}}
			
			?>
			
			<form class="form-horizontal" action="" method="post">
				
				<div class="form-group">
					<label class="col-sm-3 control-label">ID PELAJARAN</label>
					<div class="col-sm-3">
						<input type="text" name="id_pelajaran" class="form-control1" placeholder="" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">ID MENGAJAR</label>
					<div class="col-sm-3">
						<input type="text" name="id_mengajar" class="form-control1" placeholder="" required>
					</div>
				</div>
				
				
				<div class="form-group">
					<label class="col-sm-3 control-label">MATA PELAJARAN</label>
					<div class="col-sm-4">
						<input type="text" name="materi" class="form-control1" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">HARI</label>
					<div class="col-sm-3">
						<select name="hari" class="form-control1" required>
							<option value="">Pilih Salah Satu  <span class="fa arrow"></span></option>
							<option value="SENIN">SENIN</option>
							<option value="SELASA">SELASA</option>
							<option value="RABU">RABU</option>
							<option value="KAMIS">KAMIS</option>
							<option value="JUMAT">JUMAT</option>
							<option value="SABTU">SABTU</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">JAM KE-</label>
					<div class="col-sm-3">
						<select name="jam_belajar" class="form-control1" required>
							<option value="">Pilih Salah Satu  <span class="fa arrow"></span></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">KELAS</label>
					<div class="col-sm-3">
						<select name="kelas" class="form-control btn-primary" required>

						<option value="">Pilih Salah Satu  <span class="fa arrow"></span></option>
<?php $sq= mysqli_query($koneksi, "SELECT * FROM tb_kelas ORDER BY 'kelas' ASC"); 
		while($row = mysqli_fetch_assoc($sq)){?>
			
						<option value="<?php echo $row['kelas'];?>"><?php echo $row['kelas'];?></option>
	<?php }?>	
	</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-primary" value="TAMBAH">
						
						<a href="jadwal.php" class="btn btn-danger">KEMBALI</a>
					</div>
				</div>
			</form>
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
					<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
	</script>
</body>
</html>

<?php
;}else{{header ("location:logout.php");}};}else
{header ("location:../index.php");}
?>