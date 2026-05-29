<?php
session_start();
if (!isset($_SESSION['id'])) {
    echo '<script>window.location="index.php"</script>';
}

include 'db.php';

// Get the assign_id from the URL
if (isset($_GET['assign_id'])) {
    $assign_id = $_GET['assign_id'];

    // Update the status of the corresponding maintenance request to 'Completed'
    $query = "UPDATE maintenance m 
              INNER JOIN assign a ON m.id = a.maintenance_id 
              SET m.status = 'Completed' 
              WHERE a.assign_id = '$assign_id'";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Maintenance request marked as completed.');</script>";
        echo "<script>window.location = 'assigned_date.php';</script>"; // Redirect back to the list page
    } else {
        echo "<script>alert('Error marking maintenance request as completed.');</script>";
        echo "<script>window.location = 'assigned_date.php';</script>"; // Redirect back in case of an error
    }
} else {
    echo "<script>alert('Invalid request.');</script>";
    echo "<script>window.location = 'assigned_date.php';</script>";
}
?>
