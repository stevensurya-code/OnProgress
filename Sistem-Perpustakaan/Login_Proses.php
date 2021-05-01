<?php 
include "conn.php";
session_start();

if (isset($_POST['login'])) {
    try {
           $emailpost = $_POST['email'];
           $password = $_POST['password'];
		   
           $sql = "SELECT * FROM customer WHERE Email= ? and Password= ?";
           $stmt = $pdo->prepare($sql);
           $stmt->execute([$emailpost,$password]);
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
			$sql = "SELECT * FROM staff WHERE Email= ? and Password= ?";
			$stmt = $pdo->prepare($sql);
			$data = [
              $_POST['email'],
              $_POST['password']
			];
			$stmt->execute($data);
			$row = $stmt->fetch();
				$id = $row['ID_Staff'];
				$nama = $row['Nama'];
				$email = $row['Email'];
				$pass = $row['Password'];
				$status = $row['Status'];
				//status berfungsi menentukan admin atau staff
		   }
           
           if ($emailpost == $email && $password == $pass) 
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
                    window.location.href='/Sistem Perpustakaan/Login.php';
                }
                  </script>";
              }
        }    
        catch (PDOException $e) {
        $e->getMessage();
    }
}
?>
