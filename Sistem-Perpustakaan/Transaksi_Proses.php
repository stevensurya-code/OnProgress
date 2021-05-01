<?php
session_start();
try{
	include "conn.php";
	
	$email = $_POST['Email'];
	$hp = $_POST['Hp'];
	$idc="";
	$idb="";
	
	$sqlcus = "SELECT * FROM customer WHERE Email=? AND NoHP = ?";
	$stmt1 = $pdo -> prepare($sqlcus);
	$stmt1->execute([$email,$hp]);
	$hasil1 = $stmt1->fetch();
	if($hasil1 != "" || $hasil1 == null){
		$idc = $hasil1['ID_Customer'];
		echo $idc;
	}else{
		//kalo salah
	}
	$judul = $_POST['JudulB'];
	$sqlbuk = "SELECT * FROM buku WHERE Judul=?";
	$stmt2 = $pdo -> prepare($sqlbuk);
	$stmt2->execute([$judul]);
	$hasil2 = $stmt2->fetch();
	if($hasil2 != "" || $hasil2 == null){
		$idb = $hasil2['ID_Buku'];
		echo $idb;
	}else{
		//kalo salah
	}
	$ids = $_POST['ids'];
	echo $ids;
	$tgl = $_POST['tgl'];
	echo $tgl;
	$trans = $_POST['Transac'];
	if($trans == "Pengambilan"){
		$status = "Taken";
		$sqlup = "UPDATE status_pinjam SET 
				Status=?,
				ID_Staff=?,
				Tanggal_Pengambilan=? 
			WHERE ID_Customer =? AND ID_Buku =? ";
		$stmtup = $pdo->prepare($sqlup);
		$stmtup->execute([$status,$ids,$tgl,$idc,$idb]);
		
	}elseif($trans == "Pengembalian"){
		$status = "Done";
		$sqlup = "UPDATE status_pinjam SET 
				Status=?,
				ID_Staff=?,
				Tanggal_Pengembalian=? 
			WHERE ID_Customer =? AND ID_Buku =?";
		$stmtup = $pdo->prepare($sqlup);
		$stmtup->execute([$status,$ids,$tgl,$idc,$idb]);
	}	
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}
header("location:HomeAdmin.php");
?>