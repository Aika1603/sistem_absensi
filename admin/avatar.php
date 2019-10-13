<!DOCTYPE HTML>
<?php
session_start();
if(isset($_SESSION["user_id"])) 
{
if(isset($_SESSION["user_akses"]) == "admin") 
{
?>
<html>
<?php include "head.html";
include("koneksi.php");
include ("func.php");?>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <?php include "nav.php";?>
		
<div id="page-wrapper">	
<div class="col-md-12 graphs">
	<h3>Foto Siswa</h3>
	   <div class="xs">
	   <div class="grid_6 grid_5">
			
		<style>
		.content {
			margin-top: 80px;
		}
		.btn-file {
			position: relative;
			overflow: hidden;
		}
		.btn-file input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			min-width: 100%;
			min-height: 100%;
			font-size: 100px;
			text-align: right;
			filter: alpha(opacity=0);
			opacity: 0;
			background: red;
			cursor: inherit;
			display: block;
		}
		input[readonly] {
			background-color: white !important;
			cursor: text !important;
		}
		</style>
		<p>Upload foto untuk Siswa dengan NIS <b><?php if(isset($_GET['NIS'])){ echo $_GET['NIS']; ?></b></p>
			<?php
			
			$NIS = $_GET['NIS'];
			
			$sql = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE NIS='$NIS'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: datasiswa.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_FILES['fileToUpload'])){
				$target_dir = "avatar/".$row['kelas']."/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

				if(isset($_POST["upload"])) {
					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					if($check !== false) {
						$uploadOk = 1;
					} else {
						
						$uploadOk = 0;
					}
				}

				if ($_FILES["fileToUpload"]["size"] > 500000) {
					echo '<div class="alert alert-danger">File size terlalu besar.</div>';
					$uploadOk = 0;
				}

				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					echo '<div class="alert alert-danger">Hanya JPG, JPEG, PNG & GIF yang di izinkan.</div>';
					$uploadOk = 0;
				}

				if ($uploadOk == 0) {
					echo '<div class="alert alert-danger">File gagal di upload.</div>';
				} else {
					$file = $target_dir.''.$NIS.'.'.$imageFileType;
					$new_NIS = $NIS.'.'.$imageFileType;
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file)) {
						$up = mysqli_query($koneksi, "UPDATE tb_siswa SET foto='$new_NIS' WHERE NIS='$NIS'");
						if($up){
						echo '<div class="alert alert-success">File berhasil di upload.</div>';}
					 else {
						echo '<div class="alert alert-danger">File gagal di upload.</div>';
					}}
				}
			}
			
			if(isset($_GET['sukses']) == 'ya'){
				echo '<div class="alert alert-success">File berhasil di upload.</div>';
			}
			?>
			</div>
			<div class="grid_6 grid_5 text-center">
			
				<img class="img-responsive center-block" src="avatar/<?php echo $row['kelas'];?>/<?php echo $row['foto'];?>" width="150"><br />
				<form class="form-inline" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<div class="col-sm-10">
							<div class="input-group">
								<span class="input-group-btn">
									<span class="btn btn-primary btn-file">
										Cari&hellip; <input type="file" name="fileToUpload">
									</span>
								</span>
								<input type="text" class="form-control1" readonly>
							</div>
						</div>
						<div class="col-sm-2">
							<input type="submit" name="upload" class="btn btn-primary" value="Upload">
						</div>
					</div>
				</form>
				
			</div>
				<?php } else {echo "<div class='alert alert-danger'>data belum terisi</div><br/><a href='datasiswa.php' class='btn btn-danger'>KEMBALI</a>";};?>
		
		</div>
			</div>
		</div>
			</div>
				
					<div class="clearfix"> </div>
					<script src="js/bootstrap.min.js"></script>
						<script>
	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
		numFiles = input.get(0).files ? input.get(0).files.length : 1,
		label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [numFiles, label]);
	});
	
	$(document).ready( function() {
		$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
			var input = $(this).parents('.input-group').find(':text'),
				log = numFiles > 1 ? numFiles + ' files selected' : label;
			if( input.length ) {
				input.val(log);
			} else {
				if( log ) alert(log);
			}
		});
	});
	</script>
</body>
</html>

<?php
$koneksi->close();}else{{header ("location:logout.php");}};
}else
{header ("location:../index.php");}
?>