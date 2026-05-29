
<?php
session_start();

if(!isset($_SESSION['id']))
{
	header("Location: index.php");
	exit();
}

include 'db.php';

$session = $_SESSION['id'];

/* FETCH LOGGED USER */
$result = mysqli_query($conn,"SELECT * FROM user WHERE id='$session'");
$row = mysqli_fetch_array($result);

$sessionname = $row['name'];

/* TOTAL USERS */
$results = mysqli_query($conn,"SELECT * FROM user");
$users = mysqli_num_rows($results);

/* TOTAL BILL */
$results = mysqli_query($conn,"SELECT * FROM bill");
$bill = mysqli_num_rows($results);

/* TOTAL CLIENT */
$jibu = mysqli_query($conn,"SELECT * FROM owners");
$client = mysqli_num_rows($jibu);

?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<title>Customer Dashboard - Water Billing System</title>

<link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.min.css">

<script src="css/bootstrap/dist/js/jquery.js"></script>
<script src="css/bootstrap/dist/js/bootstrap.min.js"></script>

<style>

body{
	background:#f4f6f9;
}

#wrapper{
	width:100%;
	margin:0 auto;
	background:white;
	padding:20px;
	margin-top:20px;
	border-radius:10px;
	box-shadow:0px 0px 10px rgba(0,0,0,0.2);
}

.dashboard-box{
	padding:20px;
	color:white;
	border-radius:8px;
	margin-bottom:20px;
	text-align:center;
}

.bg1{
	background:#17a2b8;
}

.bg2{
	background:#28a745;
}

.bg3{
	background:#dc3545;
}

.chat-box{
	height:350px;
	overflow-y:auto;
	border:1px solid #ccc;
	padding:15px;
	background:#f9f9f9;
	border-radius:5px;
}

.message{
	margin-bottom:15px;
}

.bot{
	color:blue;
	font-weight:bold;
}

.user{
	color:green;
	font-weight:bold;
}

.quick-btn{
	margin-right:5px;
	margin-top:5px;
}

</style>

</head>

<body>

<div class="container">

