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
		<h3>Tambah Data user</h3>
		<div class="grid_6 grid_5">
		
			
			<?php
			
			if(isset($_POST['add'])){
				
				$user_name			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['user_name']));
				$wali_kelas	 	= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['wali_kelas']));
				$kelas		 	= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['kelas']));
			
				$email			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['email']));
				$no_hp			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['no_hp']));
			    $alamat		= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['alamat']));
			
				
				$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE user_name='$user_name'");
				if(mysqli_num_rows($cek) == 0){
				
						$sql="Insert into user(user_name,kelas,wali_kelas,user_akses,password,avatar,alamat,no_hp,email) 
						values('$user_name','$kelas','$wali_kelas','user','21232f297a57a5a743894a0e4a801fc3','avatar.png','$alamat','$no_hp','$email');";
$insert=mysqli_query($koneksi,$sql);
if($insert){
							echo '<div class="alert alert-success">Pendaftaran berhasil dilakukan.</div>';
						}else{
							echo '<div class="alert alert-danger">Pendaftaran gagal dilakukan, silahkan coba lagi.</div>';
						}
			}else{
					echo '<div class="alert alert-danger">Nama sudah terdaftar.</div>';
				}}
			
			?>
			
			<form class="form-horizontal" action="" method="post">
				
				
				
				
				<div class="form-group">
					<label class="col-sm-3 control-label">NAMA LENGKAP</label>
					<div class="col-sm-3">
						<input type="text" name="user_name" class="form-control1" placeholder="" required>
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
					<label class="col-sm-3 control-label">KELAS</label>
					<div class="col-sm-4">
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
					<label class="col-sm-3 control-label">WALI KELAS</label>
					<div class="col-sm-4">
						<select name="wali_kelas" class="form-control btn-primary" >

						<option value="tidak ada">Pilih Salah Satu  <span class="fa arrow"></span></option>
<?php $sq= mysqli_query($koneksi, "SELECT * FROM guru WHERE jabatan='Wali Kelas' ORDER BY 'kelas' ASC"); 
		while($row = mysqli_fetch_assoc($sq)){?>
			
						<option value="<?php echo $row['nama'];?>"><?php echo $row['nama'];?></option>
	<?php }?>	
	</select>
					</div>
				</div>
				
					
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-primary" value="TAMBAH">
						<a href="user.php" class="btn btn-danger">KEMBALI</a>
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