<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = $_POST['NIK'];
    $password = $_POST['Password'];

    $servername = "sql300.infinityfree.com";
    $username   = "if0_39932282";
    $dbpassword = "oOVqVZSZEv1h8a";
    $dbname     = "if0_39932282_LogIn";

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT Nama, NIK FROM login WHERE NIK = ? AND Password = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("SQL prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ss", $nik, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();

        $_SESSION['Nama'] = $row['Nama'];
        $_SESSION['NIK']  = $row['NIK'];

        header("Location: welcome.php");
        exit();
    } else {
        $error = "Error, NIK or Password invalid, try again.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
</head>
<body>
  <h2>Login</h2>

  <form method="POST" action="">
    <label for="NIK">NIK:</label>
    <input type="text" id="NIK" name="NIK" required><br><br>

    <label for="Password">Password:</label>
    <input type="password" id="Password" name="Password" required><br><br>

    <button type="submit">Login</button>
  </form>

  <?php if (!empty($error)): ?>
    <p style="color:red;"><?php echo $error; ?></p>
  <?php endif; ?>
</body>
</html>