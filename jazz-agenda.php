<?php
require 'Controller/JazzController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/jazzcss.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Artist Information</title>
</head>

<body>
<header class="header">
    <h1 class="eventhead">Jazz Artists</h1>
    <h2 class="slogan">Jazz it up a little!</h2>
</header>
<a href="dashboard-jazz.php" class="GoBackButton">Back</a>
<form action="jazz-agenda.php" method="post">
<section class="agenda">
    <article class="title-wrapper">
        <h1>Festival Agenda</h1>
        <button name="jazz-thursday">Thursday</button>
        <button name="jazz-friday">Friday</button>
        <button name="jazz-saturday">Saturday</button>
        <button name="jazz-sunday">Sunday</button>
    </article>
    <?php
    $jazzContr = new JazzController();
    if (isset($_POST["jazz-thursday"])){
        $jazzContr->jazzAgendaContr("Thursday");
    }elseif (isset($_POST["jazz-friday"])){
        $jazzContr->jazzAgendaContr("Friday");
    }elseif (isset($_POST["jazz-saturday"])){
        $jazzContr->jazzAgendaContr("Saturday");
    }elseif (isset($_POST["jazz-sunday"])){
        $jazzContr->jazzAgendaContr("Sunday");
    }
    ?>
</section>
</form>
</body>

</html>