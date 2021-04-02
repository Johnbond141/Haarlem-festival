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
    public function dancePagesGetAll(){
        $conn = $this->connect();
        $result = $conn->query("SELECT * FROM pages WHERE type='dance'");
        return $result;

    }
    public function dancePagesGetOne($pageId){
        $conn = $this->connect();
        $result = $conn->query("SELECT * FROM pages WHERE page_id=$pageId");
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    public function GetDancePageEditData(){
        $conn = $this->connect();
        $pageId = $_GET['edit'];
        $result = $conn->query("SELECT * FROM pages WHERE page_id=$pageId");
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    public function UpdateDancePage(){
        $conn = $this->connect();
        $id = $_POST['id'];
        $name = $_POST['name'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $paragraph1 = $_POST['paragraph1'];
        $paragraph2 = $_POST['paragraph2'];
        $paragraph3 = $_POST['paragraph3'];

        $conn->query("UPDATE pages SET name='$name', title='$title', subtitle='$subtitle', paragraph1='$paragraph1', paragraph2='$paragraph2', paragraph3='$paragraph3' WHERE page_id=$id");

        header("location: dance-pages.php");
    }
    public function AddDancePage(){
        $conn = $this->connect();
        $name = $_POST['name'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $paragraph1 = $_POST['paragraph1'];
        $paragraph2 = $_POST['paragraph2'];
        $paragraph3 = $_POST['paragraph3'];

        $conn->query("INSERT INTO pages (name, type, title, subtitle, paragraph1, paragraph2, paragraph3 ) 
                        VALUES ('$name', 'dance', '$title', '$subtitle', '$paragraph1', '$paragraph2', '$paragraph3')");

        header("location: dance-pages.php");
    }
    public function DeleteDancePage(){
        $conn = $this->connect();
        $id = $_POST['id'];
        $conn->query("DELETE FROM pages WHERE page_id=$id");

        header("location: dance-pages.php");
    }
}