<div id="wrapper">
 <h1>  <img src="images/logo.png"
         width="120"
         height="120"><center><b>AI-POWERED SMART WATER BILLING SYSTEM</b></center></h1>

	<div class="text-right">
		Welcome:
		<b><?php echo $sessionname; ?></b>

		<a href="logout.php" class="btn btn-danger btn-sm">
			<span class="glyphicon glyphicon-log-out"></span>
			Logout
		</a>
	</div>

	<hr>

	<!-- MENU -->
	<ul class="nav nav-pills">

		<li >
			<a href="customer.php">
				<span class="glyphicon glyphicon-home"></span>
				Home
			</a>
		</li>

		<li>
			<a href="customer_viewpayment.php">
				<span class="glyphicon glyphicon-usd"></span>
				View Payment
			</a>
		</li>

		<li>
			<a href="request_maintenance.php">
				<span class="glyphicon glyphicon-wrench"></span>
				Request Maintenance
			</a>
		</li>

		<li>
			<a href="view_assigned_date.php">
				<span class="glyphicon glyphicon-calendar"></span>
				View Assigned Date
			</a>
		</li>
    <li class="active"><a href="chat_bot.php"><span class="glyphicon glyphicon-list"></span>&nbsp;Chat with Bot</a></li>
	</ul>

	<hr>

	<!-- DASHBOARD -->
	<div class="row">

		<div class="col-md-4">
			<div class="dashboard-box bg1">
				<h3><?php echo $users; ?></h3>
				<h4>Total Users</h4>
			</div>
		</div>

		<div class="col-md-4">
			<div class="dashboard-box bg2">
				<h3><?php echo $bill; ?></h3>
				<h4>Total Bills</h4>
			</div>
		</div>

		<div class="col-md-4">
			<div class="dashboard-box bg3">
				<h3><?php echo $client; ?></h3>
				<h4>Total Customers</h4>
			</div>
		</div>

	</div>

	<!-- WELCOME -->
	<div class="panel panel-primary">

		<div class="panel-heading">
			<h4>Customer Dashboard</h4>
		</div>

		<div class="panel-body">

			<h4>
				Welcome Dear,
				<b><?php echo $sessionname; ?></b>
			</h4>

			<p>
				Welcome to Smart Water Billing System.
			</p>

		</div>

	</div>

	<!-- CHATBOT -->
	<div class="panel panel-info">

		<div class="panel-heading">
			<h4>
				<span class="glyphicon glyphicon-comment"></span>
				Water Billing Chatbot Assistant
			</h4>
		</div>

		<div class="panel-body">

			<!-- CHAT AREA -->
			<div class="chat-box" id="chat-box">

				<div class="message">
					<span class="bot">Bot:</span>

					Hello
					<b><?php echo $sessionname; ?></b>
					👋

					<br><br>

					Welcome to Water Billing Support.

					<br><br>

					You can ask:

					<ul>
						<li>Check my bill</li>
						<li>Payment methods</li>
						<li>Water usage</li>
						<li>Report maintenance problem</li>
					</ul>

				</div>

			</div>

			<br>

			<!-- INPUT -->
			<div class="input-group">

				<input type="text"
					   id="userMessage"
					   class="form-control"
					   placeholder="Type your message here...">

				<span class="input-group-btn">

					<button class="btn btn-primary"
							onclick="sendMessage()">

						<span class="glyphicon glyphicon-send"></span>
						Send

					</button>

				</span>

			</div>

			<br>

			<!-- QUICK BUTTONS -->

			<button class="btn btn-info btn-sm quick-btn"
					onclick="quickMessage('Check my bill')">

				Check Bill

			</button>

			<button class="btn btn-success btn-sm quick-btn"
					onclick="quickMessage('Payment help')">

				Payment Help

			</button>

			<button class="btn btn-warning btn-sm quick-btn"
					onclick="quickMessage('Water usage')">

				Water Usage

			</button>

			<button class="btn btn-danger btn-sm quick-btn"
					onclick="quickMessage('Report problem')">

				Report Problem

			</button>

		</div>

	</div>

</div>

</div>

<!-- JAVASCRIPT -->

<script>

function appendMessage(sender, message, type)
{
	var chatBox = document.getElementById("chat-box");

	var div = document.createElement("div");

	div.classList.add("message");

	if(type == "bot")
	{
		div.innerHTML =
		'<span class="bot">'+sender+': </span>' + message;
	}
	else
	{
		div.innerHTML =
		'<span class="user">'+sender+': </span>' + message;
	}

	chatBox.appendChild(div);

	chatBox.scrollTop = chatBox.scrollHeight;
}

/* SEND MESSAGE */

function sendMessage()
{
	var input = document.getElementById("userMessage");

	var message = input.value;

	if(message.trim() == "")
	{
		return;
	}

	appendMessage("You", message, "user");

	input.value = "";

	setTimeout(function(){

		botReply(message);

	},700);
}

/* QUICK MESSAGE */

function quickMessage(text)
{
	appendMessage("You", text, "user");

	setTimeout(function(){

		botReply(text);

	},700);
}

/* BOT RESPONSE */

function botReply(message)
{
	message = message.toLowerCase();

	var response = "";

	if(message.includes("bill"))
	{
		response =
		"Your current unpaid bill is <b>ETB 1,250</b><br>" +
		"Due Date: <b>June 10, 2026</b>";
	}

	else if(message.includes("payment"))
	{
		response =
		"You can pay using:<br>" +
		"- Telebirr<br>" +
		"- CBE Birr<br>" +
		"- Cash Payment";
	}

	else if(message.includes("usage"))
	{
		response =
		"Your current month water usage is <b>28 cubic meters</b>.";
	}

	else if(message.includes("problem"))
	{
		response =
		"Please submit maintenance request through the maintenance page.";
	}

	else
	{
		response =
		"Sorry, I did not understand your request.";
	}

	appendMessage("Bot", response, "bot");
}

/* ENTER KEY */

document.getElementById("userMessage")
.addEventListener("keypress", function(event){

	if(event.key === "Enter")
	{
		sendMessage();
	}

});

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

