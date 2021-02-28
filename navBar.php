<?php
session_start();
require 'Controller/UserController.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
  <body>
    <nav class="navbar">
      <a href="index.php">Home</a>

      <section class="dropdown">
        <button class="dropbtn">Info
          <i class="fa fa-caret-down"></i>
        </button>
        <section class="dropdown-content">
          <a href="#">Tickets</a>
          <a href="#">Artists</a>
          <a href="#">About</a>
          <a href="#">Contact us</a>
        </section>
      </section>

      <a href="#">Create program</a>

      <section class="dropdown">
        <button class="dropbtn">Events
          <i class="fa fa-caret-down"></i>
        </button>
        <section class="dropdown-content">
          <a href="#">Jazz</a>
          <a href="#">Food</a>
          <a href="#">Dance</a>
        </section>
      </section>

      <a href="login.php">Login</a>
    </nav>
  </body>
</html>
