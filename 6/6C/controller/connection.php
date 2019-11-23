<?php

function Open()
{
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass	= '';
	$dbname	= 'arkademy';

	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Koneksi ke Database Gagal : " . $conn->error);
	return $conn;

}

function Close($conn)
{
	$conn->close();
}

function rupiah($nilai, $pecahan = 0) {
	return number_format($nilai, $pecahan, ',', '.');
}

?>