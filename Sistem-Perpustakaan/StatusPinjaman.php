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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Assets/bootstrap.min.css">
	<link href="Assets/style.css" rel="stylesheet">
	<script>
			function Checking(){
			  if (confirm("Apakah Anda Tidak Jadi Meminjam Buku Ini?")) {
				return true;
			  } else {
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
					  <a href="HomeCustomer.php">Home</a>
					</li>
					<li>
					  <a class="active" href="StatusPinjaman.php">Status Pinjaman</a>
					</li>
				</ul>
			</div>
			<div class="col-sm-10" id="colom2">
				<table class="table1">
					<tr>
						<th class="col-sm-1">No.</th>
						<th class="col-sm-2">Judul Buku</th>
						<th class="col-sm-2">Foto</th>
						<th class="col-sm-1">Status</th>
						<th class="col-sm-2">Nama Staff</th>
						<th class="col-sm-1">Tanggal Pengambilan</th>
						<th class="col-sm-1">Tanggal Pengembalian</th>
						<th class="col-sm-2">Action</th>
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
						<td class="col-sm-1">
							<?php 
							if($tglk == null || $tglk == "" || $tglk == "0000-00-00"){
								echo "-";
								} else{
									echo $tglk;
								}
							?>
						</td>
						<td class="col-sm-2" >
						<form method="POST" action="UnBook.php">
							<input type="hidden" name="idb" value= "<?php echo $row['ID_Buku'] ?>">
							<input type="hidden" name="idc" value= "<?php echo $id_c ?>">
							
							<?php if($status == "Booked"):?>
							<input type="submit" name="submit" class="butbook" value="UnBook" onclick="return Checking()" required></input>	
							<?php elseif($status == "Taken"): ?>
							<button type="submit" name="submit" class="butedit" disabled>Must Return</button>
							<?php else: ?>
							<button type="submit" name="submit" class="butcancel" disabled>Done</button>
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