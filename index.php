<?php
require_once 'header.php';
?>

<section class="login">
    <section class="main">
        <p class="sign" align="center">Content Management System</p>
        <p class="sign" align="center" style="font-size: 14px; padding-top: 5px">This is for authorized people only!</p>
        <form class="form1" action="index.php" method="post">
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

</html>