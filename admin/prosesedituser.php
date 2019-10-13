<?php 			
				include "koneksi.php";
				if(isset($_POST['save'])){
				$wali_kelas			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['wali_kelas']));
				$user_name			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['user_name']));
				
				$kelas			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['kelas']));
				$email			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['email']));
				$no_hp			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['no_hp']));
				$alamat			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['alamat']));
				
				$user_id			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['user_id']));
				$user_id2			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['user_id2']));
				
				$update = mysqli_query($koneksi,"UPDATE user SET user_name='$user_name', email='$email', no_hp='$no_hp', alamat='$alamat', wali_kelas='$wali_kelas' WHERE user_id='$user_id2'");
				if($update){
					header("Location:edituser.php?user_id=$user_id&kondisi=ya");
				}else{
					echo '<div class="alert alert-danger">Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}