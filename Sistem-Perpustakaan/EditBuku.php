<?php
session_start();
try{
	include "conn.php";
		
	$id = $_POST['idbuku'];
	$sql = "SELECT * FROM buku WHERE ID_Buku = ?";
	$stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch();
	$stat = $_SESSION['stat'];
	
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
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
		}
		
	</style>
	<script>
			function Perpindahan(){
			  //alert('this one works too!'); 
			  window.location.href = "HomeAdmin.php";
			}
			function ValidasiForm() {
			var judul = document.forms["BukuForm"]["Judul"].value;
			var penulis = document.forms["BukuForm"]["Penulis"].value;
			var tahun = document.forms["BukuForm"]["Tahun"].value;
			var sinopsis = document.forms["BukuForm"]["Sinopsis"].value;
			var foto = document.forms["BukuForm"]["foto"].value;
			if (judul == "" || judul == null || penulis == "" || penulis == null || tahun == "" || tahun == null || sinopsis == "" || sinopsis == null || foto == null || foto == "") {
				alert("All Coloumn must be filled out");
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
					<form name="BukuForm" method="POST" action="EditBuku_Proses.php" enctype="multipart/form-data" onsubmit="return ValidasiForm()" required >
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label>Judul : </label></td>
						<td class="col-sm-3"><input type="text" name="Judul" value="<?php echo $row['Judul']?>" autocomplete="off" size="34"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label>Penulis : </label></td>
						<td class="col-sm-3"><input type="text" name="Penulis" value="<?php echo $row['Penulis']?>" autocomplete="off" size="34"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label>Tahun : </label></td>
						<td class="col-sm-3"><input type="text" name="Tahun" value="<?php echo $row['Tahun']?>" autocomplete="off" size="34"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label>Sinopsis : </label></td>
						<td class="col-sm-3"><input type="text" name="Sinopsis" value="<?php echo $row['Sinopsis']?>" autocomplete="off" size="34"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label>Jumlah Buku : </label></td>
						<td class="col-sm-3"><input type="text" name="Jumlah" value="<?php echo $row['Jumlah']?>" autocomplete="off" size="34"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label>Foto : </label></td>
						<td class="col-sm-3"><img src="<?= $row['Foto'] ?>" /></br><label>Ubah Menjadi : </label><input type="file" name="foto"></br></td>
						<td class="col-sm-3"></td>
					</tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3">
							
							<input type="hidden" name="id" value= "<?php echo $id ?>" >
							<input type="submit" value="Submit"></input></td>
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