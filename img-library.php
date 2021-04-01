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
            <table class="table">
                <thead>
                    <tr>
                        <th>Image name</th>
                        <th colspan="1"></th>
                    </tr>
                </thead>
            <?php
                $directory = 'img';
                $images = array_diff(scandir($directory), array('..', '.'));
                foreach ($images as $image) : ?>
            <tr>
                <td>
                    <a style="text-decoration: none; color: black" href="img/<?php echo $image ?>">
                        <?php echo $image; ?>
                    </a>
                </td>

                <td>
                    <form action="functions-user.php" method="post">
                        <input type="hidden" style="float: right" name="id" value="<?php echo $image; ?>">
                        <button class="btn btn-danger btn-sm py-0" name="deleteImage" type="submit" style="font-size: 0.8em;">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach;?>
            </table>
            <form action="functions-user.php" method="post" enctype="multipart/form-data">
                Select image file to upload:
                <input class="" type="file" name="file">
                <input class="btn btn-primary" type="submit" name="uploadImage" value="Upload">
            </form>