<?php

$jazzContr = new JazzController();
if (isset($_POST['update'])){
    $jazzContr->jazzAgendaUpdateContr();

}
if (isset($_POST['save'])){
    $jazzContr->jazzAgendaAddContr();
}
if (isset($_GET['delete'])){
    $jazzContr->jazzAgendaDeleteContr();
}
