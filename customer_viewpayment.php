<?php session_start();
if(!isset($_SESSION['id'])){
	echo '<script>windows: location="index.php"</script>';
	
	}
?>
<?php
include 'db.php';
//$id =$_REQUEST['id'];
$customer_id=$_SESSION['id'];
$result = mysqli_query($conn,"SELECT * FROM bill where id='$customer_id'");
while($row = mysqli_fetch_array($result))
  {
	  $prev=$row['prev'];
	  $owners_id=$row['owners_id'];
	  $pres=$row['pres'];
	  $price=$row['price'];
	  $totalcons=$pres - $prev;
	  $bill=$totalcons * $price;
	  $date=$row['date'];
 
  }

?>

<?php
  
include 'db.php';


$result = mysqli_query($conn,"SELECT * FROM owners WHERE id  = '$owners_id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$id=$test['id'] ;
				$lname= $test['lname'] ;					
				$fname=$test['fname'] ;
				$mi=$test['mi'] ;
				$address=$test['address'] ;
				$contact=$test['contact'] ;

?>
<html>
<head><title>Smart Utilities</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap-theme.min.css" />
<script>
function printDiv(data) {
      var printContents = document.getElementById('data').innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }
</script>
</head>
<body style=" background-size:cover; font-family:'Courier New', Courier;">
<style type="text/css">
#data { margin: 0 auto; width:700px; padding:20px; border:#066 thin ridge; height:600px; }

</style>
<div id="data">
<center>
 <h1>  <img src="images/logo.png"
         width="120"
         height="120"><center><b>AI-POWERED SMART WATER BILLING SYSTEM</b></center></h1>
<p>EWSM - OWSM</p>
<p><strong>Bill Invoice</strong></p>
<p>Phone: +251 (0) 9654 235</p>
<i style="text-align:right; margin-left:250px;">Date: <?php echo $date; ?></i>
</center>
<div id="context">
<table class="table table-striped table-bordered">
<tr><td>First Name</td><td><b><i><?php echo $fname; ?></td><td bordercolor="#000000">Meter Number</td><td><?php echo $mi; ?></td></tr>

<tr><td>Last Name:</td><td><b><i><?php echo $lname; ?></i></b></td><td>Customer ID</td><td><i>SMART/00<?php echo $id; ?></i></td> </tr>

<tr><td>Address: </td><td><b><i><?php echo $address; ?></td></tr>
<tr><td bordercolor="#000000">Contact: </td><td><b><i><?php echo $contact; ?></td></tr>
<tr><td bordercolor="#000000">Previous Reading :</td><td><b><i> <?php echo $prev;?> </td><td bordercolor="#000000">Present Reading : </td><td><b><i><?php echo $pres; ?> </td></tr>
<tr><td bordercolor="#000000">Consuption: </td><td><b><i><?php echo $totalcons;?> </td><td bordercolor="#000000">Price / unit : </td>
<td><b><i><?php echo $price; ?>&nbsp;ETB </td>
</tr>
<tr><td colspan="4"><center><h2>Total Invoice:<b><i> <?php echo $bill; ?><b><i> /= ETB</h2></center></td></tr>
<?php
$session=$_SESSION['id'];
include 'db.php';
$result = mysqli_query($conn,"SELECT * FROM user where id= '$session'");
while($row = mysqli_fetch_array($result))
  {
  $sessionname=$row['name'];

  }
?>
<tr><td>Casher:<?php echo $sessionname;?></td><td>Signature:_____________</td></tr>

 
</table>



</div>
</div>
<CENTER><button type="button"  class="btn btn-default " onclick="printDiv(data)"><span
class=" glyphicon glyphicon-print"></span>&nbsp;Print Bill</button>&nbsp;<a href="customer.php"><button class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Go back</button></a></CENTER>
<br><br>
<center>
<button type="button" class="btn btn-success" onclick="payNow()">
    <span class="glyphicon glyphicon-credit-card"></span> &nbsp; Pay Now
</button>
</center>

<script>
function payNow() {
    // Create the form to POST the data
    var form = document.createElement("form");
    form.method = "POST";
    form.action = "payment.php";
    
    // Hidden input for amount
    var amountField = document.createElement("input");
    amountField.type = "hidden";
    amountField.name = "amount";
    amountField.value = "<?php echo $bill; ?>";
    
    // Hidden inputs for first and last name
    var fnameField = document.createElement("input");
    fnameField.type = "hidden";
    fnameField.name = "fname";
    fnameField.value = "<?php echo $fname; ?>";

    var lnameField = document.createElement("input");
    lnameField.type = "hidden";
    lnameField.name = "lname";
    lnameField.value = "<?php echo $lname; ?>";
    
    // Append fields to the form
    form.appendChild(amountField);
    form.appendChild(fnameField);
    form.appendChild(lnameField);
    
    document.body.appendChild(form);
    form.submit();
}


</script>

<!-- FOOTER START -->
<footer style="
    background:#0d6efd;
    color:white;
    padding:15px;
    margin-top:30px;
    text-align:center;
    border-radius:5px;
">

    <h4 style="margin:0;">
        Smart Water Billing System
    </h4>

    <p style="margin:5px 0;">
        Efficient Water Management for Smart Cities
    </p>

    <p style="margin:5px 0;">
        © 2026 All Rights Reserved
    </p>

    <p style="margin:5px 0;">
        Developed By:
        <strong>GEMEDA RAGA</strong>
    </p>

</footer>
<!-- FOOTER END -->

</body>
</html>