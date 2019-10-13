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
		<div class="outter-wp">
		<div id="page-wrapper">
		<div class="graphs">
		<h3>Edit Password Guru</h3>
		<div class="grid_3 grid_5">
		
		
			<?php
			if(isset($_POST['NIP'])){
			$NIP = mysqli_real_escape_string($koneksi,$_POST['NIP']);
				
			$sql = mysqli_query($koneksi, "SELECT * FROM guru WHERE NIP='$NIP'");
		
				$row = mysqli_fetch_assoc($sql);
				$password = $row['password'];
				$password_lama	= htmlspecialchars($_POST['password_lama']);
				$password_lama = md5($password_lama);
				$password_baru			= htmlspecialchars($_POST['password_baru']);
				$passwordmd5			= md5($password_baru);
				$password_baru2		 	= htmlspecialchars($_POST['password_baru2']);
				
				if($password !== $password_lama){
				echo '<div class="alert alert-danger">Password lama salah..</div>';}else{
					if($password_baru !== $password_baru2){echo '<div class="alert alert-danger">Password baru tidak sama..</div>';}else{
				
				$update = mysqli_query($koneksi,"UPDATE guru SET password='$passwordmd5' WHERE NIP='$NIP'");
				if($update){
					echo '<div class="alert alert-success">Data berhasil disimpan..</div>';
				}else{
					echo '<div class="alert alert-danger">Data gagal disimpan, silahkan coba lagi.</div>';
				};
			
			
			
				
			};};};
				if(isset($_GET['NIP'])){
			$NIP = mysqli_real_escape_string($koneksi,$_GET['NIP']);
				
			$sql = mysqli_query($koneksi, "SELECT * FROM guru WHERE NIP='$NIP'");
		
				$row = mysqli_fetch_assoc($sql);
			
			
			
			
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Password Lama</label>
					<div class="col-sm-2">
						<input type="password" name="password_lama" class="form-control1"  placeholder="****" required>
						<input type="hidden" name="NIP" class="form-control1" value="<?php echo $row['NIP'];?>" required>
						
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password Baru</label>
					<div class="col-sm-2">
						<input type="password" name="password_baru" class="form-control1"  placeholder="****" required />
						
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Ulang Password Baru</label>
					<div class="col-sm-4">
						<input type="password" name="password_baru2" class="form-control1"  placeholder="****" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-primary" value="SIMPAN">
						<a href="dataguru.php" class="btn btn-danger">KEMBALI</a>
					</div>
				</div>
			</form>
		
				<?php }else {echo "<div class='alert alert-danger'>data belum terisi</div><br/><a href='dataguru.php?' class='btn btn-danger'>KEMBALI</a>";};?>
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
$koneksi->close() ;}else{{header ("location:logout.php");}}; }else
{header ("location:../index.php");}
?>