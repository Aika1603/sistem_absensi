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
		<h3>Profil User</h3>
		<div class="grid_3 grid_5">
		
			
			<?php
			if(isset($_GET['user_id'])){
			$user_id =  mysqli_real_escape_string($koneksi,$_GET['user_id']);
			
			$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location:user.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){
				$delete = mysqli_query($koneksi, "DELETE FROM user WHERE user_id='$user_id'");
				if($delete){
					echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
				}else{
					echo '<div class="alert alert-info">Data gagal dihapus.</div>';
				}
			}
			?>
			<img class="img-responsive img-circle center-block" style=" width: 150px;height:150px;" src="images/<?php echo $row['avatar']; ?>" width="150"><br />
			<table class="table table-striped">
				
				<tr>
					<th>NAMA LENGKAP</th>
					<td><?php echo $row['user_name']; ?></td>
				</tr>
				<tr>
					<th>KELAS</th>
					<td><?php echo $row['kelas']; ?></td>
				</tr>
				
				<tr>
					<th>WALI KELAS</th>
					<td><?php echo $row['wali_kelas']; ?></td>
				</tr>

				<tr>
					<th>EMAIL</th>
					<td><?php echo $row['email']; ?>
				</tr>
				<tr>
					<th>NO HP</th>
					<td><?php echo $row['no_hp']; ?></td>
				</tr>
				
			</table>
		<a href="user.php" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
			<a href="edituser.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="profiluser.php?aksi=delete&user_id=<?php echo $row['user_id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
		
				<?php } else {echo "<div class='alert alert-danger'>data belum terisi</div><br/><a href='datasiswa.php' class='btn btn-danger'>KEMBALI</a>";};?>
		
		</div>
			</div>
				</div>
				</div>
				</div>
					<div class="clearfix"> </div>
					<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
$koneksi->close(); ;}else{{header ("location:logout.php");}};}else
{header ("location:../index.php");}
?>