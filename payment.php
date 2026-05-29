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
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css"  href="css/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
<script type="text/javascript">
function addCommas(nStr){
 nStr += '';
 var x = nStr.split('.');
 var x1 = x[0];
 var x2 = x.length > 1 ? '.' + x[1] : '';
 var rgx = /(\d+)(\d{3})/;
 while (rgx.test(x1)) {
  x1 = x1.replace(rgx, '$1' + ',' + '$2');
 }
 return x1 + x2;
}

</script>
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script src="css/bootstrap/dist/js/jquery.js"></script>
<script src="css/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing System</title>
<style type="text/css">
#wrapper{
 width:100%;
 margin:0 auto;
 border:3px solid rgba(0,0,0,0);
-webkit-border-radius:5px;
-moz-border-radius:5px;
 border-radius:5px;
-webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
-moz-box-shadow:0 0 18px rgba(0,0,0,0.4);
 box-shadow:0 0 18px rgba(0,0,0,0.4);
 margin-top:2%;
 padding:10px;
 height:550px;
}
#header { width:900px; height:100px;}
table th {background:#999;}
#form {
width:400px;
float:left;
 border:3px solid rgba(0,0,0,0);
-webkit-border-radius:5px;
-moz-border-radius:5px;
 border-radius:5px;
-webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
-moz-box-shadow:0 0 18px rgba(0,0,0,0.4);
 box-shadow:0 0 18px rgba(0,0,0,0.4);
 margin-top:5%;
	
}
#ryt {
float:right;
 border:3px solid rgba(0,0,0,0);
-webkit-border-radius:5px;
-moz-border-radius:5px;
 border-radius:5px;
-webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
-moz-box-shadow:0 0 18px rgba(0,0,0,0.4);
 box-shadow:0 0 18px rgba(0,0,0,0.4);
 margin-top:5%;
}
#header ul li{
	list-style:none;
	float:left; margin-top:30px; margin-left:10px;}
</style>
</head>

<body>
<div class="container">
<div id="wrapper">
  <h1><center><b>Bule Hora City Online Water Billing System</b></center></h1>
  <div style="color:#F00; font-size:12px; margin-left:900px;"> 
  <span><?php echo $sessionname;?></span><a href="logout.php">   <span class="btn btn-danger  glyphicon glyphicon-log-out">&nbsp;Logout</span></a>
  </div>
  <ul class="nav nav-pills">
    <li class="btn btn-default btn-xs"><a href="customer.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
    <li><a href="customer_viewpayment.php"><span class="glyphicon glyphicon-ETB"></span>&nbsp;View Payment</a></li>
    <li><a href="request_maintenance.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Request Maintenance</a></li>
    <li><a href="view_assigned_date.php"><span class="glyphicon glyphicon-list"></span>&nbsp;View Maintenance Assigned Date</a></li>
  </ul>
<hr color="#999999" />
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <!-------- home panel ----------------------------->
      <h4>Welcome Dear, <?php echo $sessionname; ?></4>
      <hr color="#000000" />
      
      <div class="col-lg-12">
         <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title"><h2 style="font-size:24px; font-weight:bold;">Payment Details</h2></div>
            </div>
              <div class="panel-body">
              <?php

include 'db.php';

// Check if amount is received via POST
if (isset($_POST['amount']) && isset($_POST['fname']) && isset($_POST['lname'])) {
    $_SESSION['amount'] = $_POST['amount'];  // Store the amount
    $_SESSION['fname'] = $_POST['fname'];    // Store first name
    $_SESSION['lname'] = $_POST['lname'];    // Store last name

    $user_first_name = $_SESSION['fname'];
    $user_last_name = $_SESSION['lname'];
}

// Validate session data
if (!isset($_SESSION['amount'])) {
    die("Error: Amount not set. Please go back and generate the bill again.");
}

$user_id = $_SESSION['id']; // Logged-in user ID
$amount = $_SESSION['amount']; // Get amount from session
$user_first_name = $_SESSION['fname'];
$user_last_name = $_SESSION['lname'];
$user_name = $user_first_name . ' ' . $user_last_name;

// Generate a unique 6-digit payment code
$payment_code = rand(100000, 999999);

// Store payment details in DB
$conn->query("INSERT INTO payments (customer_id, payment_code, amount, status) 
              VALUES ('$user_id', '$payment_code', '$amount', 'Pending')");

// Save the payment code to session for the next steps
$_SESSION['payment_code'] = $payment_code;

?>


<p><strong>Payment Code:</strong> <?php echo $payment_code; ?></p>
<p><strong>Amount:</strong> <?php echo $amount; ?> ETB</p>
<a href="confirm_payment.php"  class="btn btn-success"><span class="glyphicon glyphicon-credit-card"></span>Complete Payment</a>


</div>
</div>
              </div>
             
         </div>
      </div>
    </div>
