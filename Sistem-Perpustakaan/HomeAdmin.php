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
	<title>Home Admin dan Staff</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Assets/bootstrap.min.css">
	<link href="Assets/style.css" rel="stylesheet">

	<script>
			function searching() {
			  var input, filter, table, tr, td, i, txtValue;
			  input = document.getElementById("myInput");
			  filter = input.value.toUpperCase();
			  table = document.getElementById("myTable");
			  tr = table.getElementsByTagName("tr");
			  for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[1];
				if (td) {
				  txtValue = td.textContent || td.innerText;
				  if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				  } else {
					tr[i].style.display = "none";
				  }
				}       
			  }
			}
	</script>
</head>
<body>
	<div id="top" class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4">
		<h1 class="my-0 mr-md-auto font-weight-bold" href="">Selamat Datang <?php echo $_SESSION['nama']?> </h1>
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
			<input type="text" class="boxsearch" id="myInput" onkeyup="searching()" placeholder="Cari Judul Buku">
				<table class="table1" id="myTable">
					<tr>
						<th class="col-sm-1">No.</th>
						<th class="col-sm-2">Judul</th>
						<th class="col-sm-1">Penulis</th>
						<th class="col-sm-1">Tahun</th>
						<th class="col-sm-2">Sinopsis</th>
						<th class="col-sm-2">Foto</th>
						<th class="col-sm-1">Stok</th>
						<th class="col-sm-2">Action</th>
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
						<td class="col-sm-1"><?= $row['Penulis'] ?></td>
						<td class="col-sm-1"><?= $row['Tahun'] ?></td>
						<td class="col-sm-2"><?= $row['Sinopsis'] ?></td>
						<td class="col-sm-2"><img src="<?= $row['Foto'] ?>" /></td>
						<td class="col-sm-1"><?= $row['Jumlah'] ?></td>
						<td class="col-sm-2" ><input type="hidden" name="idbuku" value="<?= $row['ID_Buku'] ?>"></input>
						<input type="submit" class="butedit" name="edit" value="Edit"></input></td>	
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