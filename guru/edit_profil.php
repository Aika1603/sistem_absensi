<!DOCTYPE HTML>
<?php
session_start();
if(isset($_SESSION["user_id"])) 
{ if(($_SESSION["user_akses"]) == "guru") 
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
$tgl_lahir = $_SESSION["tgl_lahir"] ;
$tempat_lahir = $_SESSION["tempat_lahir"];		

if($_SESSION["NIP"] !== NULL){$NIP = $_SESSION["NIP"] ;};

if($_SESSION["nama"] !== NULL){$nama = $_SESSION["nama"] ;};
$id_mengajar = $_SESSION["id_mengajar"] ;
$kelas = $_SESSION["kelas"] ;
if($kelas == NULL){$kelas = "Diisi oleh admin";};
$status = $_SESSION["status"];
if($status == NULL){$status = "Diisi oleh admin";};
$id_jk = $_SESSION["id_jk"] ;
$jabatan = $_SESSION["jabatan"] ;
if($jabatan == NULL){$jabatan = "Diisi oleh admin";};			
$id_jk = $_SESSION["id_jk"];			
			
			
			?>
			<form class="form-horizontal" action="prosesedit_profil.php" method="post">
				
				<div class="form-group">
					<label class="col-sm-3 control-label">NIP</label>
					<div class="col-sm-4">
						<input type="text" name="NIP" class="form-control1" value="<?php echo $NIP; ?>" placeholder="Masukan NIP" required />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">NAMA LENGKAP</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control1" value="<?php echo $nama; ?>" placeholder="Gunakan nama lengkap dengan gelar" required />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">USERNAME</label>
					<div class="col-sm-4">
						<input type="text" name="user_name" class="form-control1" value="<?php echo $user_name; ?>" value="NAMA LENGKAP" required>
					</div>
				</div>
				
				
				<div class="form-group">
					<label class="col-sm-3 control-label">JENIS KELAMIN</label>
					<div class="col-sm-2">
						<select name="id_jk" class="form-control btn-primary"  required>
							<option value="">JENIS KELAMIN<span class="fa arrow"></span></option>
							<option value="Laki-laki" <?php if($id_jk == 'Laki-laki'){ echo 'selected'; } ?>>LAKI-LAKI</option>
							<option value="Perempuan" <?php if($id_jk == 'Perempuan'){ echo 'selected'; } ?>>PEREMPUAN</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">TEMPAT & TANGGAL LAHIR</label>
					<div class="col-sm-3">
						<input type="text" name="tempat_lahir" class="form-control1" value="<?php echo $tempat_lahir; ?>" placeholder="TEMPAT LAHIR" required>
					</div>
					<div class="col-sm-3">
						<div class="input-group date" data-provide="datepicker">
							<input type="date" name="tgl_lahir" class="form-control1" value="<?php echo $tgl_lahir; ?>" placeholder="0000-00-00">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
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
				<label class="col-sm-3 control-label">JABATAN</label>
					<div class="col-sm-2">
						<input type="text" name="jabatan" class="form-control1 " value="<?php echo $jabatan; ?>" disabled>
					</div>
				</div>
				
				<div class="form-group">
				<label class="col-sm-3 control-label">STATUS</label>
					<div class="col-sm-2">
						<input type="text" name="status" class="form-control1 " value="<?php echo $status; ?>" disabled>
					</div>
				</div>
				
				<div class="form-group">
				<label class="col-sm-3 control-label">WALI KELAS</label>
					<div class="col-sm-2">
						<input type="text" name="kelas" class="form-control1 " value="<?php echo $kelas; ?>" disabled>
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
								<a href="passguru.php" class="btn btn-primary">GANTI PASSWORD</a>
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