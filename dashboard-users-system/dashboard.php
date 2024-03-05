<?php
session_start();
require '../connections/db.php';
$username = $_SESSION['username'];
$data = $_SESSION['data'];
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
        <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="tab2-tab" data-toggle="tab" href="./settings.php">Settings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="tab2-tab" data-toggle="tab" href="./reset-pass.php">Account</a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane active" id="tab1">
        <h2>Profile</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="profile-image d-block rounded-lg">
                <img src="./assets/img/pp-users.jpg" alt="">
            </div>
            <div class="users-name p-5">
                <h4><?php echo $username ?></h4>
            </div>
          </div>
          <div class="col-md-5 text-start">
            <div class="user-info text-start">
              <h3>Users Profile</h3>
              <p><strong>Name:</strong> <?php echo $username ?></p>
              <p><strong>Email:</strong> <?php echo (!empty($data['email'])) ? $data['email'] : 'No email available'; ?></p>
              <p><strong>Location:</strong> <?php echo (!empty($data['location'])) ? $data['location'] : 'No location available'; ?></p>
              <p><strong>Location:</strong> <?php echo (!empty($data['time'])) ? $data['time'] : 'No location available'; ?></p>
            </div>
          </div>
        </div>
      </div>
      <!-- Tambahkan tab-pane lainnya sesuai kebutuhan -->
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>