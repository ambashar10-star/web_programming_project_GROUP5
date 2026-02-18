<?php include 'header.php'; ?>

<h2 class="text-center">Place an Order</h2>

<form action="process.php" method="POST">
    <div class='form-floating'>
        <div class="row">
        <div class="col">
            <input type="number" name="table_number" class="form-control" placeholder="Table Number" min="1" required>
        <br>
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
        <br>
            <input type="number" name="quantity" class="form-control" placeholder="Quantity" min="1" required>
        <br>
            <button type="submit" name="submit" class="btn btn-primary">Create Order</button>
        </div>
        </div>
    </div>
</form>


<?php include 'footer.php'; ?>

