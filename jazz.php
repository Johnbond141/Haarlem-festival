<?php
include("includes/navBar.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/jazzcss.css">
    <title>Jazz homepage</title>
</head>
<?php
require_once 'functions-jazz.php';
$jazzContr = new JazzController();
$result = $jazzContr->jazzPagesGetOneContr(1)
?>
<body>
    <section class="page-container">
        <header class="header">
            <h1 class="eventhead"><?php echo $result['title']?></h1>
            <h2 class="slogan"><?php echo $result['subtitle']?></h2>
        </header>
        <section class="container">
            <article class="box1"></article>
            <article class="box2">
                <?php echo $result['paragraph1']?>
                <br><br><br>
                <?php echo $result['paragraph2']?>
                <form action="">
                    <input type="submit" class="buyjazz" value="Buy tickets"><i class="arrow right"></i></input>
                </form>
            </article>
        </section>
        
        <section class="wrapper">
            <section class="container2">
                <article class="box3">
                    <?php echo $result['paragraph3']?>
                    <form action="">
                        <input type="submit" class="artistinfo" name="artistinfo" value="Artist Information">
                    </form>
                </article>
                <article class="box4">
                    <img src="img/jazz2.png" width="500px" height="auto" alt="">
                </article>
            </section>
        </section>
    </section>
</body>

</html>

<?php
include("includes/footer.php");

?>