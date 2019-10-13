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
		<h3>Edit Profil User</h3>
		<div class="grid_3 grid_5">
		
		
			<?php
			if(isset($_GET['kondisi'])){
			echo '<div class="alert alert-success">Data berhasil disimpan..</div>';}
				if(isset($_GET['user_id'])){
			$user_id = mysqli_real_escape_string($koneksi,$_GET['user_id']);
				
			$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");
		
				$row = mysqli_fetch_assoc($sql);
			
			
			
			
			?>
			<form class="form-horizontal" action="prosesedituser.php" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NAMA LENGKAP</label>
					<div class="col-sm-4">
						<input type="text" name="user_name" class="form-control1" value="<?php echo $row['user_name']; ?>" placeholder="NAMA LENGKAP" required>
						<input type="hidden" name="user_id2" class="form-control1" value="<?php echo $row['user_id']; ?>" required>
	<input type="hidden" name="user_id" class="form-control1" value="<?php echo $row['user_id']; ?>"  required>
										
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">EMAIL</label>
					<div class="col-sm-3">
						<input type="text" name="email" class="form-control1" value="<?php echo $row['email']; ?>" placeholder="EMAIL" required>
					</div>
				</div>
				
				<div class="form-group">
				<label class="col-sm-3 control-label">NO HP</label>
					<div class="col-sm-2">
						<input type="text" name="no_hp" class="form-control1 " value="<?php echo $row['no_hp']; ?>"placeholder="NO_HP" >
					</div>
				</div>
				
				
				<div class="form-group">
					<label class="col-sm-3 control-label">ALAMAT</label>
					<div class="col-sm-6">
						<textarea type="text" name="alamat" class="form-control1" placeholder="ALAMAT"><?php echo $row['alamat']; ?></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">KELAS</label>
					<div class="col-sm-2">
						<input type="text" name="kelas" class="form-control1 " value="<?php echo $row['kelas']; ?>"placeholder="Kelas" disabled>
					</div>
				</div>	
					
				<div class="form-group">
					<label class="col-sm-3 control-label">WALI KELAS</label>
										<div class="col-sm-4">
						<select name="wali_kelas" class="form-control btn-primary" >

						<option value="tidak ada">Pilih Salah Satu  <span class="fa arrow"></span></option>
<?php $sq= mysqli_query($koneksi, "SELECT * FROM guru WHERE jabatan='Wali Kelas' and kelas='".$row['kelas']."' ORDER BY 'kelas' ASC"); 
		while($raw = mysqli_fetch_assoc($sq)){?>
			
						<option value="<?php echo $raw['nama'];?>" <?php if($row['kelas'] == $raw['kelas'] ){ echo 'selected'; }?>><?php echo $raw['nama'];?></option>
	<?php }?>	
	</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-primary" value="SIMPAN">
						<a href="user.php" class="btn btn-danger">KEMBALI</a>
					</div>
				</div>
			</form>
		
				<?php }else {echo "<div class='alert alert-danger'>data belum terisi</div><br/><a href='user.php?' class='btn btn-danger'>KEMBALI</a>";};?>
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