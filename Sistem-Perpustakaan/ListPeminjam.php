<?php
session_start();
try{
	include "conn.php";
	
	$sql = "SELECT * FROM status_pinjam";
	$hasil = $pdo->query($sql);
	$stat = $_SESSION['stat'];
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>List peminjam</title>
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
					  <a class="active" href="ListPeminjam.php">List Pinjaman</a>
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
			<?php // ini ngegunain fungsi search table?>
			<div class="col-sm-10" id="colom2">
					<input type="text" class="boxsearch" id="myInput" onkeyup="searching()" placeholder="Cari Nama Peminjam...">
					
					<table class="table1" id="myTable">
					<tr class="header">
						<th class="col-sm-1">No.</th>
						<th class="col-sm-2">Nama Peminjam</th>
						<th class="col-sm-2">Judul Buku</th>
						<th class="col-sm-2">Foto</th>
						<th class="col-sm-1">Status</th>
						<th class="col-sm-2">Nama Staff</th>
						<th class="col-sm-1">Tanggal Pengambilan</th>
				
					</tr>
					<?php 
						$i=0;
						while ($row = $hasil->fetch()):
							$id_b = $row['ID_Buku'];
							$id_c = $row['ID_Customer'];
							$id_s = $row['ID_Staff'];
							$tgla = $row['Tanggal_Pengambilan'];
							$sqlbuk = "SELECT * FROM buku WHERE ID_Buku = ?";
							$stmt1 = $pdo->prepare($sqlbuk);
							$stmt1->execute([$id_b]);
							$row1 = $stmt1->fetch();
							
							$sqlcus = "SELECT * FROM customer WHERE ID_Customer = ?";
							$stmt2 = $pdo->prepare($sqlcus);
							$stmt2->execute([$id_c]);
							$row2 = $stmt2->fetch();
						$i++;
					?>
					<tr>
						<td class="col-sm-1"><?= $i ?></td>
						<td class="col-sm-2"><?= $row2['Nama'] ?></td>
						<td class="col-sm-2"><?= $row1['Judul'] ?></td>
						<td class="col-sm-2"><img src="<?= $row1['Foto'] ?>" /></td>
						<td class="col-sm-1"><?= $row['Status'] ?></td>
						<td class="col-sm-2">
							<?php if($id_s == null || $id_s == "" || $id_s == "0"){
								echo "-";
								} else{
									$sqlstaf = "SELECT * FROM staff WHERE ID_Staff = ?";
									$stmt2 = $pdo->prepare($sqlstaf);
									$stmt2->execute([$id_s]);
									$row2 = $stmt2->fetch();
									echo $row2['Nama'];
								}
							?>
						</td>
						<td class="col-sm-1">
							<?php 
							if($tgla == null || $tgla == "" || $tgla == "0000-00-00"){
								echo "-";
								} else{
									echo $tgla;
								}
							?>
						</td>
					</tr>
					<?php 
						endwhile;
					?>
				</table>
			</div>
			
		</div>
</body>
</html>