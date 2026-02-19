<?php
include 'header.php';
include 'db.php';
 
$a = $_GET['id'];
 
// Fetch order data
$result = mysqli_query($conn, "SELECT * FROM reviews WHERE review_id='$a'");
$row = mysqli_fetch_array($result);
?>
 
<h2 class="text-center">Update your review</h2>
<br>
 
<form name="form" method="post" action="process1.php">    
    <div class='form-floating'>
        <div class="row">
            <div class="col">
                <label for="table_number" >Table Number:</label>
                <input type="number" class="form-control" name="table_number" min="1" required>
            <div class="col">
                    <label for="rating">Rating (1-5):</label>
                    <select class="form-control" name="rating">
                        <option value="5">5 - Excellent</option>
                        <option value="4">4 - Very Good</option>
                        <option value="3">3 - Average</option>
                        <option value="2">2 - Poor</option>
                        <option value="1">1 - Terrible</option>
                    </select>
 
        <div class="col">            
            <label for="comment">Your Comment:</label>
            <textarea name="comment" id="comment" class="form-control" rows="4" placeholder="How was the food?"></textarea>
            <small id="charCount">0 / 200 characters</small>
    <br>
            <button type="submit" class="btn btn-primary" name="submit">Update Review</button>
        </div>
    </div>
</form>
 
<?php
// Handle Update
if (isset($_POST['submit'])) {
    $table_number = (int)$_POST['table_number'];
    $dish = mysqli_real_escape_string($conn, $_POST['rating']);
    $quantity = (int)$_POST['comment'];
 
    $query = mysqli_query($conn, "UPDATE reviews SET table_number='$table_number', rating='$rating', comment='$comment' WHERE review_id='$a'");
 
    if ($query) {
        echo "<h2>Review updated successfully!</h2>";
        echo "<a href='update1.php'>Check Updated Review List</a>";
    } else {
        echo "Record Not modified: " . mysqli_error($conn);
    }
}
 
// Handle Delete
if (isset($_POST['delete'])) {
    $query = mysqli_query($conn, "DELETE FROM reviews WHERE review_id='$a'");
    if ($query) {
        echo "<h2>Review deleted with id: $a</h2>";
 
    } else {
        echo "Record Not Deleted: " . mysqli_error($conn);
    }
}
 
$conn->close();
?>
