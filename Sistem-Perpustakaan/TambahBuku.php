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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Assets/bootstrap.min.css">
	<link href="Assets/style.css" rel="stylesheet">
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
					  <a class="active" href="TambahBuku.php">Tambah Buku</a>
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
						<td class="col-sm-3"><label><input type="date" name="tahun" autocomplete="off" size="34"></br></td>
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
							<input type="submit" name="submit" value="Submit" class="butsubmit"></input></td>
							</td>
						<td class="col-sm-3" ><input type="button" onclick="Perpindahan()" value="Cancel" class="butcancel"></input></td>	
					
						<td class="col-sm-3"></td>
					</tr>
					</form>
				</table>
			</div>
		</div>
</body>
</html>