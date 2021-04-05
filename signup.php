<?php
include_once 'navBar.php';
require_once 'Controller/UserController.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Haarlem Festival</title>
</head>
<body>
<section class="login">
    <section class="main">
        <p class="sign" align="center">Sign up</p>
        <form class="form1" action="signup.php" method="post">
            <input type="hidden" name="type" value="user">
            <input type="hidden" name="currentRole" value="3">
            <input type="text" name="fullName" align="center" class="un" placeholder="Full Name...">
            <input type="text" name="e-mail" align="center" class="un" placeholder="Email...">
            <input type="text" name="username" align="center" class="un" placeholder="Username...">
            <input type="password" name="password" align="center" class="un" placeholder="Password...">
            <input type="password" name="passwordRepeat" align="center" class="un" placeholder="Repeat password...">
            <button class="submit" align="center" name="submit">Sign up</button>
            <p class="forgot" align="center" style="padding-bottom: 10px"><a href="login.php">Go back</p>
        </form>
        <section class="validation">
            <?php
            if (isset($_POST["submit"])){
                $userObj = new UserController();
                $userObj->userAddContr();
            }
            $userObj2 = new UserView();
            $userObj2->showSignUp();
            ?>
        </section>
    </section>
</section>
</body>