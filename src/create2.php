<?php include 'header.php'; ?>

<div class="container mt-4">
    <h2 class="text-center">Create Reservation</h2>

    <?php
    if (isset($_GET['success'])) {
        echo "<div class='alert alert-success'>Reservation created successfully!</div>";
    }
    ?>

    <form action="process2.php" method="POST">

        <input type="text" name="customer_name" class="form-control mb-2" placeholder="Full Name" required>
        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
        <input type="text" name="phone" class="form-control mb-2" placeholder="Phone" required>
        <input type="date" name="reservation_date" class="form-control mb-2" required>
        <input type="time" name="reservation_time" class="form-control mb-2" required>
        <input type="number" name="number_of_guests" class="form-control mb-2" placeholder="Guests" required>
        <input type="number" name="table_number" class="form-control mb-2" placeholder="Table Number" required>

        <button type="submit" class="btn btn-primary">Create Reservation</button>
    </form>
</div>

<?php include 'footer.php'; ?>
