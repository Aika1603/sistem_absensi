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
				$NIS2			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['NIS2']));
				
				$update = mysqli_query($koneksi,"UPDATE tb_siswa SET nama='$nama', kelas='$kelas', id_jk='$id_jk', tgl_lahir='$tgl_lahir', tempat_lahir='$tempat_lahir', email='$email', no_hp='$no_hp', alamat='$alamat' WHERE NIS='$NIS2'");
				if($update){
					header("Location:edit.php?NIS=$NIS2&kondisi=ya");
				}else{
					echo '<div class="alert alert-danger">Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}