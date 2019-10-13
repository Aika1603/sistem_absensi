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
		<div class="grid_6 grid_5">
		
		
			<?php
			
			if(isset($_GET['tanggal'])){ if(isset($_GET['NIS'])){
			$NIS = mysqli_real_escape_string($koneksi,$_GET['NIS']);
			$tanggal = mysqli_real_escape_string($koneksi,$_GET['tanggal']);
			
			$sql = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE NIS='$NIS' && tanggal='$tanggal'");
			if(mysqli_num_rows($sql) == 0){
			
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			$kelas			= $row['kelas'];
			if(isset($_POST['save'])){
				
				$status			= mysqli_real_escape_string($koneksi,($_POST['status']));
				If($status=="M"){
				$keterangan		= "Hadir";}else{
				$keterangan		= "Tidak Hadir";};
				$tanggal		= mysqli_real_escape_string($koneksi,($_POST['tanggal']));
							
				
				
				$update = mysqli_query($koneksi,"UPDATE tb_absen SET keterangan='$keterangan', status='$status' WHERE NIS='$NIS' and tanggal='$tanggal'");
				if($update){
						
				}else{
					echo '<div class="alert alert-danger">Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
			if(isset($_POST['status'])!= NULL){
			echo '<div class="alert alert-success">Data berhasil disimpan.</div>';}else{
			
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIS</label>
					<div class="col-sm-2">
						<input type="text" name="" class="form-control1" value="<?php echo $row['NIS']; ?>" placeholder="NIS" disabled>
						<input type="hidden" name="link" value="<?php echo $link;?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NAMA LENGKAP</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control1" value="<?php echo $row['nama']; ?>" placeholder="NAMA LENGKAP" required disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">TANGGAL ABSEN</label>
					
					<div class="col-sm-2">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tanggal" class="form-control1" value="<?php echo $row['tanggal']; ?>"  >
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">KELAS</label>
					<div class="col-sm-3">
						<input type="text" name="kelas" class="form-control1" value="<?php echo $row['kelas']; ?>" placeholder=""  required disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">KETERANGAN</label>
					<div class="col-sm-2">
					<select name="keterangan" class="form-control btn-primary"  required>
							
							<option value="Hadir" <?php if($row['status'] == 'M'){ echo 'selected'; } ?>>Hadir</option>
							<option value="Tidak Hadir" <?php if($row['keterangan'] == 'Tidak Hadir'){ echo 'selected'; } ?>>Tidak Hadir</option>
							
						</select>
				</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">STATUS</label>
					<div class="col-sm-2">
						<select name="status" class="form-control btn-primary"  required>
							
							<option value="S" <?php if($row['status'] == 'S'){ echo 'selected'; } ?>>Sakit</option>
							<option value="A" <?php if($row['status'] == 'A'){ echo 'selected'; } ?>>Alfa</option>
							<option value="I" <?php if($row['status'] == 'I'){ echo 'selected'; } ?>>Ijin</option>
							<option value="M" <?php if($row['status'] == 'M'){ echo 'selected'; } ?>>Masuk</option>
						
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-primary" value="SIMPAN">
			<?php };
						echo '<a href="dataabsen.php?kelas='.$kelas.'&tanggal='.$tanggal.'" class="btn btn-danger">KEMBALI</a>';
					};}else{echo 'Tidak Ada Data';echo '<br/><a href="dataabsen.php" class="btn btn-danger">KEMBALI</a>';};?></div>
				</div>
			</form>
		
		
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