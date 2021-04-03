<?php
require_once 'header.php';
require_once 'functions-jazz.php';
if (!isset($_SESSION["useruid"])){
    header("Location: loginscherm.php");
}
?>

<body>
<header class="header">
    <h1 class="eventhead">Jazz Artists</h1>
    <h2 class="slogan">Jazz it up a little!</h2>
</header>
<a href="dashboard-jazz.php" class="GoBackButton">Back</a>
<form action="jazz-pages.php" method="post">
    <section class="agenda">
        <article class="title-wrapper">
            <h1>Jazz Pages</h1>
        </article>
        <?php
        $jazzContr = new JazzController();
        $result = $jazzContr->jazzPagesGetAllContr();
        ?>
        <section class="container">
            <section class="row justify-content-center">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Paragraph 1</th>
                        <th>Paragraph 2</th>
                        <th>Paragraph 3</th>
                        <th colspan="2"></th>
                    </tr>
                    </thead>
                    <?php

                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><a style="text-decoration: none; color: black" href="<?php echo $row['name']?>"><?php echo $row['name']; ?></a></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['subtitle']; ?></td>
                            <td><?php echo $row['paragraph1']; ?></td>
                            <td><?php echo $row['paragraph2']; ?></td>
                            <td><?php echo $row['paragraph3']; ?></td>
                            <td>
                                <a href="jazz-pages.php?edit=<?php echo $row['page_id']; ?>"
                                   class="btn btn-info btn-sm">Edit</a>
                                <form action="functions-jazz.php" method="post" style="display: inline">
                                    <input type="hidden" name="id" value="<?php echo $row['page_id']; ?>">
                                    <button class="btn btn-danger btn-sm" name="jazz-delete-page" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile;?>
                </table>
            </section>
            <?php
            $id = 0;
            $update = false;
            $name = '';
            $title = '';
            $subtitle = '';
            $paragraph1 = '';
            $paragraph2 = '';
            $paragraph3 = '';
            if (isset($_GET['edit'])){
                $row = $jazzContr->jazzPagesGetEditDataContr();
                $id = $row['page_id'];
                $name = $row['name'];
                $title = $row['title'];
                $subtitle = $row['subtitle'];
                $paragraph1 = $row['paragraph1'];
                $paragraph2 = $row['paragraph2'];
                $paragraph3 = $row['paragraph3'];
                $update = true;
            }
            ?>
            <section class="main" style="margin-top: 0; width: 80%;">
                <p class="sign" style="margin-left: 42%">Add/Edit</p>
                <form class="form1" action="functions-jazz.php" method="post" ">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <section style="display: inline-block; width: 45%; margin-left: 2.5%;">
                    <input type="text" name="name" align="center" class="un" value="<?php echo $name; ?>" placeholder="Page name...">
                    <input type="text" name="paragraph1" align="center" class="un" value="<?php echo $paragraph1; ?>" placeholder="paragraph 1...">
                    <input type="text" name="paragraph2" align="center" class="un" value="<?php echo $paragraph2; ?>" placeholder="paragraph 2...">
                </section>
                <section style="display: inline-block; width: 45%;">
                    <input type="text" name="title" align="center" class="un" value="<?php echo $title; ?>" placeholder="title...">
                    <input type="text" name="subtitle" align="center" class="un" value="<?php echo $subtitle ?>" placeholder="subtitle...">
                    <input type="text" name="paragraph3" align="center" class="un" value="<?php echo $paragraph3 ?>" placeholder="paragraph 3...">
                </section>
                <?php
                if ($update == true): ?>
                    <button type="submit" style="margin-left: 40%; margin-bottom: 10px; padding-bottom: 5px" class="submit" name="jazz-update-page">Update</button>
                <?php else: ?>
                    <button type="submit" style="margin-left: 41%; margin-bottom: 10px; padding-bottom: 5px" class="submit" name="jazz-save-page">Save</button>
                <?php endif;?>
</form>
</section>
</form>
</section>
</form>
</body>

</html>
