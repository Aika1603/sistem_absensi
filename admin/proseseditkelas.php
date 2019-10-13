<?php 			
				include "koneksi.php";
				if(isset($_POST['save'])){
				$wali_kelas			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['wali_kelas']));
				
				$kelas			= htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['kelas']));
			
				$update = mysqli_query($koneksi,"UPDATE kelas SET wali_kelas='$wali_kelas',kelas='$kelas' WHERE user_id='$user_id2'");
				if($update){
					header("Location:edituser.php?user_id=$user_id&kondisi=ya");
				}else{
					echo '<div class="alert alert-danger">Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}