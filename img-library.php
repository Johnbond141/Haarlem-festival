<?php
include_once 'header.php';
require_once 'functions-user.php';
?>

<header class="jumbotron-img">
    <section class="dashboard-txt">
        <h1>Content Management<br>System dashboard</h1>
    </section>
</header>
<a href="dashboard.php" class="GoBackButton">Back</a>
<section class="agenda">
    <article class="title-wrapper">
        <h1>Manage users</h1>
    </article>
    <section class="container">
        <section class="row justify-content-center">
            <form action="functions-user.php" method="post" enctype="multipart/form-data">
                Select image file to upload:
                <input type="file" name="file">
                <input type="submit" name="uploadImage" value="Upload">
            </form>