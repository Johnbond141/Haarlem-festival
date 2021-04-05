<?php
class UserView {
    //Show feedback for logging in
    public function showLogin(){
        if (isset($_GET["error"])){
            if ($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
            }
            elseif ($_GET["error"] == "wronglogin"){
                echo "<p>Incorrect login information!</p>";
            }
        }
        if (isset($_GET["newpwd"])) {
            if ($_GET["newpwd"] == "passwordupdated") {
                echo '<p>Your password has been reset!</p>';
            }
        }
    }
    //Show feedback for requesting password reset
    public function showResetPasswordRequest(){
        if (isset($_GET["reset"])) {
            if ($_GET["reset"] == "invalidemail") {
                echo '<p>Invalid email, try again</p>';
            }
            if ($_GET["reset"] == "succes") {
                echo '<p>Check your e-mail!</p>';
            }
        }
    }
    //Show feedback for signing in
    public function showSignUp()
    {
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields!</p>";
            } elseif ($_GET["error"] == "invaliduid") {
                echo "<p>Choose a proper username!</p>";
            } elseif ($_GET["error"] == "invalidemail") {
                echo "<p>Choose a proper email!</p>";
            } elseif ($_GET["error"] == "passwordsdontmatch") {
                echo "<p>Passwords doesn't match!</p>";
            } elseif ($_GET["error"] == "stmtfailed") {
                echo "<p>something went wrong, try again!</p>";
            } elseif ($_GET["error"] == "usernametaken") {
                echo "<p>Username already taken!</p>";
            } elseif ($_GET["error"] == "inputtolong") {
                echo "<p>Input to long!</p>";
            } elseif ($_GET["error"] == "none") {
                echo "<p>You have signed up!</p>";
            }
        }
    }
}