<?php
require_once 'DAL/Db.php';
require_once 'View/UserView.php';
class User extends Db
{
    protected function loginUserModel()
    {
        $conn = $this->connect();
        $username = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $type = $_POST["type"];

        //Check for empty input
        if (empty($username) || empty($pwd)) {
            if (empty($type)){
                header("location: google.php");
            }
            header("location: loginscherm.php?error=emptyinput");
            exit();
        }

        //Check if the username or email exists
        $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            header("location: loginscherm.php?error=stmtfailed");
        }
        mysqli_stmt_bind_param($stmt, "ss", $username, $username);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        $uidExists;
        if ($row = mysqli_fetch_assoc($resultData)) {
            $uidExists = $row;
        } else {
            header("location: loginscherm.php?error=wronglogin");
            exit();
        }
        mysqli_stmt_close($stmt);

        $pwdHashed = $uidExists["usersPwd"];
        $checkPwd = password_verify($pwd, $pwdHashed);

        //Check if the password is correct
        if ($checkPwd === false) {
            header("location: loginscherm.php?error=wronglogin");
            exit();
        } //Start a session when everything is correct
        elseif ($checkPwd === true) {
            session_start();
            $_SESSION["userid"] = $uidExists["usersId"];
            $_SESSION["useruid"] = $uidExists["usersUid"];
            $_SESSION["userRole"] = $uidExists["usersRole"];
            header("location: dashboard.php");
            exit();
        }
    }

    protected function resetPasswordRequestModel()
    {
        //Make a unique URL for resetting the password
        $selector = bin2hex(openssl_random_pseudo_bytes(8));
        $token = openssl_random_pseudo_bytes(32);
        //URL needs to be changes according to the actual URL
        $url = "s649770.infhaarlem.nl/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
        $expires = date("U") + 1800;
        $conn = $this->connect();

        //Check if the email is valid
        $userEmail = $_POST["email"];
        if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            header("location: ../reset-password.php?reset=invalidemail");
            exit();
        }

        //Delete old password reset if there was one
        $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error!";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
        }

        //Insert new passwordreset token
        $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error!";
            exit();
        } else {
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        //Make the email that will be send
        $to = $userEmail;
        $subject = 'Reset your password for s649770.infhaarlem.nl';
        $message = '<p>We received a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email</p>';
        $message .= '<p>Here is your password reset link: </br>';
        $message .= '<a href="' . $url . '">' . $url . '</a></p>';

        $headers = "From: JohnBond <johnbond141@gmail.com>\r\n";
        $headers .= "Reply-To: johnbond141@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        mail($to, $subject, $message, $headers);

        header("Location: reset-password.php?reset=succes");

    }
    protected function resetPasswordModel()
    {
        $selector = $_POST["selector"];
        $validator = $_POST["validator"];
        $password = $_POST["pwd"];
        $passwordRepeat = $_POST["pwd-repeat"];
        $conn = $this->connect();

        //validate the new password
        if (empty($password) || empty($passwordRepeat)) {
            header("Location: loginscherm.php");
            exit();
        } elseif ($password != $passwordRepeat) {
            header("Location: loginscherm.php");
            exit();
        }
        $currentDate = date("U");

        //Check if the user is still allowed to change their password and if so, change their password
        $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            echo "There was an error!";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            if (!$row = mysqli_fetch_assoc($result)) {
                echo "You need to re-submit your reset request.";
                exit();
            } else {
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

                if ($tokenCheck === false) {
                    echo "You need to re-submit your reset request.";
                    exit();
                } elseif ($tokenCheck === true) {
                    $tokenEmail = $row['pwdResetEmail'];
                    $sql = "SELECT * FROM users WHERE usersEmail=?;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)){
                        echo "There was an error!";
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if (!$row = mysqli_fetch_assoc($result)) {
                            echo "There was an error!";
                            exit();
                        } else {
                            $sql = "UPDATE users SET usersPwd=? WHERE usersEmail=?";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)){
                                echo "There was an error!";
                                exit();
                            } else {
                                $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                                mysqli_stmt_execute($stmt);

                                $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                                $stmt = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    echo "There was an error";
                                    exit();
                                } else {
                                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    header("Location: loginscherm.php?newpwd=passwordupdated");
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    protected function getAllUsers($selected){
        $conn = $this->connect();
        $result = $conn->query("SELECT * FROM users WHERE usersRole$selected ORDER BY usersRegistration");
        return $result;
    }
    protected function getUserEditData(){
        $conn = $this->connect();
        $id = $_GET['editUser'];
        $result = $conn->query("SELECT * FROM users WHERE usersId=$id");
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    protected function userUpdate(){
        $conn = $this->connect();
        $id = $_POST['id'];
        $result = $conn->query("SELECT usersRole FROM users where usersId=$id");
        $row = mysqli_fetch_assoc($result);
        $role = $row['usersRole'];
        $currentRole = $_POST['currentRole'];
        $fullName = $_POST['fullName'];
        $email = $_POST['e-mail'];
        $username = $_POST['username'];
        if ($currentRole == 1){
            $role = $_POST['role'];
        }
        $conn->query("UPDATE users SET usersName='$fullName', usersEmail='$email', usersUid='$username', usersRole=$role WHERE usersId=$id") or die("Query failed: " . mysqli_connect_error());

        header("location: manage-users.php");
    }
    protected function userDelete(){
        $conn = $this->connect();
        $id = $_POST['id'];
        $conn->query("DELETE FROM users WHERE usersId=$id");


        header("location: manage-users.php");
    }
    protected function userAdd(){
        $conn = $this->connect();
        $name = $_POST["fullName"];
        $email = $_POST["e-mail"];
        $currentRole = $_POST['currentRole'];
        $username = $_POST["username"];
        $pwd = $_POST["password"];
        $pwdRepeat = $_POST["passwordRepeat"];
        $role = 3;
        if ($currentRole == 1) {
            $role = $_POST["role"];
        }
        //Check for empty input
        if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
            header("location: manage-users.php?error=emptyinput");
            exit();
        }
        //Check if the username is valid
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
        {
            header("location: manage-users?error=invaliduid");
            exit();
        }
        //Check if the email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            header("location: manage-users?error=invalidemail");
            exit();
        }
        //Check if the password has been typed in correctly
        if ($pwd !== $pwdRepeat)
        {
            header("location: manage-users?error=passwordsdontmatch");
            exit();
        }
        //Check if the username has already been used
        $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql))
        {
            header("location: manage-users?error=stmtfailed");
        }
        mysqli_stmt_bind_param($stmt, "ss", $username, $username);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData))
        {
            header("location: manage-users?error=usernametaken");
            exit();
        }

        mysqli_stmt_close($stmt);
        //Check if the input is to long for security reasons
        if (strlen($name) > 35 || strlen($email) > 35 || strlen($username) > 35 || strlen($pwd) > 35 || strlen($pwdRepeat) > 35) {
            header("location: manage-users?error=inputtolong");
            exit();
        }
        //If everything is correct, make the account and automatically save the registration date
        $registrationDate = date("Y-m-d");
        $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, usersRegistration, usersRole) VALUES (?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql))
        {
            header("location: manage-users?error=stmtfailed");
        }
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);



        mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $username, $hashedPwd, $registrationDate, $role);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: manage-users?error=none");
        exit();
    }
    protected function userAddImage(){
        $statusMsg = '';
        $backlink = ' <a href="img-library.php">Go back</a>';
        $targetDir = 'img/';
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (isset($_POST["uploadImage"]) && !empty($_FILES["file"]["name"])){
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
            if (!file_exists($targetFilePath)){
                if (in_array($fileType, $allowTypes)) {
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                            header("Location: img-library.php");
                    } else {
                        $statusMsg = 'Sorry, there was an error uploading your file' .$backlink;
                    }
                } else {
                    $statusMsg = 'Sorry only JPG, JPEG, GIF & PDF files are allowed to upload' .$backlink;
                }
            } else {
                $statusMsg = 'That file already exists, please try another file!' .$backlink;
            }
        } else {
            $statusMsg = 'Please select a file to upload!' .$backlink;
        }
        echo $statusMsg;
    }
    protected function userDeleteImage(){
        $image = $_POST["id"];
        $path = "img/" . $image;
        unlink($path);
        header("Location: img-library.php");
    }
    protected function getAllOrders(){
        $conn = $this->connect();
        $result = $conn->query("SELECT * FROM orders");
        return $result;
    }
    protected function userDeleteOrder(){
        $conn = $this->connect();
        $id = $_POST['id'];
        $conn->query("DELETE FROM orders WHERE orderID=$id");
        header("Location: cms-testpayment.php");
    }
}
