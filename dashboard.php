<?php
include_once 'header.php';
if (!isset($_SESSION["useruid"])){
    header("Location: index.php");
}
?>


<section class="jumbotron-img">
    <section class="dashboard-txt">
        <h1>Content Management<br>System dashboard</h1>
    </section>
</section>
<section class="dashboard-back" style="padding-top: 40px">
    <section class="dashboard-front">
        <section class="content">
            <p class="event-title">Account details</p>
            <?php echo "<p>Username: " . $_SESSION["useruid"] . "</p>" ?>
            <p>Role: </p>
            <p class="welcometxt">Welcome back! <br><br>You are logged in with an administrator account.
                This means that you are authorized to support the website.
                You can do so using the Content Management System.</p>
        </section>
        <section class="img-row">
            <section class="img-column">
                <img src="img/jazz.jpg" alt="Jazz" style="width: 100%;" class="image">
                <a href="dashboard-jazz.php">
                    <section class="overlay">
                        <section class="overlay-text">Jazz</section>
                    </section>
                </a>
            </section>
            <section class="img-column">
                <img src="img/food.jpg" alt="Food" style="width: 100%" class="image">
                <a href="dashboard-food.php">
                    <section class="overlay">
                        <section class="overlay-text">Food</section>
                    </section>
                </a>
            </section>
            <section class="img-column">
                <img src="img/dance.jpg" alt="Dance" style="width: 100%" class="image">
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
