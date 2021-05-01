<?php
session_start();
try{
	include "conn.php";
		
	$id = $_SESSION['id'];
	$stat = $_SESSION['stat'];
	if($stat=="" || $stat==null){
		$sql = "SELECT * FROM customer WHERE ID_Customer = ?";
		$stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch();
	}else{
		$sql = "SELECT * FROM staff WHERE ID_Staff = ?";
		$stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch();
	}
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
			  window.location.href = "#edit.php";
			}
	</script>
</head>
<body>
	<div id="top" class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4">
		<a id="judul" class="my-0 mr-md-auto font-weight-normal" href="">Selamat Datang <?php echo $_SESSION['nama']?> </a>
		<nav id="topright" class="my-2 my-md-0 mr-md-3">
			<a class="nav-link disabled" href="Profile.php">Profile</a>
			<a class="nav-link" href="Login.php">Log Out</a>
		</nav>
	</div>
	<div class="container-fluid " >
		<div class="row" >
			<div class="col-sm-2 " id="colom1">
				<ul class="nav flex-column">
					<?php if($stat !=""): ?>
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
					<?php else:?>
					<li class="nav-item">
					  <a class="nav-link" href="HomeCustomer.php">Home</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="StatusPinjaman.php">Status Pinjaman</a>
					</li>	
					<?php endif; ?>
					<?php if($stat =="1"): ?>
					<li class="nav-item"><a class="nav-link" href="ListStaff.php">List Staff</a></li>
					<?php endif; ?>
				</ul>
			</div>
			<div class="col-sm-10" id="colom2">
				<table>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label>Nama : </label></td>
						<td class="col-sm-3"><label><?php echo $row['Nama']?></label></td>
						<td class="col-sm-3"></td>
					<tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label>Password : </label></td>
						<td class="col-sm-3"><label><?php echo $row['Password']?></label></td>
						<td class="col-sm-3"></td>
					<tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label>Email : </label></td>
						<td class="col-sm-3"><label><?php echo $row['Email']?></label></td>
						<td class="col-sm-3"></td>
					<tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label>No Handphone : </label></td>
						<td class="col-sm-3"><label><?php echo $row['NoHP']?></label></td>
						<td class="col-sm-3"></td>
					<tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3">
							<form method="POST" action="EditProfile.php">
							<input type="hidden" name="id" value= "<?php echo $id ?>" >
							<input type="submit" name="submit" value="Edit"></input></td>	
							</form>
							</td>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"></td>
					<tr>
				</table>
			</div>
		</div>
</body>
</html>