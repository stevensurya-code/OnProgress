<?php
session_start();
try{
	include "conn.php";
	
	$email = $_POST['Email'];
	$hp = $_POST['Hp'];
	$judul = $_POST['JudulB'];
	$idc="";
	$idb="";
	
	echo $email;
	echo "<pre>";
	echo $hp;
	echo "<pre>";
	echo $judul;
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
	$jumlah = $hasil2['Jumlah'];
	$jumlah = $jumlah+1;

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
		$sqlget = "SELECT * FROM status_pinjam WHERE ID_Customer =? AND ID_Buku =?";
		$stmtget = $pdo -> prepare($sqlget);
		$stmtget->execute([$idc,$idb]);
		$hasilget = $stmtget->fetch();
		echo "keluar";

		$gettgl = $hasilget['Tanggal_Pengambilan'];

		$sqlin = "INSERT INTO selesai_pinjam (ID_B,ID_Cus,ID_S,Tgl_Ambil,Tanggal_Pengembalian)
				VALUES(?, ?, ?, ?, ?)";
		$stmtin = $pdo -> prepare($sqlin);
		$stmtin->execute([$idb,$idc,$ids,$gettgl,$tgl]);
		
		$sqldel = "DELETE FROM status_pinjam WHERE ID_Buku=? AND ID_Customer=?";
		$stmtdel = $pdo->prepare($sqldel);
		$stmtdel -> execute([$idb,$idc]);


		$sqlup = "UPDATE buku SET 
				Jumlah=?
			WHERE ID_Buku =?";
		$stmtup = $pdo->prepare($sqlup);
		$stmtup->execute([$jumlah,$idb]);
		}
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}
header("location:ListPeminjam.php");
?>