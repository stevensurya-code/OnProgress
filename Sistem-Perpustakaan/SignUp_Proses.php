<?php

include "conn.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$pass = $_POST['password'];
//encryp password
$pass = password_hash($pass,PASSWORD_DEFAULT);
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
try{
	$sqlcheck = "SELECT * FROM customer WHERE Email= ?";
        $stmtcheck = $pdo->prepare($sqlcheck);
        $stmtcheck->execute([$email]);
        $rowcheck = $stmtcheck->fetch();
	if($rowcheck != "" || $rowcheck != NULL){
		echo "<script>
			var r = confirm('Anda Sudah Pernah Mendaftar');
				if (r == true) {
					window.location.href='Login.php';
				}
		</script>";
	}else {
	$sql = "INSERT INTO customer (Nama,Email,Password,NoHP,Alamat)
				VALUES(?, ?, ?, ?, ?)";
		$stmt = $pdo -> prepare($sql);
		$stmt->execute([$nama,$email,$pass,$hp,$alamat]);
	}
}catch(PDOExeption $e){
	echo "Error : ".$e->getMessage();
}

	echo "<script>
			var r = confirm('Anda berhasil Mendaftar');
				if (r == true) {
					window.location.href='Login.php';
				}
		</script>";
?>