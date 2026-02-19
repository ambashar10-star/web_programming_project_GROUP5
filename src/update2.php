<?php
include 'header.php';
include 'db.php';

$sql="SELECT * FROM reservations";
$result=$conn->query($sql);
?>

<div class="container mt-4">
<h2 class="mb-3">Manage Reservations</h2>

<table class="table table-bordered">
<tr>
<th>Table</th>
<th>Name</th>
<th>Date</th>
<th>Edit</th>
<th>Delete</th>
</tr>

<?php
while($row=$result->fetch_assoc()){
echo "<tr>
<td>".$row['table_number']."</td>
<td>".$row['customer_name']."</td>
<td>".$row['reservation_date']."</td>
<td><a href='updatesingle2.php?id=".$row['table_number']."' class='btn btn-warning btn-sm'>Edit</a></td>
<td><a href='delete2.php?id=".$row['table_number']."' class='btn btn-danger btn-sm'>Delete</a></td>
</tr>";
}
?>

</table>
</div>

<?php include 'footer.php'; ?>
