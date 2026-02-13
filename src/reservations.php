<?php
    include 'header.php';
    include 'db.php';

    $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Sanitize and collect data
        $customer_name     = trim($_POST['customer_name']);
        $email             = trim($_POST['email']);
        $phone             = trim($_POST['phone']);
        $reservation_date  = $_POST['reservation_date'];
        $reservation_time  = $_POST['reservation_time'];
        $number_of_guests  = (int)$_POST['number_of_guests'];
        $table_number      = (int)$_POST['table_number'];

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


            $stmt = $conn->prepare("
                INSERT INTO reservations 
                (customer_name, email, phone, reservation_date, reservation_time, number_of_guests, table_number)
                VALUES (?, ?, ?, ?, ?, ?, ?)
            ");

            if ($stmt) {

                // 5 strings + 2 integers
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
                $message = "<p class='alert alert-danger'>Database preparation failed.</p>";
            }
        }
    }

    if (!empty($message)) {
        echo "<div class='container' style='margin-top:20px;'>$message</div>";
    }

    $conn->close();

    include 'footer.php';
?>
