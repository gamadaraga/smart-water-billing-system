<?php
include 'db.php';
$id =$_REQUEST['id'];
	
	$name = $_POST['technician_name'];
	$cname = $_POST['customer_name'];
	$assign_date = $_POST['assign_date'];
	

	mysqli_query($conn,"INSERT INTO `assign`(`technician_name`,`assigned_for`,`assigned_date`, `maintenance_id`) VALUES ('$name','$cname','$assign_date','$id')");
			

		 echo "<script>windows: location='assign_maintenance_request.php'</script>";				
			