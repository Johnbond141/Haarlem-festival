<?php

require_once 'Controller/DanceController.php';
$danceContr = new DanceController();

if (isset($_POST['dance-update'])){
    $danceContr->danceAgendaUpdateContr();
}
if (isset($_POST['dance-save'])){
    $danceContr->danceAgendaAddContr();
}
if (isset($_POST['dance-delete'])){
    $danceContr->danceAgendaDeleteContr();
}
if (isset($_POST['dance-update-page'])){
    $danceContr->dancePagesUpdateContr();
}
if (isset($_POST['dance-save-page'])){
    $danceContr->dancePagesAddContr();
}
if (isset($_POST['dance-delete-page'])){
    $danceContr->dancePagesDeleteContr();
}
