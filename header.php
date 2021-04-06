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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/cmscss.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign in</title>
</head>
<body>
</body>
<?php
if (isset($_SESSION["useruid"])){
    echo '<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand text-white" href="dashboard.php">Haarlem Festival CMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <section class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Jazz
        </a>
        <section class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="jazz-pages.php">Edit pages</a>
          <a class="dropdown-item" href="jazz-agenda.php">Edit program</a>
          <a class="dropdown-item" href="cms-testpayment.php">Register payment</a>
          <a class="dropdown-item" href="img-library.php">Image library</a>
        </section>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Food
        </a>
        <section class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="food-pages.php">Edit pages</a>
          <a class="dropdown-item" href="food-agenda.php">Edit program</a>
          <a class="dropdown-item" href="cms-testpayment.php">Register payment</a>
          <a class="dropdown-item" href="img-library.php">Image library</a>
        </section>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dance
        </a>
        <section class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="dance-pages.php">Edit pages</a>
          <a class="dropdown-item" href="dance-agenda.php">Edit program</a>
          <a class="dropdown-item" href="cms-testpayment.php">Register payment</a>
          <a class="dropdown-item" href="img-library.php">Image library</a>
        </section>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="manage-users.php">Manage users</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="Model/logoutcms.php">
                  Logout
                </a>
            </li>
            </ul>
        </section>
    </nav>
  </section>
</nav>';
}
?>
