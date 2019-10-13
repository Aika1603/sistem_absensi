<?php
$host     = "localhost"; // Database Host
$user     = "root"; // Database Username
$password = ""; // Database's user Password
$database = "sc2"; // Database Name
$prefix   = "sc"; // Database Prefix for the script tables

$connect = new mysqli($host, $user, $password, $database);

// Checking Connection
if (mysqli_connect_errno()) {
    printf("Database connection failed: %s\n", mysqli_connect_error());
    exit();
}

mysqli_set_charset($connect, "utf8");

$client = "No";

$site_url             = "http://localhost";
$projectsecurity_path = "http://localhost/absensi_sekolah_native/php-security-master/Source";
?>