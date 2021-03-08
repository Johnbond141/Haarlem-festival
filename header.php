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
    <title>CMS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign in</title>
</head>
<body>
<?php
if (isset($_SESSION["useruid"])){
    echo "
<nav class='navbar navbar-inverse'>
    <div class='container-fluid'>
        <div class='navbar-header'>
            <a class='navbar-brand' href='dashboard.php'>Haarlem Festival</a>
        </div>
        <ul class='nav navbar-nav'>
            <li><a href='dashboard.php'>Home</a></li>
            <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Events
                </a>
                <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                    <a class='dropdown-item' href='dashboard-jazz.php'>Jazz</a>
                    <a class='dropdown-item' href='dashboard-food.php'>Food</a>
                    <a class='dropdown-item' href='dashboard-dance.php'>Dance</a>
                </div>
            </li>
        </ul>
        <ul class='nav navbar-nav navbar-right'>
            <li><a href='search.php'>Account details</a></li>
            <li><a  href='Model/logout.php'>Log out</a></li>
        </ul>
    </div>
</nav>
";
}
?>
