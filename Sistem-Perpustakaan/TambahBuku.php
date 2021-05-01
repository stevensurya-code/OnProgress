<?php
session_start();
try{
	include "conn.php";
	$stat = $_SESSION['stat'];
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Buku</title>
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
		
	</style>
	<script>
			function Perpindahan(){
			  //alert('this one works too!'); 
			  window.location.href = "HomeAdmin.php";
			}
			function ValidasiForm() {
			var judul = document.forms["BukuForm"]["judul"].value;
			if (judul == "" || judul == null) {
				alert("Judul must be filled out");
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
					<form name="BukuForm" action="TambahBuku_Proses.php" 
					method="POST" enctype="multipart/form-data" 
					onsubmit="return ValidasiForm()" required>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-2"><label>Judul : </label></td>
						<td class="col-sm-3"><label><input type="text" name="judul" placeholder="Judul Buku" autocomplete="off" size="34"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-2"><label>Penulis : </label></td>
						<td class="col-sm-3"><label><input type="text" name="penulis" placeholder="Nama Penulis" autocomplete="off" size="34"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-2"><label>Tahun : </label></td>
						<td class="col-sm-3"><label><input type="text" name="tahun" placeholder="Tahun Pembuatan" autocomplete="off" size="34"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-2"><label>Sinopsis : </label></td>
						<td class="col-sm-3"><label><input type="text" name="sinopsis" placeholder="Sinopsis Buku" autocomplete="off" size="34"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label>Jumlah Buku : </label></td>
						<td class="col-sm-3"><label><input type="text" name="jumlah" placeholder="Jumlah Buku" autocomplete="off" size="34"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-2"><label>Foto : </label></td>
						<td class="col-sm-3"><input type="file" name="foto"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-2">
							
							<input type="hidden" name="id" value= "<?php echo $id ?>" >
							<input type="submit" name="submit" value="Submit"></input></td>
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