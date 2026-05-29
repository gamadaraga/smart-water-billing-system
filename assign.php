<?php session_start(); ?>
<?php
include 'db.php';
//$user_id =$_REQUEST['id'];

$result = mysqli_query($conn,"SELECT * FROM technician") or die(mysqli_error($conn));

while($test = mysqli_fetch_array($result))
  {
  //$sessionname=$row['name'];
  $fname= $test['firstname'] ;					
  $mname= $test['middlename'] ;
  $lname= $test['lastname'] ;

  }
if (!$result) 
		{
		die("Error: Data not found..");
		}		
		//select requested by
        $id =$_REQUEST['id'];
        $sql = mysqli_query($conn,"SELECT * FROM maintenance WHERE id = '$id'") or die(mysqli_error($conn));

        while($row = mysqli_fetch_array($sql))
          {
          //$sessionname=$row['name'];
          $cname= $row['requested_by'] ;					
       
        
          }
        if (!$sql) 
                {
                die("Error: Data not found..");
                }
		

?>
<p><h2>Maintenance Assign Form</h2></p>
  <form method="post" action="assign_d.php">
<table width="420" border="0">
<tr>
    <td width="107"></td>
    <td width="315"><input type="hidden" name="id" value="<?php echo $id; ?>" /></td>
    
  </tr>
    <tr>
    <td>Technician Name:</td>
    <td>
    <select name="technician_name">
            <option value="">Select Technician</option>
            <option value="<?php echo $fname.' '.$mname.' '.$lname; ?>"><?php echo $fname.' '.$mname.' '.$lname; ?></option>
        </select>
    </td>
 
  </tr>
  <tr>
    <td>Assigned For:</td>
    <td>
    <select name="customer_name">
            <option value="">Select Customer</option>
            <option value="<?php echo $cname;?>"><?php echo $cname;?></option>
        </select>
    </td>
 
  </tr>
  <tr>
    <td>Assigned Date:</td>
    <td><input type="date" name="assign_date" value=""/></td>
    </tr>
 
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="Assign"  /></td>
	</tr>
</table>