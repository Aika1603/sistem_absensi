<?php 			
session_start();
				include "koneksi.php";
				if(isset($_POST['save'])){
				$nama			= htmlspecialchars($_POST['nama']);
				$kelas			= $_SESSION['kelas'];
				$id_jk		 	= htmlspecialchars($_POST['id_jk']);
				$tgl_lahir		= htmlspecialchars($_POST['tgl_lahir']);
				$tempat_lahir	= htmlspecialchars($_POST['tempat_lahir']);
				$email			= htmlspecialchars($_POST['email']);
				$no_hp			= htmlspecialchars($_POST['no_hp']);
				$alamat			= htmlspecialchars($_POST['alamat']);
				$NIS2			= htmlspecialchars($_POST['NIS2']);
				
				$update = mysqli_query($koneksi,"UPDATE tb_siswa SET nama='$nama', kelas='$kelas', id_jk='$id_jk', tgl_lahir='$tgl_lahir', tempat_lahir='$tempat_lahir', email='$email', no_hp='$no_hp', alamat='$alamat' WHERE NIS='$NIS2'");
				if($update){
					header("Location:edit.php?NIS=$NIS2&kondisi=ya");
				}else{
					echo '<div class="alert alert-danger">Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}