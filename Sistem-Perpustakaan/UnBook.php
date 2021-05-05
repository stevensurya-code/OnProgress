<?php
session_start();
try{
	include "conn.php";
	
	$idb = $_POST['idb'];
	$idc = $_POST['idc'];
	$sql = "SELECT * FROM buku WHERE ID_Buku=?";
	$stmt = $pdo->prepare($sql);
	$stmt ->execute([$idb]);
	$row = $stmt->fetch();
	$jumlah = $row['Jumlah'];
	$jumlah = $jumlah+1;
	
	$idc = $_POST['idc'];
	$status = "Booked";
	echo $idb;
	echo $idc;
	//tambahin status kalo book aja yg bisa diapus
	$sqldel = "DELETE FROM status_pinjam WHERE ID_Buku=? AND ID_Customer=?";
	$stmtdel = $pdo->prepare($sqldel);
	$stmtdel -> execute([$idb,$idc]);
	
	$sqlup = "UPDATE buku SET 
				Jumlah=?
			WHERE ID_Buku =?";
	$stmtup = $pdo->prepare($sqlup);
	$stmtup->execute([$jumlah,$idb]);
	
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}
header("location:StatusPinjaman.php");
?>