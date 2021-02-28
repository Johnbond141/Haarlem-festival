<?php
require 'DAL/Db.php';
    class User extends Db {
        protected function loginUserModel(){
            $conn = $this->connect();
            $username = $_POST["uid"];
            $pwd = $_POST["pwd"];

            //Check for empty input
            if (empty($username) || empty($pwd)){
                header("location: login.php?error=emptyinput");
                exit();
            }

            //Check if the username or email exists
            $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql))
            {
                header("location: login.php?error=stmtfailed");
            }
            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt);
            $uidExists;
            if ($row = mysqli_fetch_assoc($resultData))
            {
                $uidExists = $row;
            } else{
                header("location: login.php?error=wronglogin");
                exit();
            }
            mysqli_stmt_close($stmt);

            $pwdHashed = $uidExists["usersPwd"];
            $checkPwd = password_verify($pwd, $pwdHashed);

            //Check if the password is correct
            if ($checkPwd === false) {
                header("location: login.php?error=wronglogin");
                exit();
            }
            //Start a session when everything is correct
            elseif ($checkPwd === true){
                session_start();
                $_SESSION["userid"] = $uidExists["usersId"];
                $_SESSION["useruid"] = $uidExists["usersUid"];
                header("location: login.php");
                exit();
            }
        }
    }
