<?php
session_start();
try{
	include "conn.php";
	
	$id = $_POST['id'];
	$judul = $_POST['Judul'];
	$penulis = $_POST['Penulis'];
	$tahun = $_POST['Tahun'];
	$sinopsis = $_POST['Sinopsis'];
	$jumlah = $_POST['Jumlah'];
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
		
		echo $penyimpanan;
		$sqlup = "UPDATE Buku SET 
				Judul=?,
				Penulis=?,
				Tahun=?,
				Sinopsis=?,
				Foto=?,
				Jumlah=?
			WHERE ID_Buku =?";
		$stmtup = $pdo->prepare($sqlup);
		$stmtup->execute([$judul,$penulis,$tahun,$sinopsis,$penyimpanan,$jumlah,$id]);
	}else if($nama =="" || $nama == null ){
		$sqltake = "SELECT * FROM BUKU WHERE ID_Buku=? ";
		$hasilfoto = $pdo->prepare($sqltake);
		$hasilfoto->execute([$id]);
		$row = $hasilfoto->fetch();
		$datafoto = $row['Foto'];
		$sqlup = "UPDATE Buku SET 
				Judul=?,
				Penulis=?,
				Tahun=?,
				Sinopsis=?,
				Foto=?,
				Jumlah=?
			WHERE ID_Buku =?";
		$stmtup = $pdo->prepare($sqlup);
		$stmtup->execute([$judul,$penulis,$tahun,$sinopsis,$datafoto,$jumlah,$id]);
		
	}
	
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}
header("location:HomeAdmin.php");
?>