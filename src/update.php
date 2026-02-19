<?php
include 'db.php'; 
$sql = "SELECT * FROM Order_list";
$result = $conn->query($sql);
?>
<html>
<head>
    <style>
        a.top { margin-right:20px; font-size:20px; color:red; }
    </style>
<title  class="text-center">Update Data</title>
</head>
<body class="text-center">
    <a href="create.php" class="top">Create Data</a>
    <a href="update.php" class="top">Update/Delete Data</a>
    <a href="read.php" class="top">Retrieve Data</a>
<hr>
<table border="1" cellpadding="5">
<tr>
<th>table_number</th><th>dish</th>
<th>quantity</th><th>Edit</th>
<th>Delete</th>
</tr>
<?php 
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
?>
<tr>
<td><?php echo ($row["table_number"]); ?></td>
<td><?php echo ($row["dish"]); ?></td>
<td><?php echo ($row["quantity"]); ?></td>
<td><a href="updatesingle.php?id=<?php echo $row['order_id']; ?>" class="btn btn-warning btn-sm">Update</a></td>
<td><a href="delete.php?id=<?php echo $row['order_id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
</tr>
<?php 
    }
} else {
    echo "<tr><td colspan='5'>No results</td></tr>";
}
$conn->close();
?>
</table>
</body>
</html>

