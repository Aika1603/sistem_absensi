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
		<h3>Edit Profil Guru</h3>
		<div class="grid_3 grid_5">
		
		
			<?php
			if(isset($_GET['kondisi'])){
			echo '<div class="alert alert-success">Data berhasil disimpan..</div>';}
				if(isset($_GET['NIP'])){
			$NIP = mysqli_real_escape_string($koneksi,$_GET['NIP']);
				
			$sql = mysqli_query($koneksi, "SELECT * FROM guru WHERE NIP='$NIP'");
		
				$row = mysqli_fetch_assoc($sql);
			
			
			
			
			?>
			<form class="form-horizontal" action="proseseditguru.php" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIP</label>
					<div class="col-sm-2">
						<input type="text" name="NIP" class="form-control1" value="<?php echo $row['NIP']; ?>" placeholder="NIP" >
						<input type="hidden" name="NIP2" value="<?php echo $NIP; ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">ID MENGAJAR</label>
					<div class="col-sm-2">
						<input type="text" name="id_mengajar" class="form-control1" value="<?php echo $row['id_mengajar']; ?>" placeholder="" >
						
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NAMA LENGKAP</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control1" value="<?php echo $row['nama']; ?>" placeholder="NAMA LENGKAP" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">TEMPAT & TANGGAL LAHIR</label>
					<div class="col-sm-3">
						<input type="text" name="tempat_lahir" class="form-control1" value="<?php echo $row['tempat_lahir']; ?>" placeholder="TEMPAT LAHIR" required>
					</div>
					<div class="col-sm-3">
						<div class="input-group date" data-provide="datepicker">
							<input type="date" name="tgl_lahir" class="form-control1" value="<?php echo $row['tgl_lahir']; ?>" placeholder="0000-00-00">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
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
					<label class="col-sm-3 control-label">JENIS KELAMIN</label>
					<div class="col-sm-2">
						<select name="id_jk" class="form-control btn-primary"  required>
							<option value="">JENIS KELAMIN<span class="fa arrow"></span></option>
							<option value="Laki-laki" <?php if($row['id_jk'] == 'Laki-laki'){ echo 'selected'; } ?>>LAKI-LAKI</option>
							<option value="Perempuan" <?php if($row['id_jk'] == 'Perempuan'){ echo 'selected'; } ?>>PEREMPUAN</option>
						</select>
					</div>
				</div>
				
				
				
				
				<div class="form-group">
					<label class="col-sm-3 control-label">STATUS</label>
					<div class="col-sm-3">
						<select name="status" class="form-control btn-primary" required>
							<option value="">Pilih Salah Satu  <span class="fa arrow"></span></option>
							<option value="Honorer" <?php if($row['status'] == 'Honorer'){ echo 'selected'; } ?>>Honorer</option>
							<option value="PNS" <?php if($row['status'] == 'PNS'){ echo 'selected'; } ?>>PNS</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">JABATAN</label>
					<div class="col-sm-3">
						<select name="jabatan" class="form-control btn-primary" required>
							<option value="">Pilih Salah Satu  <span class="fa arrow"></span></option>
							<option value="Wali Kelas" <?php if($row['jabatan'] == 'Wali Kelas'){ echo 'selected'; } ?>>Wali Kelas</option>
							<option value="Pembina" <?php if($row['jabatan'] == 'Pembina'){ echo 'selected'; } ?>>Pembina Ekskul</option>
							<option value="Wakasek" <?php if($row['jabatan'] == 'Wakasek'){ echo 'selected'; } ?>>Wakasek</option>
						
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">WALI KELAS</label>
					<div class="col-sm-3">
					<select name="kelas" class="form-control btn-primary" >

						<option value="">Pilih Salah Satu, Jika Wali Kelas <span class="fa arrow"></span></option>
<?php $sq= mysqli_query($koneksi, "SELECT * FROM tb_kelas WHERE wali_kelas='".$row['nama']."'"); 
		while($raw = mysqli_fetch_assoc($sq)){?>
			
						<option value="<?php echo $raw['kelas'];?>" <?php if($row['kelas'] == $raw['kelas']){ echo 'selected'; } ?>><?php echo $raw['kelas'];?></option>
	<?php }?>	
	</select></div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">ALAMAT</label>
					<div class="col-sm-6">
						<textarea type="text" name="alamat" class="form-control1" placeholder="Tidak Ada Data"><?php echo $row['alamat']; ?></textarea>
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