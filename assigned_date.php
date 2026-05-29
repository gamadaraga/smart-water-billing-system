<?php session_start();
if(!isset($_SESSION['id'])){
    echo '<script>window.location="index.php"</script>';
}
?>

<?php
$session = $_SESSION['id'];
include 'db.php';

// Get the technician name from the user table based on the session id
$result = mysqli_query($conn, "SELECT * FROM user WHERE id = '$session'");
while($row = mysqli_fetch_array($result)){
    $sessionname = $row['name'];
}
?>

<?php
include 'db.php';

// Fetch the maintenance requests assigned to the logged-in technician
$query = "SELECT m.topic, m.description, m.status, m.requested_by, a.technician_name, a.assigned_date, a.assign_id, a.assigned_for, a.assigned_date as assigndate
          FROM maintenance m
          INNER JOIN assign a ON m.id = a.maintenance_id
          WHERE a.technician_name = '$sessionname' AND m.status != 'Completed'";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Maintenance Requests</title>
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
    </style>
</head>

<body>
<div class="container">
    <div id="wrapper">
        <h1><center><b>Bule Hora City Online Water Billing System</b></center></h1>
        <div style="color:#F00; font-size:12px; margin-left:900px;"> 
            <span><?php echo $sessionname;?></span><a href="logout.php"><span class="btn btn-danger  glyphicon glyphicon-log-out">&nbsp;Logout</span></a>
        </div>
        <ul class="nav nav-pills">
            <li class="btn btn-default btn-xs"><a href="technician.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;Approve Maintenance</a></li>
            <li><a href="assigned_date.php"><span class="glyphicon glyphicon-list"></span>&nbsp;View Maintenance Assigned</a></li>
        </ul>
        <hr color="#999999" />
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <!-- Display maintenance assignments -->
                <?php
                if (mysqli_num_rows($result) > 0) {
                    echo "<table class=\"table\" bgcolor='#fff'>
                    <tr>
                    <th>Topic</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Requested By</th>
                    <th>Assigned Date</th>
           
                    <th>Actions</th>
                    </tr>";

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['topic'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>" . $row['requested_by'] . "</td>";
                        echo "<td>" . $row['assigned_date'] . "</td>";
                      

                        // Add action buttons (approve, etc.)
                        echo "<td><a href='approve_assignment.php?assign_id=" . $row['assign_id'] . "' class='btn btn-success'>Approve</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No maintenance requests assigned.";
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
