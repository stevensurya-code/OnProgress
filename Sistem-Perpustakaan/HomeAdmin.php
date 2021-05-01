<?php
session_start();
try{
	include "conn.php";
		
	$sql = "SELECT * FROM buku";
	$hasil = $pdo->query($sql);
	$id_s = $_SESSION['id'];
	$stat = $_SESSION['stat'];
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
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
		img{
			max-width: 100%;
			height: auto;
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
		table, th, td {
		  border: 1px solid black;
		}
	</style>
	<script>
			function Perpindahan(){
			  //alert('this one works too!'); 
			  window.location.href = "EditBuku.php";
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
				<table class="col-sm-10">
					<tr>
						<th class="col-sm-1">No.</th>
						<th class="col-sm-2">Judul</th>
						<th class="col-sm-2">Penulis</th>
						<th class="col-sm-1">Tahun</th>
						<th class="col-sm-2">Sinopsis</th>
						<th class="col-sm-3">Foto</th>
						<th class="col-sm-3">Stok</th>
						<th class="col-sm-1">Action</th>
					</tr>
					<?php 
						$i=0;
						while ($row = $hasil->fetch()):
						$i++;
					?>
					<tr>
						<form action="EditBuku.php" method="POST">
						<td class="col-sm-1"><?= $i ?></td>
						<td class="col-sm-2"><?= $row['Judul'] ?></td>
						<td class="col-sm-2"><?= $row['Penulis'] ?></td>
						<td class="col-sm-2"><?= $row['Tahun'] ?></td>
						<td class="col-sm-2"><?= $row['Sinopsis'] ?></td>
						<td class="col-sm-3"><img src="<?= $row['Foto'] ?>" /></td>
						<td class="col-sm-2"><?= $row['Jumlah'] ?></td>
						<td class="col-sm-1" ><input type="hidden" name="idbuku" value="<?= $row['ID_Buku'] ?>"></input><input type="submit" name="edit" value="Edit"></input></td>	
						</form>
					</tr>
					<?php 
						endwhile;
					?>
				</table>
			</div>
		</div>
</body>
</html>