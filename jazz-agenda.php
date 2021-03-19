<?php
require 'Controller/JazzController.php';
require 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
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
        <h1>Jazz Agenda</h1>
        <button name="jazz-thursday">Thursday</button>
        <button name="jazz-friday">Friday</button>
        <button name="jazz-saturday">Saturday</button>
        <button name="jazz-sunday">Sunday</button>
    </article>
    <?php
    $selectedDay = "Thursday";

    if (isset($_POST['jazz-thursday'])){
        $selectedDay = "Thursday";
    }
    if (isset($_POST['jazz-friday'])){
        $selectedDay = "Friday";
    }
    if (isset($_POST['jazz-saturday'])){
        $selectedDay = "Saturday";
    }
    if (isset($_POST['jazz-sunday'])){
        $selectedDay = "Sunday";
    }
    $jazzContr = new JazzController();
    $result = $jazzContr->jazzAgendaGetAllDataContr($selectedDay)
    ?>
    <section class="container">
        <section class="row justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th>Band</th>
                    <th>Location</th>
                    <th>Hall</th>
                    <th>Date</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th colspan="2"></th>
                </tr>
                </thead>
                <?php
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['Band']; ?></td>
                        <td><?php echo $row['Location']; ?></td>
                        <td><?php echo $row['Hall']; ?></td>
                        <td><?php echo $row['Date']; ?></td>
                        <td><?php echo $row['Day']; ?></td>
                        <td><?php echo $row['Time']; ?></td>
                        <td>
                            <a href="jazz-agenda.php?edit=<?php echo $row['performance_Id']; ?>"
                               class="btn btn-info">Edit</a>
                            <a href="functions.php?delete=<?php echo $row['performance_Id']; ?>"
                               class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile;?>
            </table>
        </section>
        <?php
        $id = 0;
        $update = false;
        $band = '';
        $location = '';
        $hall = '';
        $date = '';
        $day = '';
        $time = '';
        if (isset($_GET['edit'])){
            $row = $jazzContr->jazzAgendaGetEditData();
            $id = $band = $row['performance_Id'];
            $band = $row['Band'];
            $location = $row['Location'];
            $hall = $row['Hall'];
            $date = $row['Date'];
            $day = $row['Day'];
            $time = $row['Time'];
            $update = true;
        }
        ?>
        <section class="main" style="margin-top: 0">
            <p class="sign" style="margin-left: 36%">Add/Edit</p>
            <form class="form1" action="functions.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" name="band" align="center" class="un" value="<?php echo $band; ?>" placeholder="band...">
                <input type="text" name="location" align="center" class="un" value="<?php echo $location; ?>" placeholder="location...">
                <input type="text" name="hall" align="center" class="un" value="<?php echo $hall; ?>" placeholder="hall...">
                <input type="text" name="date" align="center" class="un" value="<?php echo $date; ?>" placeholder="date...">
                <input type="text" name="day" align="center" class="un" value="<?php echo $day ?>" placeholder="day...">
                <input type="text" name="time" align="center" class="un" value="<?php echo $time ?>" placeholder="time...">
                <?php
                if ($update == true): ?>
                    <button type="submit" style="margin-left: 33%; margin-bottom: 10px; padding-bottom: 5px" class="submit" name="update">Update</button>
                <?php else: ?>
                    <button type="submit" style="margin-left: 33%; margin-bottom: 10px; padding-bottom: 5px" class="submit" name="save">Save</button>
                <?php endif;?>
            </form>
        </section>
    </form>
</section>
</form>
</body>

</html>