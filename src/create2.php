<?php
include 'header.php';
include 'db.php';

if(isset($_POST['submit'])){

$name=$_POST['customer_name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$table=$_POST['table_number'];
$date=$_POST['reservation_date'];
$time=$_POST['reservation_time'];
$guests=$_POST['number_of_guests'];

mysqli_query($conn,"INSERT INTO reservations
(customer_name,email,phone,table_number,reservation_date,reservation_time,number_of_guests)
VALUES('$name','$email','$phone','$table','$date','$time','$guests')");

echo "<div class='alert alert-success text-center'>Reservation created</div>";
}
?>

<div class="container mt-4" style="max-width:600px;">
<h2 class="text-center mb-4">Create Reservation</h2>

<form method="post">

<div class="mb-3">
<label class="form-label">Name</label>
<input type="text" name="customer_name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Phone</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Table Number</label>
<input type="number" name="table_number" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Date</label>
<input type="date" name="reservation_date" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Time</label>
<input type="time" name="reservation_time" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Number of Guests</label>
<input type="number" name="number_of_guests" class="form-control" required>
</div>

<button type="submit" name="submit" class="btn btn-primary w-100">Create Reservation</button>

</form>
</div>

<?php include 'footer.php'; ?>
