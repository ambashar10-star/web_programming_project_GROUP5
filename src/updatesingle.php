<?php
include 'header.php'; 
include 'db.php';

$a = $_GET['id'];

// Fetch order data
$result = mysqli_query($conn, "SELECT * FROM Order_list WHERE order_id='$a'");
$row = mysqli_fetch_array($result);
?>

<h2>Update your Order below:</h2>

<form name="form1" method="post" action="">
    <div class="row">
        <div class="col">
            <label for="dish">Table Number:</label>
            <input type="number" class="form-control" placeholder="Table Number" name="table_number" min="1" required value="<?php echo $row['table_number']; ?>">
                <label for="dish">Dish:</label>
                <select class="form-control" name="dish">
                    <option >Pizza</option>
                    <option >Salad</option>
                    <option >Cake</option>
                    <option >Grilled meat</option>
                    <option >Spaghetti</option>
                    <option >Battered Shrimp</option>
                    <option >Cheese Cake</option>
                    <option >Lava Cake</option>
                    <option >Mini Pancakes</option>
                    <option >Oreo Milkshake</option>
                    <option >Iced-Lemon Tea</option>
                    <option >Mango Mocktail</option>
                    <option >Extra Cheese</option>
                    <option >Extra Whipping Cream</option>
                </select>
            <label for="dish">Quantity:</label>
            <input type="number" class="form-control" placeholder="Quantity" name="quantity" min="1" required value="<?php echo $row['quantity']; ?>">
    <br>
            <button type="submit" class="btn btn-primary" name="submit">Update Order</button>
        </div>
    </div>
</form>

<?php
// Handle Update
if (isset($_POST['submit'])) {
    $table_number = (int)$_POST['table_number'];
    $dish = mysqli_real_escape_string($conn, $_POST['dish']);
    $quantity = (int)$_POST['quantity'];

    $query = mysqli_query($conn, "UPDATE Order_list SET table_number='$table_number', dish='$dish', quantity='$quantity' WHERE order_id='$a'");

    if ($query) {
        echo '<h3 class="text-center">Order updated successfully!</h3>';
        echo '<div class="text-center" >
        <a href="update.php">Check Updated List</a>
        </div>';
    } else {
        echo "Record Not modified: " . mysqli_error($conn);
    }
}

// Handle Delete
if (isset($_POST['delete'])) {
    $query = mysqli_query($conn, "DELETE FROM Order_list WHERE order_id='$a'");
    if ($query) {
        echo '<h3 class="text-center">Order deleted with id: $a</h3>';
        // Optional: redirect to orders page
        header("Location: orders.php");
    } else {
        echo "Record Not Deleted: " . mysqli_error($conn);
    }
}

$conn->close();
?>
