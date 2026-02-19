<?php 
include 'header.php';
include 'db.php';
 
/* ===== Check if review ID is provided ===== */
if(!isset($_GET['id'])){
    die("No review selected");
}
 
$id = $_GET['id'];
 
/* ===== Delete after confirmation ===== */
if(isset($_POST['confirm'])){
    // Use the correct primary key column name
    $stmt = $conn->prepare("DELETE FROM reviews WHERE review_id = ?");
    if(!$stmt){
        die("Prepare failed: " . $conn->error);
    }
 
    $stmt->bind_param("i", $id);
    $stmt->execute();
 
    echo "<div class='container mt-4'>";
    echo "<div class='alert alert-success'>Review deleted successfully.</div>";
    echo "<a href='update1.php' class='btn btn-primary mt-2'>See updated review list</a>";
    echo "</div>";
 
    $stmt->close();
    $conn->close();
    exit();
}
?>
 
<div class="container mt-4">
<h3>Delete Review</h3>
<p>Are you sure you want to delete review with ID <b><?php echo htmlspecialchars($id); ?></b>?</p>
 
    <form method="post">
<button type="submit" name="confirm" class="btn btn-danger">Yes, Delete</button>
<a href="update1.php" class="btn btn-secondary">Cancel</a>
</form>
</div>
