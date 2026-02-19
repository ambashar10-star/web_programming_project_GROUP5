<?php
require_once 'db.php';
 
/* ===== Only POST ===== */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: review.php");
    exit();
}
 
/* ===== Input ===== */
$table_number = (int)($_POST['table_number'] ?? 0);
$rating       = (int)($_POST['rating'] ?? 0);
$comment      = trim($_POST['comment'] ?? '');
 
/* ===== Validation ===== */
if ($table_number <= 0 || $rating <= 0 || $comment === '') {
    header("Location: review.php?error=fields");
    exit();
}
 
/* ===== Check table exists FIRST ===== */
$check = $conn->prepare(
    "SELECT COUNT(*) FROM reservations WHERE table_number = ?"
);
$check->bind_param("i", $table_number);
$check->execute();
$check->bind_result($count);
$check->fetch();
$check->close();
 
if ($count == 0) {
    header("Location: review.php?error=table");
    exit();
}
 
/* ===== Insert review (safe try) ===== */
$stmt = $conn->prepare(
    "INSERT INTO reviews (table_number, rating, comment)
     VALUES (?, ?, ?)"
);
 
$stmt->bind_param("iis", $table_number, $rating, $comment);
 
if (!$stmt->execute()) {
 
    /* If FK still fails, treat as incorrect table */
    if ($conn->errno == 1452) {
        header("Location: review.php?error=table");
    } else {
        error_log($stmt->error);
        header("Location: review.php?error=db");
    }
 
    exit();
}
 
$stmt->close();
$conn->close();
 
header("Location: review.php?success=1");
exit();
?>
 
