<?php
require_once 'Model/User.php';
class UserController extends User{
    public function loginUserContr()
    {
        if (isset($_POST["submit"])){
            $this->loginUserModel();
        } else {
            header("Location: index.php");
            exit();
        }
    }
    public function resetPasswordRequestContr()
    {
        if (isset($_POST["reset-request-submit"])){
            $this->resetPasswordRequestModel();
        } else {
            header("location: index.php");
        }
    }
    //Controller for actually resetting the password
    public function resetPasswordContr()
    {
        if (isset($_POST["reset-password-submit"])){
            $this->resetPasswordModel();
        } else {
            header("location: index.php");
        }
    }
}
