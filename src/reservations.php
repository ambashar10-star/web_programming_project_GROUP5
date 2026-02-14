<?php
include 'header.php';
include 'db.php';

$message = "";

// ============================== FORM SUBMISSION LOGIC ==============================
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize and collect data
    $customer_name     = trim($_POST['customer_name']);
    $email             = trim($_POST['email']);
    $phone             = trim($_POST['phone']);
    $reservation_date  = $_POST['reservation_date'];
    $reservation_time  = $_POST['reservation_time'];
    $number_of_guests  = (int)$_POST['number_of_guests'];
    $table_number      = (int)$_POST['table_number'];

    // Basic validation
    if (
        empty($customer_name) ||
        empty($email) ||
        empty($phone) ||
        empty($reservation_date) ||
        empty($reservation_time) ||
        $number_of_guests <= 0 ||
        $table_number <= 0
    ) {
        $message = "<p class='alert alert-danger'>All fields are required and must be valid.</p>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "<p class='alert alert-danger'>Invalid email format.</p>";
    } else {
        // Prepare statement to prevent SQL injection
        $stmt = $conn->prepare("
            INSERT INTO reservations 
            (customer_name, email, phone, reservation_date, reservation_time, number_of_guests, table_number)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");

        if ($stmt) {
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
                $message = "<p class='alert alert-success'>Reservation successfully created!</p>";
            } else {
                $message = "<p class='alert alert-danger'>Error: " . $stmt->error . "</p>";
            }

            $stmt->close();
        } else {
            $message = "<p class='alert alert-danger'>Database preparation failed: " . $conn->error . "</p>";
        }
    }
}

// Close connection
$conn->close();
?>

<!-- ============================== HTML FORM  ============================== -->
<div class="container" style="margin-top:20px;">
    <h2>Reserve a Table</h2>

    <?php
    if (!empty($message)) {
        echo $message;
    }
    ?>

    <form action="reservations.php" method="POST">
        <div class="form-group">
            <label for="customer_name">Full Name:</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="reservation_date">Date:</label>
            <input type="date" name="reservation_date" id="reservation_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="reservation_time">Time:</label>
            <input type="time" name="reservation_time" id="reservation_time" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="number_of_guests">Number of Guests:</label>
            <input type="number" name="number_of_guests" id="number_of_guests" class="form-control" min="1" required>
        </div>

        <div class="form-group">
            <label for="table_number">Table Number:</label>
            <input type="number" name="table_number" id="table_number" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Reserve Table</button>
    </form>
</div>

<?php include 'footer.php'; ?>
