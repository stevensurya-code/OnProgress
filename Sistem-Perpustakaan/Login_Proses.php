<?php 
include "conn.php";
session_start();

if (isset($_POST['login'])) {
    try {
           $emailpost = $_POST['email'];
           $passwordpost = $_POST['password'];
           $sql = "SELECT * FROM customer WHERE Email= ?";
           $stmt = $pdo->prepare($sql);
           $stmt->execute([$emailpost]);
           $row = $stmt->fetch();
		   if ($row != "" || $row != NULL){
			//login user
			   $id = $row['ID_Customer'];
			   $nama = $row['Nama'];
			   $email = $row['Email'];
			   $pass = $row['Password'];
			   $status ='';
		   } else{
			   //login staff
			$sql = "SELECT * FROM staff WHERE Email= ?";
			$stmt = $pdo->prepare($sql);
			$stmt->execute([$emailpost]);
			$row = $stmt->fetch();
				$id = $row['ID_Staff'];
				$nama = $row['Nama'];
				$email = $row['Email'];
				$pass = $row['Password'];
				$status = $row['Status'];
				//status berfungsi menentukan admin atau staff
		   }
			$verify = password_verify($passwordpost, $row['Password']);
			if ($verify == 1) 
             {
              $_SESSION['id']  = $id;
              $_SESSION['nama']  = $nama;
              $_SESSION['stat']  = $status;
                if($_SESSION['stat']==''){
                  //user
              	header("location:HomeCustomer.php");
              } else{
				  
                //admin dan staff
                header("location:HomeAdmin.php");
              }
              }	
              else {
                echo "<script>
                var r = confirm('Login anda Salah!');
                if (r == true) {
                    window.location.href='Login.php';
                }
                  </script>";
              }
        }    
        catch (PDOException $e) {
        $e->getMessage();
    }
}
?>
