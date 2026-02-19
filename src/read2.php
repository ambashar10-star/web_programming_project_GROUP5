<?php
include 'header.php';
include 'db.php';
?>

<div class="container mt-4">
<h2 class="text-center mb-4">All Reservations</h2>

<?php
$sql = "SELECT * FROM reservations";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

echo "<table class='table table-bordered'>
<thead>
<tr>
<th>Table</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Date</th>
<th>Time</th>
<th>Guests</th>
</tr>
</thead><tbody>";

while ($row = $result->fetch_assoc()) {

echo "<tr>
<td>".$row['table_number']."</td>
<td>".$row['customer_name']."</td>
<td>".$row['email']."</td>
<td>".$row['phone']."</td>
<td>".$row['reservation_date']."</td>
<td>".$row['reservation_time']."</td>
<td>".$row['number_of_guests']."</td>
</tr>";
}

echo "</tbody></table>";

} else {
echo "No reservations found";
}

$conn->close();
?>
</div>

<?php include 'footer.php'; ?>

