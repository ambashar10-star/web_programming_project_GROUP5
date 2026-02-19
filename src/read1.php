<?php
include 'header.php';
include 'db.php';
 
$sql = "SELECT * FROM reviews ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
 
<h2 class="text-center mb-4">All Reviews</h2>
<table class='table table-bordered'>
<tr>
    <th>Table Number</th>
    <th>Rating</th>
    <th>Comment</th>
    <th>Created At</th>
</tr>
 
<?php if($result && $result->num_rows > 0): ?>
    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['table_number']) ?></td>
            <td><?= htmlspecialchars($row['rating']) ?></td>
            <td><?= htmlspecialchars($row['comment']) ?></td>
            <td><?= htmlspecialchars($row['created_at']) ?></td>
           
        </tr>
    <?php endwhile; ?>
<?php else: ?>
    <tr><td colspan="6">No reviews yet.</td></tr>
<?php endif; ?>
</table>
<?php $conn->close(); ?>
