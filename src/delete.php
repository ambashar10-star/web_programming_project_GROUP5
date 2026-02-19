
<?php
include 'db.php';

// Get order ID from URL
$a = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM Order_list WHERE order_id = '$a'");
$row = mysqli_fetch_array($result);
?>
<html>
<head>
    <title>Delete Order</title>
</head>
<body>
<form name="form" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?></div>

<div class='form-floating'>
    <div class="row">
        <div class="col">
            <label for="table_number">Table Number:</label>
            <input type="number" class="form-control" name="table_number" min="1" value="<?php echo $row['table_number']; ?>" required>
        </div>
        <div class="col">
            <label for="dish">Dish:</label>
            <select name="dish" class="form-control" required>
                <option value="">Select Dish</option>
                <option value="Pizza">Pizza</option>
                <option value="Salad">Salad</option>
                <option value="Cake">Cake</option>
                <option value="Grilled meat">Grilled meat</option>
                <option value="Spaghetti">Spaghetti</option>
                <option value="Battered Shrimp">Battered Shrimp</option>
                <option value="Cheese Cake">Cheese Cake</option>
                <option value="Lava Cake">Lava Cake</option>
                <option value="Mini Pancakes">Mini Pancakes</option>
                <option value="Oreo Milkshake">Oreo Milkshake</option>
                <option value="Iced-Lemon Tea">Iced-Lemon Tea</option>
                <option value="Mango Mocktail">Mango Mocktail</option>
                <option value="Extra Cheese">Extra Cheese</option>
                <option value="Extra Whipping Cream">Extra Whipping Cream</option>
            </select>
        </div>
        <div class="col">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" name="quantity" min="1" value="<?php echo $row['quantity']; ?>" required>
        </div>
    </div>
</div>
<br>
<input type="submit" class="btn btn-danger" name="submit" value="Delete Order" onclick="return confirm('Are you sure?');">
</form>

<?php 
if(isset($_POST['submit'])){
    if($_POST['dish'] != $row['dish']){
        echo "Selected dish does not matches the actual order!";
    }
    else{
    $query = mysqli_query($conn,"DELETE FROM Order_list WHERE order_id='$a'");
    if($query){
        echo "Order Deleted with ID: $a <br>";
        echo "<a href='update.php'>Check Updated List</a>";
        
    } else {
        echo "Order Not Deleted";
    }
}
}

$conn->close();
?>
</body>
</html>
