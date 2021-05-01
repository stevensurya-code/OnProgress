<?php
session_start();
try{
	include "conn.php";
	
	$id = $_POST['id'];
	$nama = $_POST['Nama'];
	$stat = $_POST['stat'];
	$email = $_POST['Email'];
	$pass = $_POST['Password'];
	$hp = $_POST['HP'];
	if($stat=="" || $stat==null){
		echo "customer";
		echo $id;
		echo $stat;
		$sqlup = "UPDATE customer SET 
				Nama=?,
				Password=?,
				Email=?,
				NoHP=?
			WHERE ID_Customer =?";
		$stmtup = $pdo->prepare($sqlup);
		$stmtup->execute([$nama,$pass,$email,$hp,$id]);
	}else{
		echo "staff";
		echo $id;
		echo $stat;
		$sqlup = "UPDATE staff SET 
				Nama=?,
				Password=?,
				Email=?,
				NoHP=?
			WHERE ID_Staff =?";
		$stmtup = $pdo->prepare($sqlup);
		$stmtup->execute([$nama,$pass,$email,$hp,$id]);
	}
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}
header("location:Profile.php");
?>