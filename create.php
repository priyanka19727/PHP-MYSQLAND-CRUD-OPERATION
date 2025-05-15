<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'library';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    $sql = "INSERT INTO books (title, author, genre, year, description) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssis", $title, $author, $genre, $year, $description);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Book</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h2>Add New Book</h2>
    <form method="post">
        <label>Book Title:</label>
        <input type="text" name="title" required><br>
        <label>Author Name:</label>
        <input type="text" name="author" required><br>
        <label>Genre:</label>
        <input type="text" name="genre" required><br>
        <label>Published Year:</label>
        <input type="number" name="year" required><br>
        <label>Description:</label>
        <textarea name="description" rows="4" required></textarea><br>
        <input type="submit" value="Add Book">
    </form>
    <a href="index.php">Back to Library</a>
</body>
</html>
