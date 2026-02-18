<?php
include 'header.php';
require_once 'db.php';

$result = $conn->query("SELECT * FROM reservations ORDER BY reservation_date DESC");
?>

<div class="container mt-4">
    <h2 class="text-center">All Reservations</h2>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Time</th>
                <th>Guests</th>
                <th>Table</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['customer_name']); ?></td>
                <td><?= htmlspecialchars($row['email']); ?></td>
                <td><?= htmlspecialchars($row['reservation_date']); ?></td>
                <td><?= htmlspecialchars($row['reservation_time']); ?></td>
                <td><?= htmlspecialchars($row['number_of_guests']); ?></td>
                <td><?= htmlspecialchars($row['table_number']); ?></td>
                <td>
                    <a href="update2.php?id=<?= $row['table_number']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete2.php?id=<?= $row['table_number']; ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure?');">
                       Delete
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>

        </tbody>
    </table>
</div>

<?php
$conn->close();
include 'footer.php';
?>
