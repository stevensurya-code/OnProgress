<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="Assets/bootstrap.min.css">
		<link href="Assets/style.css" rel="stylesheet">
		<script>
			function Perpindahan(){
			  window.location.href = "SignUp.php";
			}
			function ValidasiForm() {
			var email = document.forms["LoginForm"]["email"].value;
			var pass = document.forms["LoginForm"]["password"].value;
			if (email == "" || email == null) {
				alert("Email Tidak Boleh Dikosongkan");
				return false;
				}
			if (pass == "" || pass == null) {
				alert("Password Tidak Boleh Dikosongkan");
				return false;
				}
			}
		</script>
	</head>
	
	<body id="login">
		<div class="container-fluid" id="login_form">
		<center>
				<h1>WEBSITE PERPUSTAKAAN</h1>
				<br>
				<br>
				<h2>LOGIN </h2>
				
				<div id="boxing">
					<br>
					<form name="LoginForm" method="POST" action="Login_Proses.php" onsubmit="return ValidasiForm()" required>
						<label >EMAIL : </label>
						<input type="email" name="email" placeholder="Email" autocomplete="off" size="34"></br>
						<label >PASSWORD : </label>
						<input type="password" name="password" placeholder="Password" size="29"></br></br>
						<input type="submit" id="but" name="login" value="SIGN IN"></input>
						<input type="button" id="but" onclick="Perpindahan()" value="SIGN UP"></input>
						<br>
						<br>
					</form>
				</div>			
		</center>
		<br>
		</div>
	</body>

</html>	