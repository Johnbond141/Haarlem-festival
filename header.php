<?php
session_start();
require_once 'Controller/UserController.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/cmscss.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign in</title>
</head>
<body>
<?php
if (isset($_SESSION["useruid"])){
    echo "
<nav class='navbar navbar-inverse'>
    <section class='container-fluid'>
        <section class='navbar-header'>
            <a class='navbar-brand' href='dashboard.php'>Haarlem Festival</a>
        </section>
        <ul class='nav navbar-nav'>
            <li><a href='dashboard.php'>Home</a></li>
            <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Events
                </a>
                <section class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                    <a class='dropdown-item' href='dashboard-jazz.php'>Jazz</a>
                    <a class='dropdown-item' href='dashboard-food.php'>Food</a>
                    <a class='dropdown-item' href='dashboard-dance.php'>Dance</a>
                </section>
            </li>
        </ul>
        <ul class='nav navbar-nav navbar-right'>
            <li><a href='manage-users.php'>Manage users</a></li>
            <li><a  href='Model/logout.php'>Log out</a></li>
        </ul>
    </section>
</nav>
";
}
?>
