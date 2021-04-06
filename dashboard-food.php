<?php
require_once 'header.php';
if (!isset($_SESSION["useruid"])){
    header("Location: loginscherm.php");
}
if ($_SESSION["userRole"] == 3){
    header("Location: index.php");
}
?>
<body>
<section class="jumbotron-img">
    <section class="dashboard-txt">
        <h1>Content Management<br>System dashboard</h1>
    </section>
</section>
<section class="dashboard-back">
    <a href="dashboard.php" class="GoBackButton">Back</a>
    <section class="dashboard-front">
        <p class="event-title">Food event</p>
        <p class="event-content">Here you can support the food page using the following functions</p>
        <section class="content">
        </section>
        <section class="rij">
            <section class="column">
                <a href="food-pages.php" style="text-decoration: none;">
                    <h3 class="dashboardButtonText">Edit pages</h3>
                </a>
            </section>
            <section class="column">
                <a href="food-agenda.php" style="text-decoration: none;">
                    <h3 class="dashboardButtonText">Edit Program</h3>
                </a>
            </section>
        </section>
        <section class="rij">
            <section class="column">
                <a href="cms-testpayment.php" style="text-decoration: none;">
                    <h3 class="dashboardButtonText">Register Payment</h3>
                </a>
            </section>
            <section class="column">
                <a href="img-library.php" style="text-decoration: none;">
                    <h3 class="dashboardButtonText">Upload images</h3>
                </a>
            </section>
        </section>
    </section>
</section>
<?php
include_once 'footercms.php';
?>
</body>