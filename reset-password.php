<?php
require_once 'header.php';
?>
<section class="login">
    <section class="main">
        <p class="sign" align="center">Reset your password</p>
        <p class="sign" align="center" style="font-size: 14px; padding-top: 5px">An e-mail will be send to you with instructions on how to reset your password</p>
        <form class="form1" action="reset-password.php" method="post">
            <input class="un" type="text" align="center" placeholder="Email..." name="email">
            <button class="submit" align="center" name="reset-request-submit">Submit</button>
            <p class="forgot" align="center" style="padding-bottom: 10px"><a href="loginscherm.php">Go back</p>
        </form>
        <section class="validation">
            <?php
            if (isset($_POST["reset-request-submit"])){
                $userObj = new UserController();
                $userObj->resetPasswordRequestContr();
            }
            $userObj2 = new UserView();
            $userObj2->showResetPasswordRequest();
            ?>
        </section>
    </section>