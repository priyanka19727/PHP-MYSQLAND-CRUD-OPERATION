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
$result = $conn->query("SELECT * FROM books WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    $sql = "UPDATE books SET title=?, author=?, genre=?, year=?, description=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssisi", $title, $author, $genre, $year, $description, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h2>Edit Book</h2>
    <form method="post">
        <label>Book Title:</label>
        <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required><br>
        <label>Author Name:</label>
        <input type="text" name="author" value="<?= htmlspecialchars($row['author']) ?>" required><br>
        <label>Genre:</label>
        <input type="text" name="genre" value="<?= htmlspecialchars($row['genre']) ?>" required><br>
        <label>Published Year:</label>
        <input type="number" name="year" value="<?= htmlspecialchars($row['year']) ?>" required><br>
        <label>Description:</label>
        <textarea name="description" rows="4" required><?= htmlspecialchars($row['description']) ?></textarea><br>
        <input type="submit" value="Update Book">
    </form>
    <a href="index.php">Back to Library</a>
</body>
</html>
