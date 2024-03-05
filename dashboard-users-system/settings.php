<?php
session_start();
require '../connections/db.php';
$data = $_SESSION['data']['id'];
$successUpdate = '';
if(isset($_POST['update-data'])) {
    $usernamedata = $_POST['username'];
    $email = $_POST['email'];
    $location = $_POST['location'];
        
    $updateData = mysqli_query($connect, "UPDATE users SET `username` = '$usernamedata', `email` = '$email', `location` = '$location' WHERE id = '$data'");
    if($updateData === false) {
        echo 'Error' . mysqli_error($connect);
    } else {
        $successUpdate = '<div style="backround-color: crimson; padding: 5px; color: white; border-radius:5px;">Updates Success!</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn - PHP | Dashboard</title>
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
        <a class="nav-link active" id="tab2-tab" data-toggle="tab" href="./settings.php">Settings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="tab2-tab" data-toggle="tab" href="./reset-pass.php">Account</a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane active" id="tab2">
        <h2>Setting Profile</h2>
        <div class="form-update">
        <span><?php if($successUpdate) {echo $successUpdate;} ?></span>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="location" class="form-control" id="location" name="location" required>
            </div>
            <button type="update-data" class="btn btn-primary" id="update-data" name="update-data">Update</button>
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