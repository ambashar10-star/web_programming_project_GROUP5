<?php
include 'header.php';
include 'db.php';
?>
<h2 class="text-center mb-4">All Orders</h2>
<?php
$sql = "SELECT * FROM Order_list";

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'>
            <thead>
                <tr>
                    <th>Table Number</th>
                    <th>Dish</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>".$row['table_number']."</td>
            <td>".$row['dish']."</td>
            <td>".$row['quantity']."</td>
          </tr>";
    }
    echo "</tbody></table>"; 
}
    else {
          echo "No orders found";
        }
$conn->close();
?>
