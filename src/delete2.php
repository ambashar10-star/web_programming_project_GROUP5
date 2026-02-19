<?php
include 'header.php';
include 'db.php';

if(!isset($_GET['id'])){
die("No reservation selected");
}

$id = $_GET['id'];

/* DELETE AFTER CONFIRM */
if(isset($_POST['confirm'])){

mysqli_query($conn,"DELETE FROM reservations WHERE table_number='$id'");

echo "<div class='container mt-4'>";
echo "<div class='alert alert-success'>Reservation deleted successfully.</div>";
echo "<a href='update2.php' class='btn btn-primary'>See updated reservation list</a>";
echo "</div>";


$conn->close();
exit();
}
?>

<div class="container mt-4">
<h3>Delete Reservation</h3>

<p>Are you sure you want to delete reservation for table <b><?php echo $id; ?></b>?</p>

<form method="post">
<button type="submit" name="confirm" class="btn btn-danger">Yes, Delete</button>
<a href="update2.php" class="btn btn-secondary">Cancel</a>
</form>
</div>


