<?php include 'header.php'; ?>
 
<?php
$messages = [
    "fields" => "All fields are required.",
    "table"  => "Incorrect table number.",
    "db"     => "Something went wrong. Try again."
];
 
if (isset($_GET['success'])) {
    echo "<div class='alert alert-success text-center my-3'>Thank you! Review submitted successfully.</div>";
}
 
if (isset($_GET['error']) && isset($messages[$_GET['error']])) {
    echo "<div class='alert alert-danger text-center my-3'>{$messages[$_GET['error']]}</div>";
}
?>
 
<h2 class="text-center my-4">Leave a Review</h2>
<p class="text-center mb-4">Tell us about your experience at Elite Dining.</p>
 
<div class="container">
    <div class="card p-4 shadow mx-auto" style="max-width: 500px;">
        <form method="post" action="process1.php">
           
            <!-- Table Number -->
            <div class="mb-3">
                <label for="table_number" class="form-label">Table Number</label>
                <input type="number" class="form-control" id="table_number" name="table_number" min="1" required>
            </div>
 
            <!-- Rating -->
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <select class="form-select w-100" id="rating" name="rating" required>
                    <option value="" disabled selected>Select your rating</option>
                    <option value="5">5 - Excellent</option>
                    <option value="4">4 - Very Good</option>
                    <option value="3">3 - Average</option>
                    <option value="2">2 - Poor</option>
                    <option value="1">1 - Terrible</option>
                </select>
            </div>
 
            <!-- Comment -->
            <div class="mb-3">
                <label for="comment" class="form-label">Your Comment</label>
                <textarea id="comment" name="comment" class="form-control" rows="4" placeholder="How was the food?" required></textarea>
            </div>
 
            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Submit Review</button>
            </div>
        </form>
    </div>
</div>
 
<?php include 'footer.php'; ?>
 
 
