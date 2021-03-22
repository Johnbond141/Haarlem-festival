<?php
require_once 'Controller/JazzController.php';
$jazzContr = new JazzController();

if (isset($_POST['jazz-update'])){
    $jazzContr->jazzAgendaUpdateContr();
}
if (isset($_POST['jazz-save'])){
    $jazzContr->jazzAgendaAddContr();
}
if (isset($_POST['jazz-delete'])){
    $jazzContr->jazzAgendaDeleteContr();
}