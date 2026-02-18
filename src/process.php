<?php
include 'header.php'; ?>

<?php

// Check if the 'submit' button in the form was clicked
if (isset($_POST['submit'])) {
    // Retrieve data from the form and store it in variables
    $table_number = $_POST['table_number'];     
    $dishname = $_POST['dish'];      
    $quantity = $_POST['quantity']; 

    // Include the database connection file
    include 'db.php';

    // Define an SQL query to insert data into the 'Oder_list' table
    $sql = "INSERT INTO  Order_list (table_number, dish, quantity)
            VALUES ('$table_number', '$dishname', '$quantity')";

    // Execute the SQL query using the database connection
    if ($conn->query($sql) === TRUE) {
        // If the query was successful, display a success message
        echo '<div class="alert alert-success text-center" >
        Order has been placed successfully! </div>';
        
    } else {
        // If there was an error in the query, display an error message
        echo '<div class="alert alert-danger text-center" >
        Error: Table Number is incorrect </div>';
    }

    // Close the database connection
    $conn->close();
}
else {
    // If accessed directly without form submission
    header("Location: create.php");
    exit;
}
?>
