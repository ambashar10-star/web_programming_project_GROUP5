<?php
include 'header.php';
include 'db.php';
 
/* ===== Handle form submission ===== */
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $table_number = (int)$_POST['table_number'];
    $rating       = (int)$_POST['rating'];
    $comment      = trim($_POST['comment']);
 
    // Simple validation
    if ($table_number <= 0 || $rating < 1 || $rating > 5 || empty($comment) || strlen($comment) > 200) {
        die("Invalid input.");
    }
 
    $stmt = $conn->prepare("INSERT INTO reviews (table_number, rating, comment) VALUES (?, ?, ?)");
    if(!$stmt){
        die("Prepare failed: " . $conn->error);
    }
 
    $stmt->bind_param("iis", $table_number, $rating, $comment);
 
    if ($stmt->execute()) {
        header("Location: review.php?success=1");
        exit();
    } else {
        die("Database error: " . $stmt->error);
    }
 
    $stmt->close();
    $conn->close();
}
?>
 
<!DOCTYPE html>
<html>
<head>
<title>Add Review</title>

</head>
<body>
<div class="container mt-4" style="max-width: 500px;">
<h2 class="mb-4 text-center">Add Review</h2>
<form method="post">
<div class="mb-3">
<label for="table_number" class="form-label">Table Number</label>
<input type="number" class="form-control" id="table_number" name="table_number" min="1" required>
</div>
 
        <div class="mb-3">
<label for="rating" class="form-label">Rating</label>
<select class="form-select" id="rating" name="rating" required>
<option value="" disabled selected>Select rating</option>
<option value="5">5 - Excellent</option>
<option value="4">4 - Very Good</option>
<option value="3">3 - Average</option>
<option value="2">2 - Poor</option>
<option value="1">1 - Terrible</option>
</select>
</div>
 
        <div class="mb-3">
<label for="comment" class="form-label">Comment</label>
<textarea id="comment" name="comment" class="form-control" rows="4" maxlength="200" required></textarea>
</div>
 
        <div class="d-grid">
<button type="submit" class="btn btn-primary">Submit Review</button>
</div>
</form>
</div>
</body>
</html>
