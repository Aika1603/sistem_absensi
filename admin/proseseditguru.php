<?php 			
				include "koneksi.php";
				if(isset($_POST['save'])){
				$nama			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['nama']));
				$kelas			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['kelas']));
				$id_jk		 	= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['id_jk']));
				$tgl_lahir		= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['tgl_lahir']));
				$tempat_lahir	= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['tempat_lahir']));
				$email			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['email']));
				$no_hp			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['no_hp']));
				$alamat			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['alamat']));
				$NIP2			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['NIP2']));
				$id_mengajar		= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['id_mengajar']));
				$status	= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['status']));
				$jabatan			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['jabatan']));
				
				$update = mysqli_query($koneksi,"UPDATE guru SET nama='$nama',id_mengajar='$id_mengajar',status='$status',jabatan='$jabatan', kelas='$kelas', id_jk='$id_jk', tgl_lahir='$tgl_lahir', tempat_lahir='$tempat_lahir', email='$email', no_hp='$no_hp', alamat='$alamat' WHERE NIP='$NIP2'");
				if($update){
					header("Location:editguru.php?NIP=$NIP2&kondisi=ya");
				}else{
					echo '<div class="alert alert-danger">Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}