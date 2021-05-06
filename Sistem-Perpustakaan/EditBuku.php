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
	<title>Edit Buku</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Assets/bootstrap.min.css">
	<link href="Assets/style.css" rel="stylesheet">
	<script>
			function Perpindahan(){
			  window.location.href = "HomeAdmin.php";
			}
			function ValidasiForm() {
			var judul = document.forms["BukuForm"]["Judul"].value;
			var penulis = document.forms["BukuForm"]["Penulis"].value;
			var tahun = document.forms["BukuForm"]["Tahun"].value;
			var sinopsis = document.forms["BukuForm"]["Sinopsis"].value;
			var jumlah = document.forms["BukuForm"]["Jumlah"].value;
				if (judul == "" || judul == null ){
					alert("Judul Tidak Bolek Dikosongkan");
					return false;
				}
				if (penulis == "" || penulis == null ){
					alert("Penulis Tidak Bolek Dikosongkan");
					return false;
				}
				if (tahun == "" || tahun == null ){
					alert("Tahun Tidak Bolek Dikosongkan");
					return false;
				}
				if (sinopsis == "" || sinopsis == null ){
					alert("Sinopsis Tidak Bolek Dikosongkan");
					return false;
				}
				if (jumlah == "" || jumlah == null ){
					alert("Jumlah Tidak Bolek Dikosongkan");
					return false;
				}
			}
	</script>
</head>
<body>
	<div id="top" class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4">
		<h1 class="my-0 mr-md-auto font-weight-bold" href="">Halo <?php echo $_SESSION['nama']?> </h1>
		<nav id="topright" class="my-2 my-md-0 mr-md-3">
			<button id="topbut"><a class="nav-link" href="Profile.php">Profile</a></button>
			<button id="topbut"><a class="nav-link" href="Login.php">Log Out</a></button>
		</nav>
	</div>
	<div id="body">
		<div class="row" >
			<div class="col-sm-2 " id="colom1">
				<ul>
					<li>
					  <a class="active" href="HomeAdmin.php">Home</a>
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
					<?php if($stat =="1"): ?>
					<li>
						<a href="ListStaff.php">List Staff</a>
					</li>
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