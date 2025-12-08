<?php
session_start();
require "config.php";
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM announcements WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE announcements SET title=?, content=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $title, $content, $id);
    $stmt->execute();

    header("Location: view.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Announcement</title></head>
<body>

<h2>Edit Announcement</h2>

<form method="POST">
    <input type="text" name="title" value="<?= $row['title'] ?>" required><br><br>
    <textarea name="content" required><?= $row['content'] ?></textarea><br><br>
    <button type="submit">Update</button>
</form>

</body>
</html>
