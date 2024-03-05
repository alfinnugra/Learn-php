<?php
session_start();
require '../connections/db.php';
$data = $_SESSION['data']['id'];
$successUpdate = '';
if(isset($_POST['reset-pass'])) {
  $oldpass = $_POST['old-pass'];
  $newpass = $_POST['new-pass'];
  $confrimpass = $_POST['confrim-pass'];

  $takeData = mysqli_query($connect, "SELECT * from users WHERE id = '$data'");
  if($takeData === false) {
    echo 'Error' . mysqli_error($connect);
  } else {
    if(mysqli_num_rows($takeData) > 0) {
      $row = mysqli_fetch_assoc($takeData);
      $hashedOldPass = $row['password']; 

      if(password_verify($oldpass, $hashedOldPass)) {
        if($newpass === $confrimpass) {
          $hashedNewPass = password_hash($newpass, PASSWORD_DEFAULT);
          $sendData = mysqli_query($connect, "UPDATE users SET password = '$hashedNewPass' WHERE id = '$data'");
          if($sendData) {
            echo 'Update Successfuly!';
          } else {
            echo 'Error updating' . mysqli_error($connect);
          }
        } else {
          echo 'Password dont match';
        }
      } else {
        echo 'Wrong old password';
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn - PHP | Reset Password
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      margin-top: 50px;
    }
    .nav-tabs {
      margin-bottom: 20px;
    }
    .tab-content {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .tab-pane {
      display: none;
    }
    .tab-pane.active {
      display: block;
    }
  </style>
</head>
<body>
<div class="container">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" id="tab1-tab" data-toggle="tab" href="./dashboard.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="tab2-tab" data-toggle="tab" href="./settings.php">Settings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" id="tab2-tab" data-toggle="tab" href="./account.php">Account</a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane active" id="tab2">
        <h2>Reset Passwords</h2>
        <div class="form-update">
        <span><?php if($successUpdate) {echo $successUpdate;} ?></span>
        <form method="POST">
            <div class="mb-3">
                <label for="old-password" class="form-label">Old Password </label>
                <input type="password" class="form-control" id="old-pass" name="old-pass" required>
            </div>
            <div class="mb-3">
                <label for="new-pass" class="form-label">New Password</label>
                <input type="password" class="form-control" id="new-pass" name="new-pass" required>
            </div>
            <div class="mb-3">
                <label for="confrim-pass" class="form-label">Confrim Password</label>
                <input type="password" class="form-control" id="confrim-pass" name="confrim-pass" required>
            </div>
            <button class="btn btn-primary" id="reset-pass" name="reset-pass">Update Password</button>
            <button class="btn btn-danger"><a href="../registrasion-login-page/logout.php" style="text-decoration:none; color:white;">Logout!</a></button>
        </form>
        </div>
      </div>
      <!-- Tambahkan tab-pane lainnya sesuai kebutuhan -->
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>