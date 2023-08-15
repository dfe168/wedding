<?php

include './util.php';

if(!Auth::user()){
  Redirect::to('./login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wedding Dashboard</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/datatables/datatables/media/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="../frontend/assets/css/styles.css">

  <script src="./assets/js/jquery.min.js"></script>

</head>

<body>
  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="custom-menu">

        <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>

      </div>
      <h1><a href="index.php?p=dashboard" class="logo">Dashboard</a></h1>
      <ul class="list-unstyled components mb-5">
        <li class="active">
          <a href="index.php?p=dashboard" class="link"><span class="fa fa-home mr-3"></span>Homepage</a>
        </li>
        <li>
          <a href="index.php?p=newGuest" class="link"><span class="fa fa-user mr-3"></span>Create geust</a>
        </li>
        <li>
          <a href="index.php?p=attendees" class="link"><span class="fa fa-users mr-3"></span>Attendees</a>
        </li>
        <li>
          <a href="index.php?p=absent" class="link"><span class="fa fa-times mr-3"></span>Not coming</a>
        </li>
        <li>
          <a href="index.php?p=formNotCompleted" class="link"><span class="fa fa-pause mr-3"></span>Waiting response</a>
        </li>
        <li>
          <a href="index.php?p=changePassword" class="link"><span class="fa fa-key mr-3"></span>Change your password</a>
        </li>
        <li>
          <a href="logout.php" class="link"><span class="fa fa-unlock-alt mr-3"></span>Logout</a>
        </li>
      </ul>

    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5 mt-4">
     
      <?php
      define('INCLUDED', true);

      if (!$_GET) {
        include 'pages/dashboard.php';
      } else {
        $page = 'pages/' . $_GET['p'] . '.php';
        if (file_exists($page)) {
          include $page;
        } else {
          header('HTTP/1.0 404 Not Found');
          echo '404 - Page not found';
        }
      }

      ?>
    </div>
  </div>
</body>


<script src="../frontend/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="vendor/datatables/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="assets/js/main.js"></script>

</html>