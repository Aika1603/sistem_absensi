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
		<h3>Tambah Data Kelas</h3>
		<div class="grid_6 grid_5">
		
			
			<?php
			
			if(isset($_POST['add'])){
				
				$wali_kelas	 	= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['wali_kelas']));
				$kelas		 	= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['kelas']));
				$kelas = strtoupper($kelas);
				$cek = mysqli_query($koneksi, "SELECT * FROM tb_kelas WHERE kelas='$kelas'");
				if(mysqli_num_rows($cek) == 0){
				
						$sql="Insert into tb_kelas(id,kelas,wali_kelas) 
						values('','$kelas','$wali_kelas');";
$insert=mysqli_query($koneksi,$sql);
if($insert){
							echo '<div class="alert alert-success">Pendaftaran berhasil dilakukan.</div>';
						}else{
							echo '<div class="alert alert-danger">Pendaftaran gagal dilakukan, silahkan coba lagi.</div>';
						}
			}else{
					echo '<div class="alert alert-danger">Kelas sudah terdaftar.</div>';
				}}
			
			?>
			
			<form class="form-horizontal" action="" method="post">
				
				
				
				
				<div class="form-group">
					<label class="col-sm-3 control-label">KELAS</label>
					<div class="col-sm-3">
						<input type="text" name="kelas" class="form-control1 " placeholder=""  required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">WALI KELAS</label>
					<div class="col-sm-4">
						<select name="wali_kelas" class="form-control btn-primary" >

						<option value="-">Pilih Salah Satu  <span class="fa arrow"></span></option>
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
						<a href="kelas.php" class="btn btn-danger">KEMBALI</a>
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