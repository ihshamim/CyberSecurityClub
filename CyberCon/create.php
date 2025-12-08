<?php
session_start();
require "config.php";
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO announcements (title, content) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();

    header("Location: view.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Create Announcement</title>
</head>
<body>

<h2>Create New Announcement</h2>

<form method="POST">
    <input type="text" name="title" placeholder="Title" required><br><br>
    <textarea name="content" placeholder="Content" required></textarea><br><br>
    <button type="submit">Create</button>
</form>

</body>
</html>
