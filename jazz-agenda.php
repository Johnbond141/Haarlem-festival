<?php
require_once 'header.php';
require_once 'functions-jazz.php';
if (!isset($_SESSION["useruid"])){
    header("Location: index.php");
}
?>

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
        <button class="agenda-button" name="jazz-thursday">Thursday</button>
        <button class="agenda-button" name="jazz-friday">Friday</button>
        <button class="agenda-button" name="jazz-saturday">Saturday</button>
        <button class="agenda-button" name="jazz-sunday">Sunday</button>
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
                    <th class="table-small">Band</th>
                    <th>Location</th>
                    <th>Hall</th>
                    <th>Date</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Seats</th>
                    <th>Price</th>
                    <th colspan="2"></th>
                </tr>
                </thead>
                <?php
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="table-small"><?php echo $row['Band']; ?></td>
                        <td><?php echo $row['Location']; ?></td>
                        <td><?php echo $row['Hall']; ?></td>
                        <td><?php echo $row['Date']; ?></td>
                        <td><?php echo $row['Day']; ?></td>
                        <td><?php echo $row['Time']; ?></td>
                        <td><?php echo $row['Seats']; ?></td>
                        <td><?php echo $row['Price']; ?></td>
                        <td>
                            <a href="jazz-agenda.php?edit=<?php echo $row['performance_Id']; ?>"
                               class="btn btn-info btn-sm">Edit</a>
                            <form action="functions-jazz.php" method="post" style="display: inline">
                                <input type="hidden" name="id" value="<?php echo $row['performance_Id']; ?>">
                                <button class="btn btn-danger btn-sm" name="jazz-delete" type="submit">Delete</button>
                            </form>
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
        $seats = '';
        $price = '';
        if (isset($_GET['edit'])){
            $row = $jazzContr->jazzAgendaGetEditDataContr();
            $id = $row['performance_Id'];
            $band = $row['Band'];
            $location = $row['Location'];
            $hall = $row['Hall'];
            $date = $row['Date'];
            $day = $row['Day'];
            $time = $row['Time'];
            $seats = $row['Seats'];
            $price = $row['Price'];
            $update = true;
        }
        ?>
        <section class="main" style="margin-top: 0; width: 80%;">
            <p class="sign" style="margin-left: 42%">Add/Edit</p>
            <form class="form1" action="functions-jazz.php" method="post" ">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <section style="display: inline-block; width: 45%; margin-left: 2.5%;">
                <input type="text" name="band" align="center" class="un" value="<?php echo $band; ?>" placeholder="band...">
                <input type="text" name="location" align="center" class="un" value="<?php echo $location; ?>" placeholder="location...">
                <input type="text" name="hall" align="center" class="un" value="<?php echo $hall; ?>" placeholder="hall...">
                <input type="text" name="date" align="center" class="un" value="<?php echo $date; ?>" placeholder="date...">
                </section>
                <section style="display: inline-block; width: 45%;">
                <input type="text" name="day" align="center" class="un" value="<?php echo $day ?>" placeholder="day...">
                <input type="text" name="time" align="center" class="un" value="<?php echo $time ?>" placeholder="time...">
                <input type="text" name="seats" align="center" class="un" value="<?php echo $seats ?>" placeholder="seats...">
                <input type="text" name="price" align="center" class="un" value="<?php echo $price ?>" placeholder="price...">
                </section>
                <?php
                if ($update == true): ?>
                    <button type="submit" style="margin-left: 40%; margin-bottom: 10px; padding-bottom: 5px" class="submit" name="jazz-update">Update</button>
                <?php else: ?>
                    <button type="submit" style="margin-left: 41%; margin-bottom: 10px; padding-bottom: 5px" class="submit" name="jazz-save">Save</button>
                <?php endif;?>
            </form>
        </section>
    </form>
</section>
</form>
</body>

</html>