<?php session_start();
if(!isset($_SESSION['id'])){
	echo '<script>windows: location="index.php"</script>';

	
	}
		
?>
<?php
$session=$_SESSION['id'];
include 'db.php';
$result = mysqli_query($conn,"SELECT * FROM user where id= '$session'");
while($row = mysqli_fetch_array($result))
  {
  $sessionname=$row['name'];

  }
  

include 'db.php';
			 	
					$topic= $_POST['topic'] ;					
				
					$desc=$_POST['desc'] ;
					
					
		 mysqli_query($conn,"INSERT INTO `maintenance` (`topic`, `description`, `requested_by`) VALUES ('$topic', '$desc','$sessionname');"); 
				
				echo '<script>alert("success")</script>';
				echo '<script>windows: location="customer.php"</script>';
				
				