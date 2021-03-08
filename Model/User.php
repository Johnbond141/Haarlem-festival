<?php
require 'DAL/Db.php';
require 'View/UserView.php';
class User extends Db
{
    protected function loginUserModel()
    {
        $conn = $this->connect();
        $username = $_POST["uid"];
        $pwd = $_POST["pwd"];

        //Check for empty input
        if (empty($username) || empty($pwd)) {
            header("location: index.php?error=emptyinput");
            exit();
        }

        //Check if the username or email exists
        $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            header("location: index.php?error=stmtfailed");
        }
        mysqli_stmt_bind_param($stmt, "ss", $username, $username);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        $uidExists;
        if ($row = mysqli_fetch_assoc($resultData)) {
            $uidExists = $row;
        } else {
            header("location: index.php?error=wronglogin");
            exit();
        }
        mysqli_stmt_close($stmt);

        $pwdHashed = $uidExists["usersPwd"];
        $checkPwd = password_verify($pwd, $pwdHashed);

        //Check if the password is correct
        if ($checkPwd === false) {
            header("location: index.php?error=wronglogin");
            exit();
        } //Start a session when everything is correct
        elseif ($checkPwd === true) {
            session_start();
            $_SESSION["userid"] = $uidExists["usersId"];
            $_SESSION["useruid"] = $uidExists["usersUid"];
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
            header("Location: index.php");
            exit();
        } elseif ($password != $passwordRepeat) {
            header("Location: index.php");
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
                                    header("Location: index.php?newpwd=passwordupdated");
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
