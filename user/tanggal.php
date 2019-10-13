<?php
function aman($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function tanggal($date){
	
	$tgl   = substr($date, 8, 2);
 
	$result = $tgl ;		
	return($result);
}
?>