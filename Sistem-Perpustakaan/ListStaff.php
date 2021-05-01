<?php
session_start();
try{
	include "conn.php";
	$id_c = $_SESSION['id']; 
	
	$sql = "SELECT * FROM staff WHERE Status = '2'";
	$hasil = $pdo->query($sql);
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>List Staff</title>
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
		}
		table, th, td {
		  border: 1px solid black;
		}
		#tambah{
			width:100%;
			height: 100%;
		}
	</style>
	<script>
			function Perpindahan(){
			  //alert('this one works too!'); 
			  window.location.href = "Book.php";
			}
	</script
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
					<li class="nav-item">
					  <a class="nav-link" href="ListStaff.php">List Staff</a>
					</li>
				</ul>
			</div>
			<div class="col-sm-10" id="colom2">
				<table class="col-sm-10">
					<tr>
						<th class="col-sm-1">No.</th>
						<th class="col-sm-2">Nama Staff</th>
						<th class="col-sm-2">Password</th>
						<th class="col-sm-2">Email</th>
						<th class="col-sm-2">No Handphone</th>
					</tr>
					<?php 
						$i=0;
						while ($row = $hasil->fetch()):
						$i++;
					?>
					<tr>
						<td class="col-sm-1"><?= $i ?></td>
						<td class="col-sm-2"><?= $row['Nama'] ?></td>
						<td class="col-sm-2"><?= $row['Password'] ?></td>
						<td class="col-sm-2"><?= $row['Email'] ?></td>
						<td class="col-sm-2"><?= $row['NoHP'] ?></td>
						
					</tr>
					<?php 
						endwhile;
					?>
					<tr>
						<td class="col-sm-2">
							<button id="tambah"><a href="TambahStaff.php">Tambah Staff</a></button>
						</td>
					</tr>
				</table>
			</div>
		</div>
</body>
</html>