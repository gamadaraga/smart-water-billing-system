<?php
 session_start();
 

include 'db.php';    
  
 $login = mysqli_query($conn,"SELECT * FROM user WHERE username = '" .$_POST['username'] . "' and password = '" .$_POST['password'] . "'");
 $row=mysqli_fetch_array($login);  
 $role =$row['user_role'];
 if($row){
	if($role=="Customer")
	{
		$_SESSION['id'] = $row['id'];

		echo '<script>windows: location="customer.php"</script>';	
	}
	elseif($role=="Admin")
	{
		$_SESSION['id'] = $row['id'];

		echo '<script>windows: location="billing.php"</script>';	
	}
	elseif($role=="Bill Officer")
	{
		$_SESSION['id'] = $row['id'];

		echo '<script>windows: location="officer_billing.php"</script>';	
	}
	elseif($role=="Technician")
	{
		$_SESSION['id'] = $row['id'];

		echo '<script>windows: location="technician.php"</script>';	
	}
	else{
		echo"Invalid user role";
	}
 }
	else {
		header ("location: index.php?err");
		}
 
 
?>
