<!DOCTYPE HTML>
<?php
session_start();
if(isset($_SESSION["user_id"])) 
{
	if(($_SESSION["user_akses"]) == "admin") 
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
		<h3>Data Absensi</h3>
  	    <div class="grid_3 grid_5">
		
        <form method="get" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
          
         <div class="form-group">
					<label class=" control-label">KELAS</label>
					
						<select name="kelas" class="form-control btn-primary" required>

						<option value="">Pilih Salah Satu  <span class="fa arrow"></span></option>
<?php $sq= mysqli_query($koneksi, "SELECT * FROM tb_kelas ORDER BY 'kelas' ASC"); 
		while($row = mysqli_fetch_assoc($sq)){?>
			
						<option value="<?php echo $row['kelas'];?>"><?php echo $row['kelas'];?></option>
	<?php }?>	
	</select>
					</div>
		
			
			
            <div class="form-group">
              <label class="control-label normal">Tanggal</label>
              <div class="input-group date" >
			  <input type="date" name="tanggal" class="form-control1  btn-primary" placeholder="Tanggal"  required="" >
            <div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					
			</div>
	<div class="form-group">
		<label class="control-label">&nbsp;</label>
            
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
				$tanggal = mysqli_real_escape_string($koneksi,$_GET['tanggal']);
				$cek = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE NIS='$NIS' && tanggal='$tanggal'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info">Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM tb_absen WHERE NIS='$NIS'  && tanggal='$tanggal'");
					if($delete){
						echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-info">Data gagal dihapus.</div>';
					}
				}
			};};
			if(isset($_GET['kelas'])){
			$kelas = mysqli_real_escape_string($koneksi,($_GET['kelas']));
			$tanggal = mysqli_real_escape_string($koneksi,($_GET['tanggal']));
			
			if(isset($_GET['keterangan'])){
			$keterangan = mysqli_real_escape_string($koneksi,($_GET['keterangan']));}
			
			?>
			
			
			<?php 
			
			if($tanggal){echo'
			<a href="dataabsen.php?tanggal='.$tanggal.'&kelas='.$kelas.'" class="btn btn-danger">Semua</a>	
			<a href="dataabsen.php?tanggal='.$tanggal.'&kelas='.$kelas.'&keterangan=hadir" class="btn btn-danger">Hadir</a>	
			<a href="dataabsen.php?tanggal='.$tanggal.'&kelas='.$kelas.'&keterangan=Tidak Hadir" class="btn btn-danger">Tidak Hadir</a>
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
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE kelas='$kelas' && tanggal='$tanggal' && keterangan='$keterangan'  LIMIT $start_from, $per_page");
				
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
							<td><center><a href="dataabsen.php?aksi=delete&NIS='.$row['NIS'].'&tanggal='.$row['tanggal'].'&kelas='.$row['kelas'].'&keterangan='.$keterangan.'" title="Hapus Data" onclick="return confirm(\'Yakin?\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							<a href="edt_abs.php?NIS='.$row['NIS'].'&tanggal='.$row['tanggal'].'" title="Rubah Data"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
							
						</tr>
						
						';
						$no++;
						
					}
				}
				}else{
					$sql = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE kelas='$kelas' && tanggal='$tanggal'  LIMIT $start_from, $per_page");
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
							<td><center><a href="dataabsen.php?aksi=delete&NIS='.$row['NIS'].'&tanggal='.$row['tanggal'].'&kelas='.$row['kelas'].'" title="Hapus Data" onclick="return confirm(\'Yakin?\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							<a href="edt_abs.php?NIS='.$row['NIS'].'&tanggal='.$row['tanggal'].'" title="Rubah Data"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
							
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
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_absen");
				$row = mysqli_fetch_assoc($sql);
				
			/*
			if($tanggal){ 
				echo'			
				<a href="datasiswapdf.php?tanggal='.$tanggal.'" title="Cetak Data" class="btn btn-info">Cetak Tanggal Ini</a>';
			}else{
				echo'
				<a href="datasiswapdf.php?kelas=DTA 1" title="Cetak Data" class="btn btn-info">Cetak Kelas Ini</a>';
			}
				*/?>
<div class="span_8">
				<?php
if(isset($_GET['keterangan'])){
$sql = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE kelas='$kelas' && tanggal='$tanggal' && keterangan='$keterangan' ");
if(mysqli_num_rows($sql) == 0){}else{				
// Count the total records
$total_records = mysqli_num_rows($sql);

//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);

//Going to first page
$b=1;
echo "<div class=' page_1'>
		<ul class='pagination pagination-sm'>
		<li class='active' ><a href='dataabsen.php?page=1&no=".$b."&b=".$b."&kelas=".$kelas."&tanggal=".$tanggal."&keterangan=".$keterangan."'>".'Pertama'." </a></li> ";
$b=1;
for ($i=1; $i<=$total_pages; $i++) {

echo "<li ><a href='dataabsen.php?page=".$i."&no=".$b."&b=".$b."&kelas=".$kelas."&tanggal=".$tanggal."&keterangan=".$keterangan."'>".$i."</a></li> ";
$b=$b+10;
};
// Going to last page
$b=$total_records%10;
if($b==0){$c=$total_records-10;}else{
$c=$total_records-$b;}
$b=$c+1;
echo "<li class='active'><a href='dataabsen.php?page=$total_pages&no=".$b."&b=".$b."&kelas=".$kelas."&tanggal=".$tanggal."&keterangan=".$keterangan."'>".'Terakhir'."</a></li></ul></div>  ";

echo '<span class="text-muted m-r-sm">Showing '.$page.' of '.$total_pages.'</span>';				
};}else if($tanggal){
	
	
	

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE kelas='$kelas' && tanggal='$tanggal' ");
if(mysqli_num_rows($sql) == 0){}else{				
// Count the total records
$total_records = mysqli_num_rows($sql);

//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);

//Going to first page
echo "<div class=' page_1'>
		<ul class='pagination pagination-sm'>
		<li class='active' ><a href='dataabsen.php?page=1&no=1&b=1&tanggal=".$tanggal."&kelas=".$kelas."'>".'Pertama'."</a></li> ";
$a=1;
for ($i=1; $i<=$total_pages; $i++) {

echo "<li ><a href='dataabsen.php?page=".$i."&no=".$a."&b=".$a."&tanggal=".$tanggal."&kelas=".$kelas."'>".$i."</a></li> ";
$a=$a+10;
};
// Going to last page
$b=$total_records%10;
if($b==0){$c=$total_records-10;}else{
$c=$total_records-$b;}
$b=$c+1;
echo "<li class='active'><a href='dataabsen.php?page=$total_pages&no=".$b."&b=".$b."&tanggal=".$tanggal."&kelas=".$kelas."'>".'Terakhir'."</a></li></ul></div> ";			
				
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