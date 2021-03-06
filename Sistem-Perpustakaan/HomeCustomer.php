<?php
session_start();
try{
	include "conn.php";
	$id_c = $_SESSION['id']; 
	$sql = "SELECT * FROM buku";
	$hasil = $pdo->query($sql);
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Customer</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Assets/bootstrap.min.css">
	<link href="Assets/style.css" rel="stylesheet">
	<script>
		function Checking(){
			if (confirm("Apakah Anda Yakin Mau Meminjam Buku Ini?")) {
				return true;
			  } else {
				return false;
			  }
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
		<h1 class="my-0 mr-md-auto font-weight-bold">Selamat Datang <?php echo $_SESSION['nama']?> </h1>
		<nav id="topright" class="my-2 my-md-0 mr-md-3">
			<button id="topbut"><a class="nav-link" href="Profile.php">Profile</a></button>
			<button id="topbut"><a class="nav-link" href="Login.php">Log Out</a></button>
		</nav>
	</div>
	<div>
		<div class="row" >
			<div class="col-sm-2" id="colom1">
				<ul>
					<li>
					  <a class="active" href="HomeCustomer.php">Home</a>
					</li>
					<li>
					  <a href="StatusPinjaman.php">Status Pinjaman</a>
					</li>
					<li>
					  <a href="SelesaiPinjam.php">Selesai Dipinjam</a>
					</li>						
				</ul>
			</div>
			<div class="col-sm-10" id="colom2" >
			<input type="text" class="boxsearch" id="myInput" onkeyup="searching()" placeholder="Cari Judul Buku">
				<table class="table1" id="myTable">
					<tr>
						<th class="col-sm-1">No.</th>
						<th class="col-sm-2">Judul</th>
						<th class="col-sm-2">Penulis</th>
						<th class="col-sm-1">Tahun</th>
						<th class="col-sm-2">Sinopsis</th>
						<th class="col-sm-2">Foto</th>
						<th class="col-sm-2">Action</th>
					</tr>
					<?php 
						$i=0;
						while ($row = $hasil->fetch()):
						$i++;	
						$jumlah = $row['Jumlah'];
						$sqldouble = "SELECT * FROM status_pinjam WHERE ID_Buku=$i AND ID_Customer=$id_c";
						$stmtdouble = $pdo->query($sqldouble);
						$rowdouble = $stmtdouble->fetch();
					?>
					<tr>
						<td class="col-sm-1"><?= $i ?></td>
						<td class="col-sm-2"><?= $row['Judul'] ?></td>
						<td class="col-sm-2"><?= $row['Penulis'] ?></td>
						<td class="col-sm-1"><?= $row['Tahun'] ?></td>
						<td class="col-sm-2"><?= $row['Sinopsis'] ?></td>
						<td class="col-sm-2"><img src="<?= $row['Foto'] ?>" /></td>
						<td class="col-sm-2" >
						<?php 
							
						?>
						<form method="POST" action="Book.php">
							<input type="hidden" name="idb" value= "<?php echo $row['ID_Buku'] ?>" >
							<input type="hidden" name="idc" value= "<?php echo $id_c ?>" >
							<?php if($rowdouble != "" || $rowdouble != null ):?>
							<input type="submit" name="submit" value="Already" class="butedit" disabled></input></td>
							<?php elseif($jumlah != 0): ?>
							<input type="submit" name="submit" value="Book" class="butbook" onclick="return Checking()" required>
							</input></td>	
							<?php else: ?>
							<button type="submit" name="submit" class="butcancel" disabled>FULL</input></td>
							<?php endif ?>
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