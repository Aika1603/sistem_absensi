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
		<h3>Tambah Data Guru</h3>
		<div class="grid_6 grid_5">
		
			
			<?php
			
			if(isset($_POST['add'])){
				$NIP			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['NIP']));
				$id_mengajar	= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['id_mengajar']));
				$nama			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['nama']));
				$user_name			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['user_name']));
				$id_jk		 	= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['id_jk']));
				$kelas		 	= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['kelas']));
				$tgl_lahir		= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['tgl_lahir']));
				$tempat_lahir	= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['tempat_lahir']));
				$email			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['email']));
				$no_hp			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['no_hp']));
				$alamat			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['alamat']));
				$status			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['status']));
				$jabatan		= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['jabatan']));
				
				$cek = mysqli_query($koneksi, "SELECT * FROM guru WHERE NIP='$NIP'");
				if(mysqli_num_rows($cek) == 0){
				
						$sql="Insert into guru(id_jk,nama,status,jabatan,kelas,tgl_lahir,tempat_lahir,NIP,user_name,user_akses,password,avatar,id_mengajar,no_hp,email) 
						values('$id_jk','$nama','$status','$jabatan','$kelas','$tgl_lahir','$tempat_lahir','$NIP','$user_name','guru', '21232f297a57a5a743894a0e4a801fc3','avatar.png', '$id_mengajar','$no_hp','$email');";
$insert=mysqli_query($koneksi,$sql);
if($insert){
							echo '<div class="alert alert-success">Pendaftaran berhasil dilakukan.</div>';
						}else{
							echo '<div class="alert alert-danger">Pendaftaran gagal dilakukan, silahkan coba lagi.</div>';
						}
			}else{
					echo '<div class="alert alert-danger">NIP sudah terdaftar.</div>';
				}}
			
			?>
			
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIP</label>
					<div class="col-sm-3">
						<input type="text" name="NIP" class="form-control1" placeholder="" required>
					</div>
				</div>
				
				<div class="form-group">
				<label class="col-sm-3 control-label">ID MENGAJAR</label>
					<div class="col-sm-3">
						<input type="text" name="id_mengajar" class="form-control1 " placeholder="" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">USER NAME</label>
					<div class="col-sm-3">
						<input type="text" name="user_name" class="form-control1" placeholder="" required>
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
						<select name="id_jk" class="form-control btn-primary" required>
							<option value="">Pilih Salah Satu  <span class="fa arrow"></span></option>
							<option value="Laki-laki">LAKI-LAKI</option>
							<option value="Perempuan">PEREMPUAN</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">STATUS</label>
					<div class="col-sm-3">
						<select name="status" class="form-control btn-primary" required>
							<option value="">Pilih Salah Satu  <span class="fa arrow"></span></option>
							<option value="Honorer">Honorer</option>
							<option value="PNS">PNS</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">JABATAN</label>
					<div class="col-sm-3">
						<select name="jabatan" class="form-control btn-primary" required>
							<option value="">Pilih Salah Satu  <span class="fa arrow"></span></option>
							<option value="Wali Kelas">Wali Kelas</option>
							<option value="Pembina">Pembina Ekskul</option>
							<option value="Wakasek">Wakasek</option>
						
						</select>
					</div>
				</div>
				
				<div class="form-group">
				<label class="col-sm-3 control-label">KELAS</label>
				<div class="col-sm-4">
					<select name="kelas" class="form-control btn-primary" >

						<option value="">Pilih Salah Satu, Jika Jabatan Wali Kelas  <span class="fa arrow"></span></option>
<?php $sq= mysqli_query($koneksi, "SELECT * FROM tb_kelas ORDER BY 'kelas' ASC"); 
		while($row = mysqli_fetch_assoc($sq)){?>
			
						<option value="<?php echo $row['kelas'];?>"><?php echo $row['kelas'];?></option>
	<?php }?>	
	</select>
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
						<a href="dataguru.php" class="btn btn-danger">KEMBALI</a>
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