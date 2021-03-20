<?php
include_once 'header.php';
if (!isset($_SESSION["useruid"])){
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
        <section class="content">
            <p class="event-title">Food event</p>
            <p class="event-content">Here you can support the food page using the following functions</p>
        </section>
        <section class="row">
            <section class="column">
                <h3 class="dashboardButtonText">Edit Pages</h3>
            </section>
            <section class="column">
                <h3 class="dashboardButtonText">Edit Program</h3>
            </section>
            <section class="column">
                <h3 class="dashboardButtonText">Show Invoices</h3>
            </section>
        </section>
        <section class="row">
            <section class="column">
                <h3 class="dashboardButtonText">Register Payment</h3>
            </section>
            <section class="column">
                <h3 class="dashboardButtonText">Export Data</h3>
            </section>
            <section class="column">
                <h3 class="dashboardButtonText">Upload Images</h3>
            </section>
        </section>
    </section>
</section>

</body>