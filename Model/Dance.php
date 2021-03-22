<?php
require_once 'DAL/Db.php';
class Dance extends Db
{
    public function GetDataDanceAgenda($selectedDay){
        $conn = $this->connect();
        $result = $conn->query("SELECT * FROM dance_agenda WHERE Day='$selectedDay' ORDER BY Time");
        return $result;
    }
    public function GetDanceEditData(){
        $conn = $this->connect();
        $id = $_GET['edit'];
        $result = $conn->query("SELECT * FROM dance_agenda WHERE performance_Id=$id");
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    public function DeleteDanceAgenda(){
        $conn = $this->connect();
        $id = $_POST['id'];
        $conn->query("DELETE FROM dance_agenda WHERE performance_Id=$id");


        header("location: dance-agenda.php");
    }
    public function UpdateDanceAgenda(){
        $conn = $this->connect();
        $id = $_POST['id'];
        $artist = $_POST['artist'];
        $venue = $_POST['venue'];
        $session = $_POST['session'];
        $date = $_POST['date'];
        $day = $_POST['day'];
        $time = $_POST['time'];
        $duration = $_POST['duration'];
        $tickets = $_POST['tickets'];
        $price = $_POST['price'];

        $conn->query("UPDATE dance_agenda SET Artist='$artist', Venue='$venue', Session='$session', Date='$date', Day='$day', Time='$time', Duration='$duration', Tickets='$tickets', Price='$price' WHERE performance_Id=$id");

        header("location: dance-agenda.php");
    }
    public function AddDanceAgenda(){
        $conn = $this->connect();
        $artist = $_POST['artist'];
        $venue = $_POST['venue'];
        $session = $_POST['session'];
        $date = $_POST['date'];
        $day = $_POST['day'];
        $time = $_POST['time'];
        $duration = $_POST['duration'];
        $tickets = $_POST['tickets'];
        $price = $_POST['price'];

        $conn->query("INSERT INTO dance_agenda (Artist, Venue, Session, Date, Day, Time, Duration, Tickets, Price ) 
                        VALUES ('$artist', '$venue', '$session', '$date', '$day', '$time', '$duration', '$tickets', '$price')");


        header("location: dance-agenda.php");
    }
}
