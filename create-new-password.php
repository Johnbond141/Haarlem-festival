<?php
require_once 'header.php';

?>
<section class="login">
    <section class="main">
        <p class="sign" align="center">Reset your password</p>
        <?php
        if (isset($_POST["reset-password-submit"])){
            $userObj = new UserController();
            $userObj->resetPasswordContr();
        }
        ?>
        <?php
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if (empty($selector) || empty($validator)) {
            echo "We could not validate your request!";
        } else {
            if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                ?>
                <form class="form1" action="create-new-password.php" method="post">
                    <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                    <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                    <input class="pass" type="password" align="center" placeholder="New password" name="pwd">
                    <input class="pass" type="password" align="center" placeholder="Repeat new password" name="pwd-repeat">
                    <button class="submit" align="center" name="reset-password-submit">Reset</button>
                </form>
                <?php
            }
        }
        ?>
    </section>
</section>