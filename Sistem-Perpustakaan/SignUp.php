<!DOCTYPE html>
<html>
	<head>
	
		<title>Sign Up</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="Assets/bootstrap.min.css">
		<link href="Assets/style.css" rel="stylesheet">
		<script>
		function Perpindahan(){
			  window.location.href = "Login.php";
			}
		function ValidasiForm() {
			var nama = document.forms["signup_form"]["nama"].value;
			var email = document.forms["signup_form"]["email"].value;
			var pass = document.forms["signup_form"]["password"].value;
			var hp = document.forms["signup_form"]["hp"].value;
			var alamat = document.forms["signup_form"]["alamat"].value;
			
			if (nama == "" || nama == null ){
				alert("Nama Tidak Bolek Dikosongkan");
				return false;
			}
			if (email == "" || email == null) {
				alert("Email Tidak Bolek Dikosongkan");
				return false;
				}
			if (pass == "" || pass == null) {
				alert("Password Tidak Bolek Dikosongkan");
				return false;
				}
			if (hp == "" || hp == null) {
				alert("No Handphone Tidak Bolek Dikosongkan");
				return false;
			}
			if (alamat == "" || alamat == null) {
				alert("Alamat Tidak boleh Dikosongkan");
				return false;
			}
		}
		</script>
	</head>
	
	<body id="login">
	
		<div class="container-fluid" id="sign_form">
			<center>
			<font face="Comic Sans MS" >
				<h1>PERPUSTAKAAN</h1>
				</br>
				</br>
				<h2>SIGN UP </h2>
				
				<div id="boxing">
					</br>
					<form name="signup_form" method="POST" action="SignUp_Proses.php" onsubmit="return ValidasiForm()" required>
						<label >Nama : </label>
						<input type="text" name="nama" placeholder="Nama" autocomplete="off" size="36"></br>
						<label >EMAIL : </label>
						<input type="email" name="email" placeholder="Email" autocomplete="off" size="35"></br>
						<label >PASSWORD : </label>
						<input type="password" name="password" placeholder="Password" size="30"></br>
						<label >No Handphone : </label>
						<input type="text" name="hp" placeholder="No Handphone" autocomplete="off" size="27"></br>
						<label >Alamat : </label>
						<input type="text" name="alamat" placeholder="Alamat" autocomplete="off" size="35"></br></br>
						<input type="submit" id="but" name="signup" value="SIGN UP"></input>
						<input type="button" id="but" onclick="Perpindahan()" value="CANCEL"></input>
						<br>
						<br>
					</form>					
				</div>
			</font>
		</center>
		<br>
		</div>
	</body>

</html>	