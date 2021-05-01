<?php
session_start();
try{
	include "conn.php";
	$id_c = $_SESSION['id']; 
	
	$sql = "SELECT * FROM status_pinjam WHERE ID_Customer = $id_c";
	$hasil = $pdo->query($sql);
	
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Status Pinjaman</title>
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
		table, th, td {
		  border: 1px solid black;
		}
	</style>
	<script>
			function Perpindahan(){
			  //alert('this one works too!'); 
			  window.location.href = "Book.php";
			}
	</script
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
					  <a class="nav-link" href="HomeCustomer.php">Home</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="StatusPinjaman.php">Status Pinjaman</a>
					</li>
				</ul>
			</div>
			<div class="col-sm-10" id="colom2">
				<table class="col-sm-10">
					<tr>
						<th class="col-sm-1">No.</th>
						<th class="col-sm-2">Judul Buku</th>
						<th class="col-sm-2">Foto</th>
						<th class="col-sm-1">Status</th>
						<th class="col-sm-2">Nama Staff</th>
						<th class="col-sm-3">Tanggal Pengambilan</th>
						<th class="col-sm-3">Tanggal Pengembalian</th>
						<th class="col-sm-1">Action</th>
					</tr>
					<?php 
						$i=0;
						while ($row = $hasil->fetch()):
							$id_b = $row['ID_Buku'];
							$id_s = $row['ID_Staff'];
							$tgla = $row['Tanggal_Pengambilan'];
							$tglk = $row['Tanggal_Pengembalian'];
							$status = $row['Status'];
							
							$sqlbuk = "SELECT * FROM buku WHERE ID_Buku = ?";
							$stmt1 = $pdo->prepare($sqlbuk);
							$stmt1->execute([$id_b]);
							$row1 = $stmt1->fetch();
						$i++;
					?>
					<tr>
						<td class="col-sm-1"><?= $i ?></td>
						<td class="col-sm-2"><?= $row1['Judul'] ?></td>
						<td class="col-sm-2"><img src="<?= $row1['Foto'] ?>" /></td>
						<td class="col-sm-2"><?= $row['Status'] ?></td>
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
						<td class="col-sm-2">
							<?php 
							if($tgla == null || $tgla == "" || $tgla == "0000-00-00"){
								echo "-";
								} else{
									echo $tgla;
								}
							?>
						</td>
						<td class="col-sm-2">
							<?php 
							if($tglk == null || $tglk == "" || $tglk == "0000-00-00"){
								echo "-";
								} else{
									echo $tglk;
								}
							?>
						</td>
						<td class="col-sm-1" >
						<form method="POST" action="UnBook.php">
							<input type="hidden" name="idb" value= "<?php echo $row['ID_Buku'] ?>">
							<input type="hidden" name="idc" value= "<?php echo $id_c ?>">
							
							<?php if($status == "Booked"):?>
							<input type="submit" name="submit" value="UnBook"></input>	
							<?php elseif($status == "Taken"): ?>
							<button type="submit" name="submit" value="" disabled>Must Return</input></td>
							<?php else: ?>
							<button type="submit" name="submit" value="" disabled>Done</input></td>
							<?php endif ?>
							
						</form>
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