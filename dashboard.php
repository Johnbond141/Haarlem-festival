<?php
require_once 'header.php';
if (!isset($_SESSION["useruid"])){
    header("Location: loginscherm.php");
}
?>


<section class="jumbotron-img">
    <section class="dashboard-txt">
        <h1>Content Management<br>System dashboard</h1>
    </section>
</section>
<section class="dashboard-back" style="padding-top: 40px">
    <section class="dashboard-front">
        <p class="event-title">Account details</p>
        <section class="content">
            <img src="img/user.png" alt="userProfile" style="width: 8%; display: inline">
            <?php
            $role;
            if ($_SESSION["userRole"]===1){
                $role = "Super Administrator";
            } elseif ($_SESSION["userRole"]===2){
                $role = "Administrator";
            }
            echo "<p style='display: inline-block;'>Username: " . $_SESSION["useruid"] . "<br>Role: " . $role . "</p>";
            ?>
            <p class="welcometxt">Welcome back! <br><br>You are logged in with an administrator account.
                This means that you are authorized to support the website.
                You can do so using the Content Management System.</p>
        </section>
        <section class="img-row">
            <section class="img-column">
                <img src="img/jazz.jpg" alt="Jazz" style="width: 80%;" class="image">
                <a href="dashboard-jazz.php">
                    <section class="overlay">
                        <section class="overlay-text">Jazz</section>
                    </section>
                </a>
            </section>
            <section class="img-column">
                <img src="img/food.jpg" alt="Food" style="width: 80%" class="image">
                <a href="dashboard-food.php">
                    <section class="overlay">
                        <section class="overlay-text">Food</section>
                    </section>
                </a>
            </section>
            <section class="img-column">
                <img src="img/dance.jpg" alt="Dance" style="width: 80%" class="image">
                <a href="dashboard-dance.php">
                    <section class="overlay">
                        <section class="overlay-text">Dance</section>
                    </section>
                </a>
            </section>
        </section>
    </section>
</section>
</section>
</body>
