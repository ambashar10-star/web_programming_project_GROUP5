<?php
$servername="localhost";
$username="bbcap25_1";
$password="0jHLbmcQ";
$dbname ="wp_bbcap25_1";
// creating connection 
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
    die("Connection failed: ".$conn->connect_error);
?>
