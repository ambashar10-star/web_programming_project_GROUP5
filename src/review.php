<?php
include 'header.php';

if (isset($_GET['success'])) {
    echo "<div class='alert alert-success text-center'>Thank you! Review submitted successfully.</div>";
}
?>
    <h2 class="text-center">Leave a Review</h2>
    <p class="text-center">Tell us about your experience at Elite Dining.</p>
<form name="form1" method="post" action="process1.php">    
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
        <button type="submit" class="btn btn-primary">Submit Review</button>

    </div>
        </div>
        </div>
    </div>
        </div>
    </form>






<?php include 'footer.php'; ?>
