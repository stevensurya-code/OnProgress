<html>
	<head>
	
		<title>Sign Up</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="Assets/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css.css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
		<!-- <script src="jquery-3.3.1.min.js"></script>
		<script src="Bootstrap/js/bootstrap.min.js"></script> -->
		<script>
		function Perpindahan(){
			  //alert('this one works too!'); 
			  window.location.href = "Login.php";
			}
		function ValidasiForm() {
			var nama = document.forms["signup_form"]["nama"].value;
			var email = document.forms["signup_form"]["email"].value;
			var pass = document.forms["signup_form"]["password"].value;
			var hp = document.forms["signup_form"]["hp"].value;
			var alamat = document.forms["signup_form"]["alamat"].value;
			if (nama == "" || nama == null || email == "" || email == null || pass == "" || pass == null || hp == "" || hp == null || alamat == "" || alamat == null) {
				alert("Semua Kolom must be filled out");
				return false;
				}
			}
		</script>
	</head>
	
	<body style="background-color:Aqua;">
	
		<div class="container-fluid">
		<br>
			<center>
			<div style="padding-top: 10px; margin: 10px;">
			<font face="Comic Sans MS" >
				<div style="font-size: 24px; color:black; font-size:50px;"><span>  PERPUSTAKAAN </span></div>
				</br>
				</br>
				<p style="color:black; font-size:30px;">SIGN UP </p>
				
				<div style="outline-style: solid; width:500px;">
					</br>
					<form name="signup_form" method="POST" action="SignUp_Proses.php" onsubmit="return ValidasiForm()" required>
						<label style="color:black;">Nama : </label>
						<input type="text" name="nama" placeholder="Nama" autocomplete="off" size="35"></br>
						<label style="color:black;">EMAIL : </label>
						<input type="email" name="email" placeholder="Email" autocomplete="off" size="34"></br>
						<label style="color:black;">PASSWORD : </label>
						<input type="password" name="password" placeholder="Password" size="30"></br>
						<label style="color:black;">No Handphone : </label>
						<input type="text" name="hp" placeholder="No Handphone" autocomplete="off" size="29"></br>
						<label style="color:black;">Alamat : </label>
						<input type="text" name="alamat" placeholder="Alamat" autocomplete="off" size="34"></br></br>
						<input type="submit" name="signup" value="SIGN UP"></input>
						<input type="button" onclick="Perpindahan()" value="CANCEL"></input>
						<br>
						<br>
					</form>					
			</div>
		</center>
		
	</body>

</html>	