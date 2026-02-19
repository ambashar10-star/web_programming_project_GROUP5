<?php
include 'header.php';
include 'db.php';
$sql = "SELECT * FROM reviews";
$result = $conn->query($sql);
?>
<html>
<head>
    <style>
        a.top { margin-right:20px; font-size:20px; color:red; }
    </style>
<title>Update Data</title>
</head>
<body class="text-center">
    <a href="create1.php" class="top">Create Data</a>
    <a href="update1.php" class="top">Update/Delete Data</a>
    <a href="read1.php" class="top">Retrieve Data</a>
<hr>
<table class="table table-bordered">
<tr>
<th>Table Number</th><th>Rating (1-5)</th>
<th>Your Comment</th><th>Update</th>
<th>Delete</th>
</tr>
<?php
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
?>
<tr>
<td><?php echo ($row["table_number"]); ?></td>
<td><?php echo ($row["rating"]); ?></td>
<td><?php echo ($row["comment"]); ?></td>
<td><a href="updatesingle1.php?id=<?php echo $row['review_id']; ?>" class="btn btn-warning btn-sm">Update</a></td>
<td><a href="delete1.php?id=<?php echo $row['review_id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
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
 
