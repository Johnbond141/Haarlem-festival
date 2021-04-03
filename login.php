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
        <p class="sign" align="center">Login</p>
        <form class="form1" action="login.php" method="post">
            <input type="hidden" name="type" value="user">
            <input class="un " type="text" align="center" placeholder="Username" name="uid">
            <input class="pass" type="password" align="center" placeholder="Password" name="pwd">
            <button class="submit" align="center" name="submit">Log in</button>
            <p class="forgot" align="center" style="padding-bottom: 10px"><a href="reset-password.php">Forgot Password?</p>
        </form>
        <section class="validation">
            <?php
            if (isset($_POST["submit"])){
                $userObj = new UserController();
                $userObj->loginUserContr();
            }
            $userObj2 = new UserView();
            $userObj2->showLogin();
            ?>
        </section>
    </section>
</section>
</body>