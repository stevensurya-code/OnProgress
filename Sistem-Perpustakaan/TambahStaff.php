<?php
session_start();
try{
	include "conn.php";
		
	$sql = "SELECT * FROM staff";
	$hasil = $pdo->query($sql);
	
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Staff</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Assets/bootstrap.min.css">
	<link href="Assets/style.css" rel="stylesheet">
	
	<script>
			function Perpindahan(){
			  window.location.href = "ListStaff.php";
			}
			function ValidasiForm() {
				var nama = document.forms["StaffForm"]["nama"].value;
				var pass = document.forms["StaffForm"]["password"].value;
				var email = document.forms["StaffForm"]["email"].value;
				var hp = document.forms["StaffForm"]["hp"].value;
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
	<div>
		<div class="row" >
			<div class="col-sm-2 " id="colom1">
				<ul>
					<li>
					  <a href="HomeAdmin.php">Home</a>
					</li>
					<li>
					  <a href="ListPeminjam.php">List Pinjaman</a>
					</li>
					<li>
					  <a href="ListSelesai.php">List Selesai</a>
					</li>
					<li>
					  <a href="Transaksi.php">Transaksi</a>
					</li>
					<li>
					  <a href="TambahBuku.php">Tambah Buku</a>
					</li>
					<li>
						<a class="active" href="ListStaff.php">List Staff</a>
					</li>
				</ul>
			</div>
			<div class="col-sm-10" id="colom2">
				<table>
					<form name="StaffForm" action="TambahStaff_Proses.php" 
					method="POST" enctype="multipart/form-data" 
					onsubmit="return ValidasiForm()" required>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-2"><label>Nama : </label></td>
						<td class="col-sm-3"><label><input type="text" name="nama" placeholder="Nama" autocomplete="off" size="35"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-2"><label>Password : </label></td>
						<td class="col-sm-3"><label><input type="password" name="password" placeholder="Password" size="30"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-2"><label>Email : </label></td>
						<td class="col-sm-3"><label><input type="text" name="email" placeholder="Email" autocomplete="off" size="34"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-2"><label>No Handphone : </label></td>
						<td class="col-sm-3"><label><input type="text" name="hp" placeholder="No Handphone" autocomplete="off" size="29"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-2">
							<input type="submit" value="Simpan"> 
						</td>
						<td class="col-sm-3" ><input type="button" onclick="Perpindahan()" value="Cancel"></input></td>	
					
						<td class="col-sm-3"></td>
					</tr>
					</form>
				</table>
			</div>
		</div>
</body>
</html>