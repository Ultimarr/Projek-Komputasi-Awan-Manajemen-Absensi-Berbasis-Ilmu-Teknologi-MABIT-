<?php
session_start();
if(!isset($_SESSION['Nama'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>
    <h1>Selamat Datang, <?php echo htmlspecialchars($_SESSION['Nama']); ?>!</h1>
    <p>NIK: <?php echo htmlspecialchars($_SESSION['NIK']); ?></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>