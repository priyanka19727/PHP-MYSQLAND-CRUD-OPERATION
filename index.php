<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'library';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM books");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>📚 Library Book List</h2>

    <div style="text-align:center;">
        <a href="create.php" style="padding: 10px 20px; background-color: #28a745; color: white; border-radius: 5px;">➕ Add New Book</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>📖 Title</th>
                <th>✍️ Author</th>
                <th>🏷 Genre</th>
                <th>📅 Year</th>
                <th>📝 Description</th>
                <th>⚙️ Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= htmlspecialchars($row['author']) ?></td>
                    <td><?= htmlspecialchars($row['genre']) ?></td>
                    <td><?= htmlspecialchars($row['year']) ?></td>
                    <td><?= htmlspecialchars($row['description']) ?></td>
                    <td class="actions">
                        <a href="edit.php?id=<?= $row['id'] ?>">✏️ Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this book?')">🗑 Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6" style="text-align:center;">No books found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
