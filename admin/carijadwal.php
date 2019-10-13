<!DOCTYPE HTML>
<?php
session_start();
if(isset($_SESSION["user_id"])) 
{ if(($_SESSION["user_akses"]) == "admin") 
{?>
<html>
<?php include "head.html";?>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <?php include "nav.php";?>
		
		<div id="page-wrapper">
		<div class="graphs">
		<div class="grid_6 grid_5">
			<h3>Pilih Salah Satu Pencarian Berdasarkan :
		</h3>
		<form class="form-horizontal" action="jadwal.php" method="post" name="cari">
				
				<div class="form-group">
					<label class="col-sm-3 control-label">ID MENGAJAR</label>
					<div class="col-sm-3">
						<input type="text" name="id_mengajar" class="form-control1" placeholder="" >
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">MATA PELAJARAN</label>
					<div class="col-sm-4">
						<input type="text" name="materi" class="form-control1" placeholder="" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">HARI</label>
					<div class="col-sm-3">
						<select name="hari" class="form-control1" >
							<option value="">Pilih Salah Satu  <span class="fa arrow"></span></option>
							<option value="SENIN">SENIN</option>
							<option value="SELASA">SELASA</option>
							<option value="RABU">RABU</option>
							<option value="KAMIS">KAMIS</option>
							<option value="JUMAT">JUMAT</option>
							<option value="SABTU">SABTU</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">JAM KE-</label>
					<div class="col-sm-3">
						<select name="jam_belajar" class="form-control1" >
							<option value="">Pilih Salah Satu  <span class="fa arrow"></span></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
						</select>
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">KELAS</label>
					<div class="col-sm-3">
						<input type="text" name="kelas" class="form-control1" id="disabledinput"  placeholder="" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="cari" class="btn btn-primary" value="Search">
						
						<a href="jadwal.php" class="btn btn-danger">KEMBALI</a>
					</div>
				</div>
			</form>
		
		</div>
		</div>
			</div>
				</div>
					<div class="clearfix"> </div>
					<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php

;}else{{header ("location:logout.php");}};}else
{header ("location:../index.php");}
?>