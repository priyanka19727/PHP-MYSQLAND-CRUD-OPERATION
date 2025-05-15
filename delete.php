<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'library';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$conn->query("DELETE FROM books WHERE id=$id");

header("Location: index.php");
exit();
?>
