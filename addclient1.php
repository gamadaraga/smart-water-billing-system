<?php
if (isset($_POST['add']))
	{	   


include 'db.php';
			 		
					$lname= $_POST['lname'] ;					
					$fname=$_POST['fname'] ;
					$uname= $_POST['uname'] ;					
					$pass=$_POST['pass'] ;
					$role=$_POST['role'] ;
					$mi=$_POST['mi'] ;
					$address=$_POST['address'] ;
					$contact=$_POST['contact'] ;
					$meterReader = $_POST['meterReader'];
					
		$reg_customer = mysqli_query($conn,"INSERT INTO  owners (lname,fname,mi,address,contact) 
		 VALUES ('$lname','$fname','$mi','$address','$contact')"); 
		 mysqli_query($conn,"INSERT INTO  tempo_bill (Client,Prev)
		 VALUES ('$fname','$meterReader')");
		 $add_to_user =  mysqli_query($conn,"INSERT INTO `user`(`username`, `password`, `name`, `user_role`) 
		 VALUES ('$uname','$pass','$fname','$role')") or die(mysqli_error()); 
				
				header("Location: clients.php");
				
				
				
	        }
	
?>