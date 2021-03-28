<?php
require_once 'header.php';
require_once 'functions-user.php';
if (!isset($_SESSION["useruid"])){
    header("Location: index.php");
}
?>
<header class="jumbotron-img">
    <section class="dashboard-txt">
        <h1>Content Management<br>System dashboard</h1>
    </section>
</header>
<a href="dashboard.php" class="GoBackButton">Back</a>
<form action="manage-users.php" method="post">
    <section class="agenda">
        <article class="title-wrapper">
            <h1>Manage users</h1>
            <button class="agenda-button" name="allUsers">All users</button>
            <?php
            if ($_SESSION["userRole"]===1) {
                echo'
                <button class="agenda-button" name="superAdmins">Super Admins</button >';
            }
            ?>
            <button class="agenda-button" name="admins">Administrators</button>
            <button class="agenda-button" name="users">Users</button>
        </article>
        <?php
        if ($_SESSION["userRole"] === 1) {
            $selected = ">= 1";
            if (isset($_POST['allUsers'])){
                $selected = ">= 1";
            }
        } elseif ($_SESSION["userRole"]===2){
            $selected = ">= 2";
            if (isset($_POST['allUsers'])){
                $selected = ">= 2";
            }
        }
        if (isset($_POST['superAdmins'])){
            $selected = "=1";
        }
        if (isset($_POST['admins'])){
            $selected = "=2";
        }
        if (isset($_POST['users'])){
            $selected = "=3";
        }
        $userContr = new UserController();
        $result = $userContr->getAllUsersContr($selected);
        ?>
        <section class="container">
            <section class="row justify-content-center">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Full name</th>
                        <th>E-mail</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Registration date</th>
                        <th colspan="2"></th>
                    </tr>
                    </thead>
                    <?php
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['usersName']; ?></td>
                            <td><?php echo $row['usersEmail']; ?></td>
                            <td><?php echo $row['usersUid']; ?></td>
                            <td><?php echo $row['usersRole']; ?></td>
                            <td><?php echo $row['usersRegistration']; ?></td>
                            <td>
                                <a href="manage-users.php?editUser=<?php echo $row['usersId']; ?>"
                                   class="btn btn-info">Edit</a>
                                <form action="functions-user.php" method="post">
                                    <input type="hidden" style="float: right" name="id" value="<?php echo $row['usersId']; ?>">
                                    <button class="btn btn-danger" name="deleteUser" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile;?>
                </table>
            </section>
            <?php
            $id = 0;
            $update = false;
            $fullName = '';
            $email = '';
            $username = '';
            $password = '';
            $passwordRepeat = '';
            $role = '';
            if (isset($_GET['editUser'])) {
                $row = $userContr->getUserEditDataContr();
                $id = $row['usersId'];
                $fullName = $row['usersName'];
                $email = $row['usersEmail'];
                $username = $row['usersUid'];
                if ($_SESSION["userRole"] === 1) {
                    $role = $row['usersRole'];
                }
                $update = true;
            }
            ?>
            <section class="main" style="margin-top: 0">
                <p class="sign" style="margin-left: 32%">Manage users</p>
                <form class="form1" action="functions-user.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="currentRole" value="<?php echo $_SESSION["userRole"]; ?>">
                    <input type="text" name="fullName" align="center" class="un" value="<?php echo $fullName; ?>" placeholder="Full Name...">
                    <input type="text" name="e-mail" align="center" class="un" value="<?php echo $email; ?>" placeholder="Email...">
                    <input type="text" name="username" align="center" class="un" value="<?php echo $username; ?>" placeholder="Username...">
                    <?php
                    if ($update == false):
                        ?>
                        <input type="password" name="password" align="center" class="un" value="<?php echo $password; ?>" placeholder="Password...">
                        <input type="password" name="passwordRepeat" align="center" class="un" value="<?php echo $passwordRepeat; ?>" placeholder="Repeat password...">
                    <?php endif;?>
                    <?php
                    if ($_SESSION["userRole"]===1):
                        ?>
                        <input type="text" name="role" align="center" class="un" value="<?php echo $role; ?>" placeholder="Role...">
                    <?php endif;?>
                    <?php
                    if ($update == true):
                        ?>
                        <button type="submit" style="margin-left: 33%; margin-bottom: 10px; padding-bottom: 5px" class="submit" name="updateUser">Update</button>
                    <?php else: ?>
                        <button type="submit" style="margin-left: 33%; margin-bottom: 10px; padding-bottom: 5px" class="submit" name="saveUser">Save</button>
                    <?php endif;?>
                </form>
            </section>
        </section>
</form>

</form>
</section>
</body>

</html>