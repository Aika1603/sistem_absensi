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
		<h3>Tambah Data</h3>
		<div class="grid_6 grid_5">
		
			
			<?php
			
			if(isset($_POST['add'])){
				$NIS			= htmlspecialchars($_POST['NIS']);
				$NISN			= htmlspecialchars($_POST['NISN']);
				$nama			= htmlspecialchars($_POST['nama']);
				$id_jk		 	= htmlspecialchars($_POST['id_jk']);
				$kelas		 	= $_SESSION['kelas'];
				$tgl_lahir		= htmlspecialchars($_POST['tgl_lahir']);
				$tempat_lahir	= htmlspecialchars($_POST['tempat_lahir']);
				$email			= htmlspecialchars($_POST['email']);
				$no_hp			= htmlspecialchars($_POST['no_hp']);
				$alamat			= htmlspecialchars($_POST['alamat']);
				
				
				$cek = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE NIS='$NIS'");
				if(mysqli_num_rows($cek) == 0){
				
						$insert = mysqli_query($koneksi, "INSERT INTO tb_siswa VALUES('$NIS','$nama', '$id_jk', '$kelas','$tgl_lahir', '$tempat_lahir', '$email','$no_hp', 'avatar.png','$alamat','$NISN')");
						if($insert){
							echo '<div class="alert alert-success">Pendaftaran berhasil dilakukan.</div>';
						}else{
							echo '<div class="alert alert-danger">Pendaftaran gagal dilakukan, silahkan coba lagi.</div>';
						}
			}else{
					echo '<div class="alert alert-danger">NIS sudah terdaftar.</div>';
				}}
			
			?>
			
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIS</label>
					<div class="col-sm-3">
						<input type="text" name="NIS" class="form-control1" placeholder="" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">NISN</label>
					<div class="col-sm-3">
						<input type="text" name="NISN" class="form-control1" placeholder="" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">NAMA LENGKAP</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control1" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">TEMPAT & TANGGAL LAHIR</label>
					<div class="col-sm-3">
						<input type="text" name="tempat_lahir" class="form-control1" placeholder="" required>
					</div>
					<div class="col-sm-3">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tgl_lahir" class="form-control1" placeholder="">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">JENIS KELAMIN</label>
					<div class="col-sm-3">
						<select name="id_jk" class="form-control1" required>
							<option value="">Pilih Salah Satu  <span class="fa arrow"></span></option>
							<option value="Laki-laki">LAKI-LAKI</option>
							<option value="Perempuan">PEREMPUAN</option>
						</select>
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">KELAS</label>
					<div class="col-sm-3">
						<input type="text" name="kelas" class="form-control1" id="disabledinput" value="<?php echo $_SESSION['kelas'];?>" placeholder="" disabled="">
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">EMAIL</label>
					<div class="col-sm-3">
						<input type="text" name="email" class="form-control1 " placeholder="" >
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">NO HP</label>
					<div class="col-sm-3">
						<input type="text" name="no_hp" class="form-control1 " placeholder="" >
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">ALAMAT</label>
					<div class="col-sm-6">
						<textarea name="alamat" class="form-control1" placeholder=""></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-primary" value="TAMBAH">
						
						<?php if(isset($_GET['kelas'])){
						$kelas = mysqli_real_escape_string($koneksi,$_GET['kelas']);};
						if(isset($_GET['kelas'])){echo'
						<a href="datasiswa.php?kelas='.$kelas.'" class="btn btn-danger">KEMBALI</a>';}else{echo'
						<a href="datasiswa.php" class="btn btn-danger">KEMBALI</a>';};?>
					</div>
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