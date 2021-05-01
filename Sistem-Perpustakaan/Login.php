<html>
	<head>
	
		<title>Login</title>
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
			  window.location.href = "SignUp.php";
			}
			function ValidasiForm() {
			var email = document.forms["LoginForm"]["email"].value;
			var pass = document.forms["LoginForm"]["password"].value;
			if (email == "" || email == null) {
				alert("Email must be filled out");
				return false;
				}
			if (pass == "" || pass == null) {
				alert("Password must be filled out");
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
				<div style="font-size: 24px; color:black; font-size:50px;"><span>PERPUSTAKAAN </span></div>
				</br>
				</br>
				<p style="color:black; font-size:30px;">LOGIN </p>
				
				<div style="outline-style: solid; width:500px;">
					</br>
					
					<form name="LoginForm" method="POST" action="Login_Proses.php" onsubmit="return ValidasiForm()" required>
						<label style="color:black;">EMAIL : </label>
						<input type="email" name="email" placeholder="Email" autocomplete="off" size="34"></br>
						<label style="color:black;">PASSWORD : </label>
						<input type="password" name="password" placeholder="Password" size="30"></br></br>
						<input type="submit" name="login" value="SIGN IN"></input>
						<input type="button" onclick="Perpindahan()" value="SIGN UP"></input>
						<br>
						<br>
					</form>					
			</div>
		</center>
		
	</body>

</html>	