<?php
    include_once 'header.php';
?>

<body class="login">
<div class="main">
    <p class="sign" align="center">Content Management System</p>
    <p class="sign" align="center" style="font-size: 14px; padding-top: 5px">This is for authorized people only!</p>
    <form class="form1">
        <input class="un " type="text" align="center" placeholder="Username" name="uid">
        <input class="pass" type="password" align="center" placeholder="Password" name="pwd">
        <a class="submit" align="center" name="submit">Sign in</a>
        <p class="forgot" align="center"><a href="#">Forgot Password?</p>
    </form>
    <div>
        <?php
            if (isset($_POST["submit"])){
                $userObj = new UserController();
                $userObj->loginUserContr();
            }
        ?>
    </div>


</div>

</body>

</html>
