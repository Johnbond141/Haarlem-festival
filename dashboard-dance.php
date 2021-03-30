<?php
require_once 'header.php';
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
            <p class="event-title">Dance event</p>
            <p class="event-content">Here you can support the dance page using the following functions</p>
        </section>
        <section class="row">
            <section class="column">
                <h3 class="dashboardButtonText">Edit Pages</h3>
            </section>
            <section class="column">
                <a href="dance-agenda.php" style="text-decoration: none;">
                    <h3 class="dashboardButtonText">Edit Program</h3>
                </a>
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
                <a href="img-library.php" style="text-decoration: none;">
                    <h3 class="dashboardButtonText">Upload images</h3>
                </a>
            </section>
        </section>
    </section>
</section>

</body>