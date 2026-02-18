<?php include 'header.php'; ?>
<h1 class="text-center">Place Your Order:</h1>
<form name="form" method="post" action="process.php">
    <div class='form-floating'>
         <div class="row">
            <div class="col">
                <label for="table_number" >Table Number:</label>
                <input type="number" class="form-control" name="table_number" min="1" required>
            <div class="col">
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
            <div class="col">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="" name="quantity" min="1" required>                    
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </div>
        </div>
    </div>
 </div>
</form>
<br>
<br>
<br>
<br>
<?php include 'footer.php'; ?>

