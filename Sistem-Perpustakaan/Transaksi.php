<?php
session_start();
try{
	include "conn.php";
		
	$id_s = $_SESSION['id']; 
	$stat = $_SESSION['stat'];
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Transaksi</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<style>
		html, body {
		  height: 100%;
		  margin: 0;
		}
		.full-height {
		  height: 100%;
		  background: yellow;
		}
		#top{
			background-color : DimGrey;
		}
		#topright {
			display: flex;
			float: right;
			margin-right: 50px;
			font-size: 18px;
		}
		#judul{
			font-size : 22px;
		}
		#colom1{
			background-color:lavender;
		}
		#colom2{
			background-color:lavenderblush;
			overflow-x:auto;
		}
		
	</style>
	<script>
			function Perpindahan(){
			  window.location.href = "HomeAdmin.php";
			}
			function ValidasiForm() {
			var Email = document.forms["TransactionForm"]["Email"].value;
			var Hp = document.forms["TransactionForm"]["Hp"].value;
			var judul = document.forms["TransactionForm"]["JudulB"].value;
			var trans = document.forms["TransactionForm"]["Transac"].value;
			if (Email == "" || Email == null) {
				alert("Email Peminjam must be filled out");
				return false;
				}
	
			if (Hp == "" || Hp == null) {
				alert("No Handphone Peminjam must be filled out");
				return false;
				}
	
			if (judul == "" || judul == null) {
				alert("Judul Buku must be filled out");
				return false;
				}
			
			if (trans == "" || trans == null) {
				alert("Jenis Transaksi must be filled out");
				return false;
				}
			}
		</script>
</head>

<body>
	<div id="top" class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4">
		<a id="judul" class="my-0 mr-md-auto font-weight-normal" href="">Selamat Datang <?php echo $_SESSION['nama']?> </a>
		<nav id="topright" class="my-2 my-md-0 mr-md-3">
			<a class="nav-link" href="Profile.php">Profile</a>
			<a class="nav-link" href="Login.php">Log Out</a>
		</nav>
	</div>
	<div class="container-fluid " >
		<div class="row" >
			<div class="col-sm-2 " id="colom1">
				<ul class="nav flex-column">
					<li class="nav-item">
					  <a class="nav-link" href="HomeAdmin.php">Home</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="ListPeminjam.php">List Pinjaman</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="Transaksi.php">Transaksi</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="TambahBuku.php">Tambah Buku</a>
					</li>
					<?php if($stat =="1"): ?>
					<li class="nav-item"><a class="nav-link" href="ListStaff.php">List Staff</a></li>
					<?php endif; ?>
				</ul>
			</div>
			<div class="col-sm-10" id="colom2">
				<table>
					<form name="TransactionForm" onsubmit="return ValidasiForm()"
					action="Transaksi_Proses.php" 
					method="POST" enctype="multipart/form-data" 
					required>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label style="color:black;">Email Peminjam : </label></td>
						<td class="col-sm-3"><input type="email" name="Email"></br></td>
						<td class="col-sm-3"></td>
					<tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label style="color:black;">No HP Peminjam : </label></td>
						<td class="col-sm-3"><input type="text" name="Hp"></br></td>
						<td class="col-sm-3"></td>
					<tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label style="color:black;">Judul Buku : </label></td>
						<td class="col-sm-3"><input type="text" name="JudulB"></br></td>
						<td class="col-sm-3"></td>
					<tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label style="color:black;">Jenis Transaksi : </label></td>
						<td class="col-sm-3"><select id="status" name="Transac">
											<option value="Pengambilan">Pengambilan</option>
											<option value="Pengembalian">Pengembalian</option>
											</select></br></td>
						<td class="col-sm-3"></td>
					<tr>
					<tr>
						<td class="col-sm-3">
							<input type="hidden" name="ids" value= "<?php echo $id_s ?>" >
							<input type="hidden" name="tgl" value= "<?php echo date("Y-m-d") ?>" >
						</td>
						<td class="col-sm-3">
							
							<input type="submit" value="Simpan"> 
							</td>
						<td class="col-sm-3" ><input type="button" onclick="Perpindahan()" value="Cancel"></input></td>	
					
						<td class="col-sm-3"></td>
					<tr>
					</form>
				</table>
</body>
</html>