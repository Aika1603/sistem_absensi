<?php
function ubahTgl($tanggal){
$pisah = explode('/',$tanggal);
$larik = array($pisah[2],$pisah[1],$pisah[0]);
$satukan = implode('-',$larik);
$tanggal = $satukan;
return $tanggal;
}
?>