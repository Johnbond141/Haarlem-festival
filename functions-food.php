<?php

require_once 'Controller/FoodController.php';
$foodContr = new FoodController();

if (isset($_POST['food-update'])){
    $foodContr->foodAgendaUpdateContr();
}
if (isset($_POST['food-save'])){
    $foodContr->foodAgendaAddContr();
}
if (isset($_POST['food-delete'])){
    $foodContr->foodAgendaDeleteContr();
}
if (isset($_POST['food-update-page'])){
    $foodContr->foodPagesUpdateContr();
}
if (isset($_POST['food-save-page'])){
    $foodContr->foodPagesAddContr();
}
if (isset($_POST['food-delete-page'])){
    $foodContr->foodPagesDeleteContr();
}