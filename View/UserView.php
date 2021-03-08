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
}