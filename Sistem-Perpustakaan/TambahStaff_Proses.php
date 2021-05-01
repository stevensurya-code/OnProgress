<?php
session_start();
try{
	include "conn.php";
	
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$hp = $_POST['hp'];
	$status = "2";
	$sql = "INSERT INTO staff (Nama,Password,Email,NoHP,Status)
				VALUES(?, ?, ?, ?, ?)";
	$stmt = $pdo -> prepare($sql);
	$stmt->execute([$nama,$pass,$email,$hp,$status]);
	
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}
header("location:ListStaff.php");
?>