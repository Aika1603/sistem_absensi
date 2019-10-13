<!DOCTYPE HTML>
<?php
session_start();
if(isset($_SESSION["user_id"])) 
{ if(($_SESSION["user_akses"]) == "user") 
{
	header ("location:menu.php");?>
<html>
<?php include "head.html";?>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <?php include "nav.php";?>
		
		<div id="page-wrapper">
		<div class="graphs">
		<div class="grid_6 grid_5">
		Selamat Datang
		
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