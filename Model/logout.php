<?php
//Ending the session when logging out
session_start();
session_unset();
session_destroy();
header("location: ../loginscherm.php");
exit();