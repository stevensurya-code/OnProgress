<?php
session_start();
try{
	include "conn.php";
	$id_c = $_SESSION['id']; 
	$stat = $_SESSION['stat'];
	
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Assets/bootstrap.min.css">
	<link href="Assets/style.css" rel="stylesheet">

	<script>
			function Perpindahan(){
			  window.location.href = "TambahStaff.php";
			}
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
			<input type="text" class="boxsearch" id="myInput" onkeyup="searching()" placeholder="Cari Judul Buku">
			<button id="tambah" onclick="Perpindahan()" class="butbook">Tambah Staff</button>
				<table class="table1" id="myTable">
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
				</table>
			</div>
		</div>
</body>
</html>