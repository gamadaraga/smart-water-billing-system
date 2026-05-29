<?php
include 'db.php';
			 		$id=$_POST['id'] ;
					$role =$_POST['role'];
					$username= $_POST['username'] ;					
					$password=$_POST['password'] ;
					$name=$_POST['name'] ;
					
					
		 mysqli_query($conn,"INSERT INTO  user (id,username,password,name, user_role) 
		 VALUES ('$id','$username','$password','$name','$role')"); 
				
				echo '<script>alert("success")</script>';
				echo '<script>windows: location="user.php"</script>';
				
				