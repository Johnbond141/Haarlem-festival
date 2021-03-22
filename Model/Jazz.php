<?php
require_once 'DAL/Db.php';
class Jazz extends Db
{
    public function GetDataJazzAgenda($selectedDay){
        $conn = $this->connect();
        $result = $conn->query("SELECT * FROM jazz_agenda WHERE Day='$selectedDay' ORDER BY Time");
        return $result;
    }
    public function GetJazzEditData(){
        $conn = $this->connect();
        $id = $_GET['edit'];
        $result = $conn->query("SELECT * FROM jazz_agenda WHERE performance_Id=$id");
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    public function DeleteJazzAgenda(){
        $conn = $this->connect();
        $id = $_POST['id'];
        $conn->query("DELETE FROM jazz_agenda WHERE performance_Id=$id");


        header("location: jazz-agenda.php");
    }
    public function UpdateJazzAgenda(){
        $conn = $this->connect();
        $id = $_POST['id'];
        $band = $_POST['band'];
        $location = $_POST['location'];
        $hall = $_POST['hall'];
        $date = $_POST['date'];
        $day = $_POST['day'];
        $time = $_POST['time'];
        $seats = $_POST['seats'];
        $price = $_POST['price'];

        $conn->query("UPDATE jazz_agenda SET Band='$band', Location='$location', Hall='$hall', Date='$date', Day='$day', Time='$time', Seats='$seats', Price='$price' WHERE performance_Id=$id");

        header("location: jazz-agenda.php");
    }
    public function AddJazzAgenda(){
        $conn = $this->connect();
        $band = $_POST['band'];
        $location = $_POST['location'];
        $hall = $_POST['hall'];
        $date = $_POST['date'];
        $day = $_POST['day'];
        $time = $_POST['time'];
        $seats = $_POST['seats'];
        $price = $_POST['price'];

        $conn->query("INSERT INTO jazz_agenda (Band, Location, Hall, Date, Day, Time, Seats, Price ) 
                        VALUES ('$band', '$location', '$hall', '$date', '$day', '$time', '$seats', '$price')");


        header("location: jazz-agenda.php");
    }
}