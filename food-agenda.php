<?php
require_once 'header.php';
require_once 'functions-food.php';
if (!isset($_SESSION["useruid"])){
    header("Location: index.php");
}
?>

<body>
<header class="header">
    <h1 class="eventhead">Food</h1>
    <h2 class="slogan">Food things</h2>
</header>
<a href="dashboard-food.php" class="GoBackButton">Back</a>
<form action="food-agenda.php" method="post">
    <section class="agenda">
        <?php
        $foodContr = new FoodController();
        $result = $foodContr->foodAgendaGetAllDataContr();
        ?>
        <section class="container">
            <section class="row justify-content-center">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="table-small">Restaurant</th>
                        <th class="table-small">Address</th>
                        <th>Sessions</th>
                        <th>Duration/h</th>
                        <th>First session</th>
                        <th>Stars</th>
                        <th>Seats</th>
                        <th>Price</th>
                        <th>Reduced(-12)</th>
                        <th>Type</th>
                        <th class="table-small" colspan="2"></th>
                    </tr>
                    </thead>
                    <?php
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td class="table-small"><?php echo $row['Restaurant']; ?></td>
                            <td class="table-small"><?php echo $row['Adres']; ?></td>
                            <td><?php echo $row['sessions']; ?></td>
                            <td><?php echo $row['Duration']; ?></td>
                            <td><?php echo $row['first_session']; ?></td>
                            <td><?php echo $row['Stars']; ?></td>
                            <td><?php echo $row['Seats']; ?></td>
                            <td><?php echo $row['Price']; ?></td>
                            <td><?php echo $row['ReducedPrice']; ?></td>
                            <td class="table-small"><?php echo $row['Type']; ?></td>
                            <td>
                                <a href="food-agenda.php?edit=<?php echo $row['restaurant_Id']; ?>"
                                   class="btn btn-info">Edit</a>
                                <form action="functions-food.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row['restaurant_Id']; ?>">
                                    <button class="btn btn-danger" name="food-delete" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile;?>
                </table>
            </section>
            <?php
            $id = 0;
            $update = false;
            $restaurant = '';
            $address = '';
            $sessions = '';
            $duration = '';
            $firstSession = '';
            $stars = '';
            $seats = '';
            $price = '';
            $reducedPrice = '';
            $type = '';
            if (isset($_GET['edit'])){
                $row = $foodContr->foodAgendaGetEditDataContr();
                $id = $row['restaurant_Id'];
                $restaurant = $row['Restaurant'];
                $address = $row['Adres'];
                $sessions = $row['sessions'];
                $duration = $row['Duration'];
                $firstSession = $row['first_session'];
                $stars = $row['Stars'];
                $seats = $row['Seats'];
                $price = $row['Price'];
                $reducedPrice = $row['ReducedPrice'];
                $type = $row['Type'];
                $update = true;
            }
            ?>
            <section class="main" style="margin-top: 0">
                <p class="sign" style="margin-left: 36%">Add/Edit</p>
                <form class="form1" action="functions-food.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="text" name="restaurant" align="center" class="un" value="<?php echo $restaurant; ?>" placeholder="Restaurant...">
                    <input type="text" name="address" align="center" class="un" value="<?php echo $address; ?>" placeholder="Address...">
                    <input type="text" name="sessions" align="center" class="un" value="<?php echo $sessions; ?>" placeholder="Sessions...">
                    <input type="text" name="duration" align="center" class="un" value="<?php echo $duration; ?>" placeholder="Duration/h...">
                    <input type="text" name="firstSession" align="center" class="un" value="<?php echo $firstSession ?>" placeholder="First session...">
                    <input type="text" name="stars" align="center" class="un" value="<?php echo $stars ?>" placeholder="Stars...">
                    <input type="text" name="seats" align="center" class="un" value="<?php echo $seats ?>" placeholder="Seats...">
                    <input type="text" name="price" align="center" class="un" value="<?php echo $price ?>" placeholder="Price...">
                    <input type="text" name="reducedPrice" align="center" class="un" value="<?php echo $reducedPrice ?>" placeholder="Reduced (-12)...">
                    <input type="text" name="type" align="center" class="un" value="<?php echo $type ?>" placeholder="Type...">
                    <?php
                    if ($update == true): ?>
                        <button type="submit" style="margin-left: 33%; margin-bottom: 10px; padding-bottom: 5px" class="submit" name="food-update">Update</button>
                    <?php else: ?>
                        <button type="submit" style="margin-left: 33%; margin-bottom: 10px; padding-bottom: 5px" class="submit" name="food-save">Save</button>
                    <?php endif;?>
                </form>
            </section>
</form>
</section>
</form>
</body>

</html>
