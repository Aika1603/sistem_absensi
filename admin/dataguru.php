<!DOCTYPE HTML>
<?php

session_start();
// include_once "../php-security-master/source/project-security.php";

if(isset($_SESSION["user_id"]))
{
	if(($_SESSION["user_akses"]) == "admin")
{?>
<html>
<?php include "head.html";?>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <?php include "nav.php";
		include("koneksi.php");
include ("func.php");
		?>
		<div id="page-wrapper">
		<div class="graphs">
		<h3>Data Guru</h3>

		<form action="" method="GET">
			<?php $NIP = (isset($_GET['NIP']) ? ($_GET['NIP']) : 0);  ?>
                <div class="input-group">
                    <input type="text" name="NIP" class="form-control1 input-search"
					value="<?php
			  if($NIP==0){echo'';}
			  else{echo $NIP;}
			  ?>" placeholder="Cari Berdasarkan NIP.."/>
                    <span class="input-group-btn">
                        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div><!-- Input Group -->
            </form>

		<div class="grid_6 grid_5">

		<?php
			if(isset($_GET['aksi']) == 'delete'){ if(isset($_GET['id'])){
			$id = mysqli_real_escape_string($koneksi,$_GET['id']);
				$cek = mysqli_query($koneksi, "SELECT * FROM guru WHERE user_id='$id'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info">Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM guru WHERE user_id='$id'");
					if($delete){
						echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-info">Data gagal dihapus.</div>';
					}
				}
			};};
		?>
		<?php


				?>
			<!--<form class="form-inline" method="get">
				<div class="form-group">

					<select name="kelas" class="form-control btn-primary " onchange="form.submit()">
						<option value="0">Semua</option>
						<?php $kelas = (isset($_GET['kelas']) ?  mysqli_real_escape_string($koneksi,($_GET['kelas'])) : '0');  ?>
						<option value='DTA 1' <?php if($kelas == 'DTA 1'){ echo 'selected'; } ?>>DTA 1</option>
						<option value='DTA 2' <?php if($kelas == 'DTA 2'){ echo 'selected'; } ?>>DTA 2</option>
					</select>
				</div>

				<!--<div class="form-group">
					Filter JeNIP Kelamin :
					<select name="urut" class="form-control " onchange="form.submit()">
						<option value="0">JeNIP Kelamin</option>
						<?php $urut = (isset($_GET['urut']) ? ($_GET['urut']) : NULL);  ?>
						<option value='Laki-laki' <?php if($urut == 'Laki-laki'){ echo 'selected'; } ?>>Laki-laki</option>
						<option value='Perempuan' <?php if($urut == 'Perempuan'){ echo 'selected'; } ?>>Perempuan</option>
					</select>
				</div>

			</form>-->


			<div class="table-responsive">
			<table class="table table-bordered">

				<tr>
					<th>NO.</th>
					<th>NIP</th>
					<th>NAMA LENGKAP</th>
					<th>JENIS KELAMIN</th>
					<th>ID MENGAJAR</th>
					<th>STATUS</th>

					<th>SETTING</th>
				</tr>
				<?php
$per_page=10;
if (isset($_GET["page"])) {
$b = $_GET["b"];
$no = $_GET["no"];
$page = $_GET["page"];

}

else {

$page=1;
$no = 1;
$b =1;

}

// Page will start from 0 and Multiple by Per Page
$start_from = ($page-1) * $per_page;

//Selecting the data from table but with limit

				if($NIP){
					$sql = mysqli_query($koneksi, "SELECT * FROM guru WHERE NIP='$NIP'");
				}else
				{
					$sql = mysqli_query($koneksi, "SELECT * FROM guru LIMIT $start_from, $per_page");
				};
				if(mysqli_num_rows($sql) == 0){
 					echo '<tr><td colspan="8">Tidak ada data. Silahkan cari berdasarkan Kelas atau Nama Siswa. </td></tr>';
				}else{

					for($row;$row = mysqli_fetch_assoc($sql);$row++){

					echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['NIP'].'</td>
							<td>'.$row['nama'].'</td>

							<td>'.$row['id_jk'].'</td>
						<td>'.$row['id_mengajar'].'</td>
							<td>'.$row['status'].'</td>
							<td>
								<a href="profilguru.php?NIP='.$row['NIP'].'" title="Lihat Detail"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
								<a href="editguru.php?NIP='.$row['NIP'].'" title="Rubah Data"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="passguru.php?NIP='.$row['NIP'].'" title="Ganti Password"><span class="fa fa-lock" aria-hidden="true"></span></a>

								<a href="dataguru.php?aksi=delete&id='.$row['user_id'].'" title="Hapus Data" onclick="return confirm(\'Yakin?\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>

						';
						$no++;

					}
				}

				?>
				</table>
			</div>
				<?php
				if($NIP){echo'<a href="dataguru.php" ><button class="grid_box1 btn btn-warning">Kembali</button></a>';}else{
				$sql = mysqli_query($koneksi, "SELECT * FROM guru");
				$row = mysqli_fetch_assoc($sql);
				if($kelas){echo'<a href="tambahguru.php" ><label class="col-md-2 grid_box1 btn btn-success"> <i class="fa fa-indent nav_icon"></i>Tambah Data</label></a>';
				echo'
			<label class="col-md-1 grid_box1 btn btn-warning">Export :</label>
				<div class="col-md-2 "><a href="datagurupdf.php?ln='.$kelas.'&page='.$page.'&no='.$b.'" title="Cetak Data" target="blank">
				<img src="images/pdf.png" style="height:50px;

  border-radius: 0em;
  border: 0px solid #c0caff;
  margin-top: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  position:center;"/></a>

				</a>';
				echo'

				<a href="excel2.php?ln='.$kelas.'&page='.$page.'&no='.$b.'" title="Cetak Data" target="blank">
				<img src="images/xl.png" style="height:50px;

  border-radius: 0em;
  border: 0px solid #c0caff;
  margin-top: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  position:center;"/></a>
			</div>';

				}else{
				echo'<a href="tambahguru.php" ><button class="col-md-2 grid_box1 btn btn-success"> <i class="fa fa-indent nav_icon"></i>Tambah Data</button></a>';
				};


				?>
<div class="span_8">

<?php

//Now select all from table


					$sql = mysqli_query($koneksi, "SELECT * FROM guru  ");
if(mysqli_num_rows($sql) == 0){}else{
// Count the total records
$total_records = mysqli_num_rows($sql);

//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);

//Going to first page
$b=1;
echo "<div class=' page_1'>
		<ul class='pagination pagination-sm'>
		<li class='active' ><a href='dataguru.php?page=1&no=".$b."&b=".$b."&kelas=".$kelas."'>".'Pertama'."</a></li>";
$b=1;
for ($i=1; $i<=$total_pages; $i++) {

echo "<li ><a href='dataguru.php?page=".$i."&no=".$b."&b=".$b."&kelas=".$kelas."'>".$i."</a></li> ";
$b=$b+10;
};
// Going to last page
$b=$total_records%10;
if($b==0){$c=$total_records-10;}else{
$c=$total_records-$b;}
$b=$c+1;
echo "<li class='active'><a href='dataguru.php?page=$total_pages&no=".$b."&b=".$b."&kelas=".$kelas."'>".'Terakhir'."</a></li> ";

echo '<br/><span class="text-muted m-r-sm">Showing '.$page.' of '.$total_pages.'</span>';

?>

<?php


				};};?>

</div>

</div>
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
}else{{header ("location:logout.php");}};}else
{header ("location:../index.php");}
?>
