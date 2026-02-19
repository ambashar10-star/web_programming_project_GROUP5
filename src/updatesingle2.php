<?php
include 'header.php';
include 'db.php';

$id=$_GET['id'];

$result=mysqli_query($conn,"SELECT * FROM reservations WHERE table_number='$id'");
$row=mysqli_fetch_array($result);
?>

<div class="container mt-4" style="max-width:600px;">
<h3>Edit Reservation</h3>

<form method="post">

<input class="form-control mb-2" name="customer_name" value="<?php echo $row['customer_name']; ?>" required>
<input class="form-control mb-2" name="email" value="<?php echo $row['email']; ?>" required>
<input class="form-control mb-2" name="phone" value="<?php echo $row['phone']; ?>" required>
<input class="form-control mb-2" type="date" name="reservation_date" value="<?php echo $row['reservation_date']; ?>" required>
<input class="form-control mb-2" type="time" name="reservation_time" value="<?php echo $row['reservation_time']; ?>" required>
<input class="form-control mb-2" name="number_of_guests" value="<?php echo $row['number_of_guests']; ?>" required>

<button class="btn btn-primary" name="submit">Update</button>

</form>
</div>

<?php
if(isset($_POST['submit'])){

mysqli_query($conn,"UPDATE reservations SET
customer_name='".$_POST['customer_name']."',
email='".$_POST['email']."',
phone='".$_POST['phone']."',
reservation_date='".$_POST['reservation_date']."',
reservation_time='".$_POST['reservation_time']."',
number_of_guests='".$_POST['number_of_guests']."'
WHERE table_number='$id'");

echo "<script>location='update2.php'</script>";
}

include 'footer.php';
?>
