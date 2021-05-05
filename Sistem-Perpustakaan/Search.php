<?php
session_start();
try{
	include "conn.php";
	
	$cari = $_POST['cari'];
	$id_c = $_SESSION['id']; 
	$sql = "SELECT * FROM buku WHERE Judul LIKE '%$cari%'";
	$hasil = $pdo->query($sql);

	
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Assets/bootstrap.min.css">
	<link href="Assets/style.css" rel="stylesheet">
</head>
<body>
	<div id="top" class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4">
		<h1 class="my-0 mr-md-auto font-weight-bold">Halo <?php echo $_SESSION['nama']?> </h1>
		<nav id="topright" class="my-2 my-md-0 mr-md-3">
		<form action="Search.php" class="nav-link" id="search" method="post">
			<?php // ini menggunakan fungsi search yang umum?>
			<input type="text" name="cari" placeholder="Masukkan Judul Buku">
			<button type="submit">Search</button>
		</form>
			<button id="topbut"><a class="nav-link" href="Profile.php">Profile</a></button>
			<button id="topbut"><a class="nav-link" href="Login.php">Log Out</a></button>
		</nav>
	</div>
	<div>
		<div class="row" >
			<div class="col-sm-2 " id="colom1">
				<ul>
					<li>
					  <a href="HomeCustomer.php">Home</a>
					</li>
					<li>
					  <a href="StatusPinjaman.php">Status Pinjaman</a>
					</li>					
				</ul>
			</div>
			<div class="col-sm-10" id="colom2">
				<table class="table1">
					<tr>
						<th class="col-sm-1">No.</th>
						<th class="col-sm-2">Judul</th>
						<th class="col-sm-2">Penulis</th>
						<th class="col-sm-1">Tahun</th>
						<th class="col-sm-2">Sinopsis</th>
						<th class="col-sm-3">Foto</th>
						<th class="col-sm-1">Action</th>
					</tr>
					<?php 
						$i=0;
						while ($row = $hasil->fetch()):
						$jumlah = $row['Jumlah'];
						$i++;
					?>
					<tr>
						<td class="col-sm-1"><?= $i ?></td>
						<td class="col-sm-2"><?= $row['Judul'] ?></td>
						<td class="col-sm-2"><?= $row['Penulis'] ?></td>
						<td class="col-sm-2"><?= $row['Tahun'] ?></td>
						<td class="col-sm-2"><?= $row['Sinopsis'] ?></td>
						<td class="col-sm-2"><img src="<?= $row['Foto'] ?>" /></td>
						<td class="col-sm-1" >
						<form method="POST" action="Book.php">
							<input type="hidden" name="idb" value= "<?php echo $row['ID_Buku'] ?>" >
							<input type="hidden" name="idc" value= "<?php echo $id_c ?>" >
							
							<?php if($jumlah != 0):?>
							<input type="submit" name="submit" value="Book"></input></td>	
							<?php else: ?>
							<button type="submit" name="submit" value="Book" disabled>FULL</input></td>
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