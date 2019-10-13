<!DOCTYPE HTML>
<?php
session_start();
if(isset($_SESSION["user_id"])) 
{ if(($_SESSION["user_akses"]) == "user") 
{?>
<html>
<?php include "head.html";

include ("func.php");?>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <?php include "nav.php";?>
		<div class="outter-wp">
		<div id="page-wrapper">
		<div class="graphs">
		<h3>Edit Profil Akun</h3>
		<div class="grid_3 grid_5">
		
		
			<?php
			if(isset($_GET['kondisi'])){
			echo '<div class="alert alert-success">Data berhasil disimpan..</div>';}
		
$user_name = $_SESSION["user_name"];
$akses = $_SESSION["user_akses"]; 
$avatar = $_SESSION["avatar"] ;
$alamat = $_SESSION["alamat"] ;
$password = $_SESSION["password"] ;
$email = $_SESSION["email"] ;
$no_hp = $_SESSION["no_hp"];
$kelas = $_SESSION["kelas"] ;
$wali_kelas = $_SESSION["wali_kelas"];			
			
			
			
			
			?>
			<form class="form-horizontal" action="prosesedit_profil.php" method="post">
				
				<div class="form-group">
					<label class="col-sm-3 control-label">NAMA LENGKAP</label>
					<div class="col-sm-4">
						<input type="text" name="user_name" class="form-control1" value="<?php echo $user_name; ?>" value="NAMA LENGKAP" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">NO HP</label>
					<div class="col-sm-3">
						<input type="text" name="no_hp" class="form-control1"  value="<?php echo $no_hp; ?>"  required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">EMAIL</label>
					<div class="col-sm-3">
						<input type="email" name="email" class="form-control1"  value="<?php echo $email; ?>" required>
					</div>
				</div>
				
				<div class="form-group">
				<label class="col-sm-3 control-label">KELAS</label>
					<div class="col-sm-2">
						<input type="text" name="kelas" class="form-control1 " value="<?php echo $kelas; ?>" disabled>
					</div>
				</div>
				
				<div class="form-group">
				<label class="col-sm-3 control-label">WALI KELAS</label>
					<div class="col-sm-3">
						<input type="text" name="kelas" class="form-control1 " value="<?php echo $wali_kelas; ?>" disabled>
					</div>
				</div>
				
				
				
				
				
				<div class="form-group">
					<label class="col-sm-3 control-label">ALAMAT</label>
					<div class="col-sm-6">
						<textarea name="alamat" class="form-control1" ><?php echo $alamat; ?></textarea>
					</div>
				</div>
				
				
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-primary" value="SIMPAN">
						<a href="profil.php" class="btn btn-danger">KEMBALI</a>
								<a href="passuser.php" class="btn btn-primary">GANTI PASSWORD</a>
				
					</div>
				</div>
			</form>
		
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
;}else{{header ("location:logout.php");}};

}else
{header ("location:../index.php");}
?>