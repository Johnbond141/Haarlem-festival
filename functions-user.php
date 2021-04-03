<?php
require_once 'Controller/UserController.php';
$userContr = new UserController();

if (isset($_POST['updateUser'])){
    $userContr->userUpdateContr();
}
if (isset($_POST['deleteUser'])){
    $userContr->userDeleteContr();
}
if (isset($_POST['saveUser'])){
    $userContr->userAddContr();
}
if (isset($_POST['uploadImage'])){
    $userContr->userAddImageContr();
}
if (isset($_POST['deleteImage'])){
    $userContr->userDeleteImageContr();
}
if (isset($_POST['user-delete-order'])){
    $userContr->userDeleteOrderContr();
}



