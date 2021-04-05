<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("includes/autoloader.inc.php");

if(isset($_POST['confirm'])){
    setlocale(LC_ALL, 'nl_NL');

// formats money to a whole number or with 2 decimals; includes a dollar sign in front
    function formatMoney($number, $cents = 1) { // cents: 0=never, 1=if needed, 2=always
        if (is_numeric($number)) { // a number
            if (!$number) { // zero
                $money = ($cents == 2 ? '0.00' : '0'); // output zero
            } else { // value
                if (floor($number) == $number) { // whole number
                    $money = number_format($number, ($cents == 2 ? 2 : 0)); // format
                } else { // cents
                    $money = number_format(round($number, 2), ($cents == 0 ? 0 : 2)); // format
                } // integer or decimal
            } // value
            return $money;
        } // numeric
    } // formatMoney
    $amount = formatMoney($_POST['price'], 2);
    $name = $_POST['name'];
    header('location: /create-payment.php?price=' . $amount . "&name=" . $name);

}
require_once 'header.php';
require_once 'functions-user.php';
if (!isset($_SESSION["useruid"])){
    header("Location: loginscherm.php");
}
if ($_SESSION["userRole"] == 3){
    header("Location: index.php");}
?>
<body>
<header class="header">
    <h1 class="eventhead">Test payment</h1>
    <h2 class="slogan">Test environment</h2>
</header>
<a href="dashboard.php" class="GoBackButton">Back</a>
<form action="" method="post">
    <section class="agenda">
        <article class="title-wrapper">
            <h1>Test payment</h1>
        </article>
        <section class="container">
            <section class="row justify-content-center">
                <table class="table">
                    <thead>
                    <tr>
                        <th>order ID</th>
                        <th>price</th>
                        <th>customer</th>
                        <th>state</th>
                        <th colspan="1"></th>
                    </tr>
                    </thead>
                    <?php
                    $userContr = new UserController();
                    $result = $userContr->userOrderGetAllDataContr();
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td class="table-small"><?php echo $row['orderID']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['customer']; ?></td>
                            <td><?php echo $row['state']; ?></td>
                            <td>
                                <form action="functions-user.php" method="post" style="display: inline">
                                    <input type="hidden" name="id" value="<?php echo $row['orderID']; ?>">
                                    <button class="btn btn-danger btn-sm" name="user-delete-order" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile;?>
                </table>
            </section>
        <section class="main" style="margin-top: 0">
            <p class="sign" style="margin-left: 23%">Make a test payment</p>
            <form class="form1" action="" method="post">
                <input type="text" name="name" align="center" class="un" placeholder="Full Name...">
                <input type="text" name="price" align="center" class="un" placeholder="Price...">
                <button type="submit" style="margin-left: 33%; margin-bottom: 10px; padding-bottom: 5px" class="submit" name="confirm">Confirm</button>
        </section>
    </section>
</form>
