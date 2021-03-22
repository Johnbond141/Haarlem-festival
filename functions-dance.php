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