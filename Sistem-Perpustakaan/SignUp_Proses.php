<?php

include "conn.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$pass = $_POST['password'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
try{
	$sql = "INSERT INTO customer (Nama,Email,Password,NoHP,Alamat)
				VALUES(?, ?, ?, ?, ?)";
		$stmt = $pdo -> prepare($sql);
		$stmt->execute([$nama,$email,$pass,$hp,$alamat]);
}catch(PDOExeption $e){
	echo "Error : ".$e->getMessage();
}
header("Location:/Sistem Perpustakaan/Login.php");
?>