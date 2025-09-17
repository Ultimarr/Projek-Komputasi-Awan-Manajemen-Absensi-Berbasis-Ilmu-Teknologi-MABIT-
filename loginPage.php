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
  <meta charset="UTF-8" />
  <title>Login</title>
  <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Arial, sans-serif;
      background: url("58549377-8704-4f0a-944f-add20ca57f41.png") no-repeat center center/cover;
      position: relative;
    }

    body::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(4px);
      z-index: -1;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      padding: 40px 30px;
      width: 350px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      color: #fff;
      text-align: center;
      position: relative;
      z-index: 1;
    }

    .login-box h2 {
      margin-bottom: 20px;
      font-size: 24px;
      font-weight: bold;
    }

    .input-group {
      position: relative;
      margin-bottom: 20px;
    }

    .input-group input {
      width: 100%;
      height: 45px;
      padding: 0 15px 0 40px;
      border: none;
      border-radius: 25px;
      outline: none;
      font-size: 14px;
      box-sizing: border-box;
    }

    .input-group i {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      color: #fff;
      font-size: 18px;
      pointer-events: none;
    }

    .options {
      display: flex;
      justify-content: space-between;
      font-size: 12px;
      margin-bottom: 20px;
    }

    .options a {
      color: #fff;
      text-decoration: none;
    }

    .btn {
      width: 100%;
      height: 45px;
      border: none;
      border-radius: 25px;
      background: linear-gradient(90deg, #8B4513, #A0522D);
      color: #fff;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn:hover {
      background: linear-gradient(90deg, #A0522D, #8B4513);
    }

    .register {
      margin-top: 15px;
      font-size: 12px;
    }

    .register a {
      color: #fff;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="login-box">
    <h2>Login to Your Account</h2>
    <form method="POST" action="">
      <div class="input-group">
        <input type="text" name="NIK" placeholder="NIK" required />
        <i class="fas fa-user"></i>
      </div>
      <div class="input-group">
        <input type="password" name="Password" placeholder="Password" required />
        <i class="fas fa-lock"></i>
      </div>
      <div class="options">
        <label><input type="checkbox" /> Remember me</label>
        <a href="#">Forgot Password?</a>
      </div>
      <button type="submit" class="btn">Login</button>
      <div class="register">
        Don’t have an account? <a href="#">Register</a>
      </div>
    </form>

    <?php if (!empty($error)): ?>
      <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

  </div>


</body>

</html>
