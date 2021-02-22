<?php
require 'Model/User.php';
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

}
