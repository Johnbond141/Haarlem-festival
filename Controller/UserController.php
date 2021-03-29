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
    public function getAllUsersContr($selected){
        $result = $this->getAllUsers($selected);
        return $result;
    }
    public function getUserEditDataContr(){
        $row = $this->getUserEditData();
        return $row;
    }
    public function userUpdateContr(){
        $this->userUpdate();
    }
    public function userDeleteContr(){
        $this->userDelete();
    }
    public function userAddContr(){
        $this->userAdd();
    }
    public function userAddImageContr(){
        $this->userAddImage();
    }
}
