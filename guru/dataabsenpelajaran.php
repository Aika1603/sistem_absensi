<!DOCTYPE HTML>
<?php
session_start();
if(isset($_SESSION["user_id"])) 
{
	if(($_SESSION["user_akses"]) == "guru") 
{?>
<html>
<?php include "head.html";
include("koneksi.php");
		include ("func.php");
		$id_mengajar = $_SESSION['id_mengajar'];
		
		?>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <?php include "nav.php";?>
		
		<div id="page-wrapper">
        <div class="graphs">
		<h3>Data Absensi</h3>
  	    <div class="grid_3 grid_5">
		
        <form method="get" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
          
            <div class="form-group">
              <label class="control-label">Kelas</label>
          <select name="kelas" class="form-control btn-primary" required>

						<option value="">Pilih Salah Satu  <span class="fa arrow"></span></option>
<?php $sq= mysqli_query($koneksi, "SELECT * FROM tb_kelas ORDER BY 'kelas' ASC"); 
		while($row = mysqli_fetch_assoc($sq)){?>
			
						<option value="<?php echo $row['kelas'];?>"><?php echo $row['kelas'];?></option>
	<?php }?>	
	</select> </div>
            
            <div class="form-group">
              <label class="control-label normal">Pertemuan Ke- </label>
			  <input name="pertemuan" type="text" class="form-control1 btn-primary"  required="">
			  		</div>
            
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          
        </form>
      </div>
	  
	  <div class="grid_3 grid_5">
	  <?php 
			if(isset($_GET['aksi']) == 'delete'){ if(isset($_GET['NIS'])){
				$NIS = mysqli_real_escape_string($koneksi,$_GET['NIS']);
				$pertemuan = mysqli_real_escape_string($koneksi,$_GET['pertemuan']);
				$cek = mysqli_query($koneksi, "SELECT * FROM tb_absenpelajaran WHERE NIS='$NIS' && pertemuan='$pertemuan'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info">Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM tb_absenpelajaran WHERE NIS='$NIS'");
					if($delete){
						echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-info">Data gagal dihapus.</div>';
					}
				}
			};};
			if(isset($_GET['pertemuan'])){
			$kelas = mysqli_real_escape_string($koneksi,($_GET['kelas']));
			$pertemuan = mysqli_real_escape_string($koneksi,($_GET['pertemuan']));
			
			if(isset($_GET['keterangan'])){
			$keterangan = mysqli_real_escape_string($koneksi,($_GET['keterangan']));}
			
			?>
			
			
			<?php 
			
			if($pertemuan){echo'
			<a href="dataabsenpelajaran.php?pertemuan='.$pertemuan.'&kelas='.$kelas.'" class="btn btn-danger">Semua</a>	
			<a href="dataabsenpelajaran.php?pertemuan='.$pertemuan.'&kelas='.$kelas.'&keterangan=hadir" class="btn btn-danger">Hadir</a>	
			<a href="dataabsenpelajaran.php?pertemuan='.$pertemuan.'&kelas='.$kelas.'&keterangan=Tidak Hadir" class="btn btn-danger">Tidak Hadir</a>
			';}?>
			<!--<form class="">
			
					<select  size="1" name="ket" class="btn-primary" onchange="form.submit()">
						<option value="0">Semua</option>
						<?php $ket = (isset($_GET['ket']) ? ($_GET['ket']) : NULL);  ?>
						<option value="Hadir" <?php if($ket == 'Hadir'){ echo 'selected'; } ?>>Hadir</option>
						<option value='Tidak Hadir' <?php if($ket == 'Tidak Hadir'){ echo 'selected'; } ?>>Tidak Hadir</option>
					</select>
			</form>-->
			<hr>
			<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th>NO.</th>
					<th>TANGGAL ABSEN</th>
					<th>NIS</th>
					<th>NAMA LENGKAP</th>
					<th>KELAS</th>
					<th>KETERANGAN</th>
					<th>STATUS</th>
					<th>SETTING</th>
				</tr>
				<?php
$per_page=10;
if (isset($_GET["page"])) {
$b = mysqli_real_escape_string($koneksi,($_GET["b"]));
$no = mysqli_real_escape_string($koneksi,($_GET["no"]));
$page = mysqli_real_escape_string($koneksi,($_GET["page"]));

}

else {

$page=1;
$no = 1;
$b =1;

}

// Page will start from 0 and Multiple by Per Page
$start_from = ($page-1) * $per_page;
					
				if(isset($_GET['keterangan'])){	
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_absenpelajaran WHERE id_mengajar='$id_mengajar' and kelas='$kelas' && pertemuan='$pertemuan' && keterangan='$keterangan'  LIMIT $start_from, $per_page");
				
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Tidak ada data.</td></tr>';
				}else{
					$no = $b;
					for($row;$row = mysqli_fetch_assoc($sql);$row++){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.tanggal($row['tanggal']).'</td>
							<td>'.$row['NIS'].'</td>
							<td>'.$row['nama'].'</td>	
							
							<td>'.$row['kelas'].'</td>
						
							<td><center>'.$row['keterangan'].'</td>
							<td><center>'.$row['status'].'</td>
							<td><center><a href="dataabsenpelajaran.php?aksi=delete&NIS='.$row['NIS'].'&pertemuan='.$row['pertemuan'].'&kelas='.$row['kelas'].'&keterangan='.$keterangan.'" title="Hapus Data" onclick="return confirm(\'Yakin?\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							<a href="edt_abspelajaran.php?NIS='.$row['NIS'].'&pertemuan='.$row['pertemuan'].'" title="Rubah Data"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
							
						</tr>
						
						';
						$no++;
						
					}
				}
				}else{
					$sql = mysqli_query($koneksi, "SELECT * FROM tb_absenpelajaran WHERE id_mengajar='$id_mengajar' and kelas='$kelas' && pertemuan='$pertemuan'  LIMIT $start_from, $per_page");
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Tidak ada data.</td></tr>';
				}else{
					$no = $b;
					for($row;$row = mysqli_fetch_assoc($sql);$row++){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.tanggal($row['tanggal']).'</td>
							<td>'.$row['NIS'].'</td>
							<td>'.$row['nama'].'</td>	
							
							<td>'.$row['kelas'].'</td>
						
							<td><center>'.$row['keterangan'].'</td>
							<td><center>'.$row['status'].'</td>
							<td><center><a href="dataabsenpelajaran.php?aksi=delete&NIS='.$row['NIS'].'&pertemuan='.$row['pertemuan'].'&kelas='.$row['kelas'].'" title="Hapus Data" onclick="return confirm(\'Yakin?\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							<a href="edt_abspelajaran.php?NIS='.$row['NIS'].'&pertemuan='.$row['pertemuan'].'" title="Rubah Data"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
							
						</tr>
						
						';
						$no++;
						
					}
				}
				}	
				?>
				</table>
			</div>
				<?php
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_absenpelajaran");
				$row = mysqli_fetch_assoc($sql);
				
			/*
			if($pertemuan){ 
				echo'			
				<a href="datasiswapdf.php?pertemuan='.$pertemuan.'" title="Cetak Data" class="btn btn-info">Cetak pertemuan Ini</a>';
			}else{
				echo'
				<a href="datasiswapdf.php?kelas=DTA 1" title="Cetak Data" class="btn btn-info">Cetak Kelas Ini</a>';
			}
				*/?>
<div class="span_8">
				<?php
if(isset($_GET['keterangan'])){
$sql = mysqli_query($koneksi, "SELECT * FROM tb_absenpelajaran WHERE id_mengajar='$id_mengajar' and kelas='$kelas' && pertemuan='$pertemuan' && keterangan='$keterangan' ");
if(mysqli_num_rows($sql) == 0){}else{				
// Count the total records
$total_records = mysqli_num_rows($sql);

//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);

//Going to first page
$b=1;
echo "<div class=' page_1'>
		<ul class='pagination pagination-sm'>
		<li class='active' ><a href='dataabsenpelajaran.php?page=1&no=".$b."&b=".$b."&kelas=".$kelas."&pertemuan=".$pertemuan."&keterangan=".$keterangan."'>".'Pertama'." </a></li> ";
$b=1;
for ($i=1; $i<=$total_pages; $i++) {

echo "<li ><a href='dataabsenpelajaran.php?page=".$i."&no=".$b."&b=".$b."&kelas=".$kelas."&pertemuan=".$pertemuan."&keterangan=".$keterangan."'>".$i."</a></li> ";
$b=$b+10;
};
// Going to last page
$b=$total_records%10;
if($b==0){$c=$total_records-10;}else{
$c=$total_records-$b;}
$b=$c+1;
echo "<li class='active'><a href='dataabsenpelajaran.php?page=$total_pages&no=".$b."&b=".$b."&kelas=".$kelas."&pertemuan=".$pertemuan."&keterangan=".$keterangan."'>".'Terakhir'."</a></li></ul></div>  ";

echo '<span class="text-muted m-r-sm">Showing '.$page.' of '.$total_pages.'</span>';				
};}else if($pertemuan){
	
	
	

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_absenpelajaran WHERE id_mengajar='$id_mengajar' and  kelas='$kelas' && pertemuan='$pertemuan' ");
if(mysqli_num_rows($sql) == 0){}else{				
// Count the total records
$total_records = mysqli_num_rows($sql);

//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);

//Going to first page
echo "<div class=' page_1'>
		<ul class='pagination pagination-sm'>
		<li class='active' ><a href='dataabsenpelajaran.php?page=1&no=1&b=1&pertemuan=".$pertemuan."&kelas=".$kelas."'>".'Pertama'."</a></li> ";
$a=1;
for ($i=1; $i<=$total_pages; $i++) {

echo "<li ><a href='dataabsenpelajaran.php?page=".$i."&no=".$a."&b=".$a."&pertemuan=".$pertemuan."&kelas=".$kelas."'>".$i."</a></li> ";
$a=$a+10;
};
// Going to last page
$b=$total_records%10;
if($b==0){$c=$total_records-10;}else{
$c=$total_records-$b;}
$b=$c+1;
echo "<li class='active'><a href='dataabsenpelajaran.php?page=$total_pages&no=".$b."&b=".$b."&pertemuan=".$pertemuan."&kelas=".$kelas."'>".'Terakhir'."</a></li></ul></div> ";			
				
echo '<span class="text-muted m-r-sm">Showing '.$page.' of '.$total_pages.'</span>';				

	
};};} ;
?>
	
     
      <!-- /#page-wrapper -->
   </div></div></div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
	</script>
	  
	  
    </div>
		</div>
		</div>
			</div>
				
					
</body>
</html>

<?php
$koneksi->close(); }else{{header ("location:logout.php");}};}else
{header ("location:../index.php");}
?>