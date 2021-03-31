<?php
require_once 'header.php';
require_once 'functions-dance.php';
if (!isset($_SESSION["useruid"])){
    header("Location: index.php");
}
?>

<body>
<header class="header">
    <h1 class="eventhead">Dance Artists</h1>
    <h2 class="slogan">Dare to Dance!</h2>
</header>
<a href="dashboard-dance.php" class="GoBackButton">Back</a>
<form action="dance-agenda.php" method="post">
    <section class="agenda">
        <article class="title-wrapper">
            <h1>Dance Agenda</h1>
            <button class="agenda-button" name="dance-friday">Friday</button>
            <button class="agenda-button" name="dance-saturday">Saturday</button>
            <button class="agenda-button" name="dance-sunday">Sunday</button>
        </article>
        <?php
        $selectedDay = "Friday";
        if (isset($_POST['dance-friday'])){
            $selectedDay = "Friday";
        }
        if (isset($_POST['dance-saturday'])){
            $selectedDay = "Saturday";
        }
        if (isset($_POST['dance-sunday'])){
            $selectedDay = "Sunday";
        }
        $danceContr = new DanceController();
        $result = $danceContr->danceAgendaGetAllDataContr($selectedDay)
        ?>
        <section class="container">
            <section class="row justify-content-center">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="table-small">Artist</th>
                        <th class="table-small">Venue</th>
                        <th class="table-small">Session</th>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th class="table-small">Duration (min)</th>
                        <th>Tickets</th>
                        <th>Price €</th>
                        <th colspan="2"></th>
                    </tr>
                    </thead>
                    <?php
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td class="table-small"><?php echo $row['Artist']; ?></td>
                            <td class="table-small"><?php echo $row['Venue']; ?></td>
                            <td class="table-small"><?php echo $row['Session']; ?></td>
                            <td><?php echo $row['Date']; ?></td>
                            <td><?php echo $row['Day']; ?></td>
                            <td><?php echo $row['Time']; ?></td>
                            <td class="table-small"><?php echo $row['Duration']; ?></td>
                            <td><?php echo $row['Tickets']; ?></td>
                            <td><?php echo $row['Price']; ?></td>
                            <td>
                                <a href="dance-agenda.php?edit=<?php echo $row['performance_Id']; ?>"
                                   class="btn btn-info btn-sm">Edit</a>
                                <form action="functions-dance.php " method="post" style="display: inline">
                                    <input type="hidden" name="id" value="<?php echo $row['performance_Id']; ?>">
                                    <button class="btn btn-danger btn-sm" name="dance-delete" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile;?>
                </table>
            </section>
            <?php
            $id = 0;
            $update = false;
            $artist = '';
            $venue = '';
            $session = '';
            $date = '';
            $day = '';
            $time = '';
            $duration = '';
            $tickets = '';
            $price = '';
            if (isset($_GET['edit'])){
                $row = $danceContr->danceAgendaGetEditDataContr();
                $id = $row['performance_Id'];
                $artist = $row['Artist'];
                $venue = $row['Venue'];
                $session = $row['Session'];
                $date = $row['Date'];
                $day = $row['Day'];
                $time = $row['Time'];
                $duration = $row['Duration'];
                $tickets = $row['Tickets'];
                $price = $row['Price'];
                $update = true;
            }
            ?>
            <section class="main" style="margin-top: 0;  width: 80%;">
                <p class="sign" style="margin-left: 42%">Add/Edit</p>
                <form class="form1" action="functions-dance.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <section style="display: inline-block; width: 45%; margin-left: 2.5%;">
                    <input type="text" name="artist" align="center" class="un" value="<?php echo $artist; ?>" placeholder="artist...">
                    <input type="text" name="venue" align="center" class="un" value="<?php echo $venue; ?>" placeholder="venue...">
                    <input type="text" name="session" align="center" class="un" value="<?php echo $session; ?>" placeholder="session...">
                    <input type="text" name="date" align="center" class="un" value="<?php echo $date; ?>" placeholder="date...">
                    <input type="text" name="day" align="center" class="un" value="<?php echo $day ?>" placeholder="day...">
                    </section>
                    <section style="display: inline-block; width: 45%;">
                    <input type="text" name="time" align="center" class="un" value="<?php echo $time ?>" placeholder="time...">
                    <input type="text" name="duration" align="center" class="un" value="<?php echo $duration ?>" placeholder="duration...">
                    <input type="text" name="tickets" align="center" class="un" value="<?php echo $tickets ?>" placeholder="tickets...">
                    <input type="text" name="price" align="center" class="un" value="<?php echo $price ?>" placeholder="price...">
                    </section>
                    <?php
                    if ($update == true): ?>
                        <button type="submit" style="margin-left: 40%; margin-bottom: 10px; padding-bottom: 5px" class="submit" name="dance-update">Update</button>
                    <?php else: ?>
                        <button type="submit" style="margin-left: 41%; margin-bottom: 10px; padding-bottom: 5px" class="submit" name="dance-save">Save</button>
                    <?php endif;?>
                </form>
            </section>
</form>
</section>
</form>
</body>

</html>