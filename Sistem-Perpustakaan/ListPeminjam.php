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
		#myInput {
		  background-image: url('/css/searchicon.png');
		  background-position: 10px 10px;
		  background-repeat: no-repeat;
		  width: 100%;
		  font-size: 16px;
		  padding: 12px 20px 12px 40px;
		  border: 1px solid #ddd;
		  margin-bottom: 12px;
		}
	</style>
	<script>
			function Perpindahan(){
			  //alert('this one works too!'); 
			  window.location.href = "Book.php";
			}
			function myFunction() {
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
					<?php if($stat =="1"): ?>
					<li class="nav-item"><a class="nav-link" href="ListStaff.php">List Staff</a></li>
					<?php endif; ?>
				</ul>
			</div>
			<?php // ini ngegunain fungsi search table?>
			<div class="col-sm-10" id="colom2">
					<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
					
					<table class="col-sm-10" id="myTable">
					<tr class="header">
						<th class="col-sm-1">No.</th>
						<th class="col-sm-2">Nama Peminjam</th>
						<th class="col-sm-2">Judul Buku</th>
						<th class="col-sm-2">Foto</th>
						<th class="col-sm-1">Status</th>
						<th class="col-sm-2">Nama Staff</th>
						<th class="col-sm-3">Tanggal Pengambilan</th>
						<th class="col-sm-3">Tanggal Pengembalian</th>
				
					</tr>
					<?php 
						$i=0;
						while ($row = $hasil->fetch()):
							$id_b = $row['ID_Buku'];
							$id_c = $row['ID_Customer'];
							$id_s = $row['ID_Staff'];
							$tgla = $row['Tanggal_Pengambilan'];
							$tglk = $row['Tanggal_Pengembalian'];
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
						<td class="col-sm-1"><?= $row2['Nama'] ?></td>
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
						
					</tr>
					<?php 
						endwhile;
					?>
				</table>
			</div>
			
		</div>
</body>
</html>