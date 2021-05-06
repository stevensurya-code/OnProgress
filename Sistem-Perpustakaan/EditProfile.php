<?php
session_start();
try{
	include "conn.php";
		
	$id = $_SESSION['id'];
	$stat = $_SESSION['stat'];
	if($stat=="" || $stat==null){
		$sql = "SELECT * FROM customer WHERE ID_Customer = ?";
		$stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch();
	}else{
		$sql = "SELECT * FROM staff WHERE ID_Staff = ?";
		$stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch();
	}
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Assets/bootstrap.min.css">
	<link href="Assets/style.css" rel="stylesheet">
	<script>
			function Perpindahan(){
			  window.location.href = "Profile.php";
			}
			function ValidasiForm() {
			var nama = document.forms["ProfileForm"]["Nama"].value;
			var email = document.forms["ProfileForm"]["Email"].value;
			var pass = document.forms["ProfileForm"]["Password"].value;
			var hp = document.forms["ProfileForm"]["HP"].value;
			var alamat = document.forms["ProfileForm"]["Alamat"].value;
			
			if (nama == "" || nama == null ){
				alert("Nama Tidak Bolek Dikosongkan");
				return false;
				}
			if (email == "" || email == null) {
				alert("Email Tidak Bolek Dikosongkan");
				return false;
				}
			if (pass == "" || pass == null) {
				alert("Password Tidak Bolek Dikosongkan");
				return false;
				}
			if (hp == "" || hp == null) {
				alert("No Handphone Tidak Bolek Dikosongkan");
				return false;
				}
			if (alamat == "" || alamat == null) {
				alert("Alamat Tidak boleh Dikosongkan");
				return false;
				}
			}
	</script>
</head>
<body>
	<div id="top" class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4">
		<h1 class="my-0 mr-md-auto font-weight-bold">Halo <?php echo $_SESSION['nama']?> </h1>
		<nav id="topright" class="my-2 my-md-0 mr-md-3">
			<button id="topbut"><a class="nav-link" href="Profile.php">Profile</a></button>
			<button id="topbut"><a class="nav-link" href="Login.php">Log Out</a></button>
		</nav>
	</div>
	<div >
		<div class="row" >
			<div class="col-sm-2 " id="colom1">
				<ul>
					<?php if($stat !=""): ?>
					<li>
					  <a href="HomeAdmin.php">Home</a>
					</li>
					<li >
					  <a href="ListPeminjam.php">List Pinjaman</a>
					</li>
					<li>
					  <a href="ListSelesai.php">List Selesai</a>
					</li>
					<li >
					  <a href="Transaksi.php">Transaksi</a>
					</li>
					<li >
					  <a href="TambahBuku.php">Tambah Buku</a>
					</li>
					<?php else:?>
					<li >
					  <a href="HomeCustomer.php">Home</a>
					</li>
					<li >
					  <a href="StatusPinjaman.php">Status Pinjaman</a>
					</li>	
					<li>
					  <a href="SelesaiPinjam.php">Selesai Dipinjam</a>
					</li>	
					<?php endif; ?>
					<?php if($stat =="1"): ?>
					<li ><a href="ListStaff.php">List Staff</a></li>
					<?php endif; ?>
				</ul>
			</div>
			<div class="col-sm-10" id="colom2">
				<table>
					<form name="ProfileForm" method="POST" action="EditProfile_Proses.php"
						onsubmit="return ValidasiForm()" required>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label>Nama : </label></td>
						<td class="col-sm-3"><label><input type="text" name="Nama" value="<?php echo $row['Nama']?>" autocomplete="off" size="34"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label>Password : </label></td>
						<td class="col-sm-3"><label><input type="password" name="Password" autocomplete="off" size="34"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label>Email : </label></td>
						<td class="col-sm-3"><label><input type="email" name="Email" value="<?php echo $row['Email']?>" autocomplete="off" size="34"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label>No Handphone : </label></td>
						<td class="col-sm-3"><label><input type="text" name="HP" value="<?php echo $row['NoHP']?>" autocomplete="off" size="34"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<?php if($stat =="" || $stat =="" ): ?>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label>Alamat : </label></td>
						<td class="col-sm-3"><label><input type="text" name="Alamat" value="<?php echo $row['Alamat']?>" autocomplete="off" size="34"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<?php else: ?>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label><input type="hidden" name="Alamat" value="a" autocomplete="off" size="34"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<?php endif; ?>
					
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3">
							
							<input type="hidden" name="id" value= "<?php echo $id ?>"></input>
							<input type="hidden" name="stat" value= "<?php echo $stat ?>"></input>
							<input type="submit" name="submit" class="butsubmit" value="Submit"></input></td>
							</td>
						<td class="col-sm-3" ><input type="button" class="butcancel" onclick="Perpindahan()" value="Cancel"></input></td>	
					
						<td class="col-sm-3"></td>
					<tr>
					</form>
				</table>
			</div>
		</div>
</body>
</html>