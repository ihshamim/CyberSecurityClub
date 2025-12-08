<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body>

<h2>Welcome, <?php echo $_SESSION['admin']; ?></h2>
<a href="create.php">➕ Add Announcement</a> |
<a href="view.php">📄 View All</a> |
<a href="logout.php">Logout</a>

</body>
</html>
