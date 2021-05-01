<?php
session_start();
try{
	include "conn.php";
	
	$id = $_POST['idb'];
	$sql = "SELECT * FROM buku WHERE ID_Buku=?";
	$stmt = $pdo->prepare($sql);
	$stmt ->execute([$id]);
	$row = $stmt->fetch();
	$jumlah = $row['Jumlah'];
	$jumlah = $jumlah-1;
	
	$idc = $_POST['idc'];
	$status = "Booked";
	
	$sql1 = "INSERT INTO status_pinjam(ID_Buku,ID_Customer,Status) VALUES (?,?,?)";
	$stmt1 = $pdo->prepare($sql1);
	$stmt1->execute([$id,$idc,$status]);
	
	$sqlup = "UPDATE buku SET 
				Jumlah=?
			WHERE ID_Buku =?";
	$stmtup = $pdo->prepare($sqlup);
	$stmtup->execute([$jumlah,$id]);
	
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}
header("location:StatusPinjaman.php");
?>