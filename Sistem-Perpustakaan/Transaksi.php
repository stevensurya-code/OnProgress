<?php
session_start();
try{
	include "conn.php";
		
	$id_s = $_SESSION['id']; 
	$stat = $_SESSION['stat'];
}catch(PDOException $e){
	echo "Error: ".$e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Transaksi</title>
	<title>List peminjam</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Assets/bootstrap.min.css">
	<link href="Assets/style.css" rel="stylesheet">
	<script>
			function Perpindahan(){
			  window.location.href = "HomeAdmin.php";
			}
			function ValidasiForm() {
			var Email = document.forms["TransactionForm"]["Email"].value;
			var Hp = document.forms["TransactionForm"]["Hp"].value;
			var judul = document.forms["TransactionForm"]["JudulB"].value;
			var trans = document.forms["TransactionForm"]["Transac"].value;
			if (Email == "" || Email == null) {
				alert("Email Peminjam must be filled out");
				return false;
				}
	
			if (Hp == "" || Hp == null) {
				alert("No Handphone Peminjam must be filled out");
				return false;
				}
	
			if (judul == "" || judul == null) {
				alert("Judul Buku must be filled out");
				return false;
				}
			
			if (trans == "" || trans == null) {
				alert("Jenis Transaksi must be filled out");
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
					  <a class="active" href="Transaksi.php">Transaksi</a>
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
				<table class="tablemid">
					<form name="TransactionForm" onsubmit="return ValidasiForm()"
					action="Transaksi_Proses.php" 
					method="POST" enctype="multipart/form-data" 
					required>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label style="color:black;">Email Peminjam : </label></td>
						<td class="col-sm-3"><input type="email" name="Email" placeholder="Email Peminjam"></br></td>
						<td class="col-sm-3"></td>
					<tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label style="color:black;">No HP Peminjam : </label></td>
						<td class="col-sm-3"><input type="text" name="Hp" placeholder="No Handphone Peminjam"></br></td>
						<td class="col-sm-3"></td>
					<tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label style="color:black;">Judul Buku : </label></td>
						<td class="col-sm-3"><input type="text" name="JudulB" placeholder="Judul Buku"></br></td>
						<td class="col-sm-3"></td>
					<tr>
					<tr>
						<td class="col-sm-3"></td>
						<td class="col-sm-3"><label style="color:black;">Jenis Transaksi : </label></td>
						<td class="col-sm-3"><select id="status" name="Transac">
											<option value="Pengambilan">Pengambilan</option>
											<option value="Pengembalian">Pengembalian</option>
											</select></br></td>
						<td class="col-sm-3"></td>
					<tr>
					<tr>
						<td class="col-sm-3">
							<input type="hidden" name="ids" value= "<?php echo $id_s ?>" >
							<input type="hidden" name="tgl" value= "<?php echo date("Y-m-d") ?>" >
						</td>
						<td class="col-sm-3">
							
							<input type="submit" value="Simpan" class="butsubmit"> 
							</td>
						<td class="col-sm-3" ><input type="button" onclick="Perpindahan()" value="Cancel" class="butcancel"></input></td>	
					
						<td class="col-sm-3"></td>
					<tr>
					</form>
				</table>
</body>
</html>