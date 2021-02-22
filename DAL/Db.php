<?php
class Db{
    //The only connection to the database
    protected function connect()
    {
        $serverName = "localhost";
        $dBUsername = "root";
        $dBPassword = "";
        $dBName = "s649770_db";
        $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $conn;


    }
}