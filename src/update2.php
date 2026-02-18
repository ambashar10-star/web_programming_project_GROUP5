<?php
require_once 'db.php';
include 'header.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<div class='alert alert-danger'>Invalid reservation ID.</div>";
    include 'footer.php';
    exit();
}

$id = (int)$_GET['id'];

/* HANDLE UPDATE */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $stmt = $conn->prepare("
        UPDATE reservations
        SET customer_name=?, email=?, phone=?, reservation_date=?, reservation_time=?, number_of_guests=?
        WHERE table_number=?
    ");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param(
        "sssssiii",
        $_POST['customer_name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['reservation_date'],
        $_POST['reservation_time'],
        $_POST['number_of_guests'],
        $_POST['table_number'],
        $id
    );

    $stmt->execute();
    $stmt->close();

    header("Location: read2.php");
    exit();
}

/* FETCH RECORD */
$stmt = $conn->prepare("SELECT * FROM reservations WHERE table_number=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<div class='alert alert-danger'>Reservation not found.</div>";
    include 'footer.php';
    exit();
}

$reservation = $result->fetch_assoc();
$stmt->close();
?>

<div class="container mt-4">
    <h2>Edit Reservation</h2>

    <form method="POST">

        <input type="text" name="customer_name" class="form-control mb-2"
            value="<?= htmlspecialchars($reservation['customer_name']); ?>" required>

        <input type="email" name="email" class="form-control mb-2"
            value="<?= htmlspecialchars($reservation['email']); ?>" required>

        <input type="text" name="phone" class="form-control mb-2"
            value="<?= htmlspecialchars($reservation['phone']); ?>" required>

        <input type="date" name="reservation_date" class="form-control mb-2"
            value="<?= $reservation['reservation_date']; ?>" required>

        <input type="time" name="reservation_time" class="form-control mb-2"
            value="<?= $reservation['reservation_time']; ?>" required>

        <input type="number" name="number_of_guests" class="form-control mb-2"
            value="<?= $reservation['number_of_guests']; ?>" required>

        <input type="number" name="table_number" class="form-control mb-2"
            value="<?= $reservation['table_number']; ?>" required>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="read2.php" class="btn btn-secondary">Cancel</a>

    </form>
</div>

<?php
$conn->close();
include 'footer.php';
?>
