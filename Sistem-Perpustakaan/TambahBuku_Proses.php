<?php
session_start();
try{
	include "conn.php";
	
	$judul = $_POST['judul'];
	$penulis = $_POST['penulis'];
	$tahun = $_POST['tahun'];
	$sinopsis = $_POST['sinopsis'];
	$jumlah = $_POST['jumlah'];
	
	$nama = explode(".",$_FILES['foto']['name']);
	$nama = end($nama);
	$nama = strtolower($nama);
	
	
	echo "<pre>";
	var_dump($nama);
	
	if($nama == "jpg" || $nama == "jpeg" || $nama == "png"){
		echo "bole di upload";
		$tmp = $_FILES['foto']['tmp_name'];
		$penyimpanan = "Uploads/" . $_FILES['foto']['name'];
		move_uploaded_file($tmp,$penyimpanan);
		
		$sql = "INSERT INTO buku(Judul,Penulis,Tahun,Sinopsis,Foto,Jumlah) VALUES (?,?,?,?,?,?)";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$judul,$penulis,$tahun,$sinopsis,$penyimpanan,$jumlah]);
	}
	
	
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}
header("location:HomeAdmin.php");
?>