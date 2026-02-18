<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $customer_name     = trim($_POST['customer_name']);
    $email             = trim($_POST['email']);
    $phone             = trim($_POST['phone']);
    $reservation_date  = $_POST['reservation_date'];
    $reservation_time  = $_POST['reservation_time'];
    $number_of_guests  = (int)$_POST['number_of_guests'];
    $table_number      = (int)$_POST['table_number'];

    // Validation
    if (
        empty($customer_name) ||
        empty($email) ||
        empty($phone) ||
        empty($reservation_date) ||
        empty($reservation_time) ||
        $number_of_guests <= 0 ||
        $table_number <= 0
    ) {
        header("Location: reservations.php?error=1");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: reservations.php?invalidemail=1");
        exit();
    }

    $stmt = $conn->prepare("
        INSERT INTO reservations
        (customer_name, email, phone, reservation_date, reservation_time, number_of_guests, table_number)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    if (!$stmt) {
        header("Location: reservations.php?dberror=1");
        exit();
    }

    $stmt->bind_param(
        "sssssii",
        $customer_name,
        $email,
        $phone,
        $reservation_date,
        $reservation_time,
        $number_of_guests,
        $table_number
    );

    if ($stmt->execute()) {
        header("Location: reservations.php?success=1");
    } else {
        header("Location: reservations.php?dberror=1");
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>
