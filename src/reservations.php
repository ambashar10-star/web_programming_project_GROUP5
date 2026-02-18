<?php
include 'header.php';

if (isset($_GET['success'])) {
    echo "<div class='alert alert-success text-center'>Reservation successfully created!</div>";
}

if (isset($_GET['error'])) {
    echo "<div class='alert alert-danger text-center'>All fields are required.</div>";
}

if (isset($_GET['invalidemail'])) {
    echo "<div class='alert alert-danger text-center'>Invalid email format.</div>";
}

if (isset($_GET['dberror'])) {
    echo "<div class='alert alert-danger text-center'>Database error occurred.</div>";
}
?>
<!-- ============================== HTML FORM  ============================== -->
<div class="container" style="margin-top:20px;">
    <h2 class="text-center">Reserve a Table</h2>

    <?php
    if (!empty($message)) {
        echo $message;
    }
    ?>

    <form action="process2.php" method="POST">
        <div class='form-floating'>
        <div class="row">
            <div class="col">
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
</div>
</div>
</div>
    </form>
</div>
<?php include 'footer.php'; ?>
