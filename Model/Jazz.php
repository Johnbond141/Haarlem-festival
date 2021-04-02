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
    public function jazzPagesGetAll(){
        $conn = $this->connect();
        $result = $conn->query("SELECT * FROM pages WHERE type='jazz'");
        return $result;

    }
    public function jazzPagesGetOne($pageId){
        $conn = $this->connect();
        $result = $conn->query("SELECT * FROM pages WHERE page_id=$pageId");
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    public function GetJazzPageEditData(){
        $conn = $this->connect();
        $pageId = $_GET['edit'];
        $result = $conn->query("SELECT * FROM pages WHERE page_id=$pageId");
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    public function UpdateJazzPage(){
        $conn = $this->connect();
        $id = $_POST['id'];
        $name = $_POST['name'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $paragraph1 = $_POST['paragraph1'];
        $paragraph2 = $_POST['paragraph2'];
        $paragraph3 = $_POST['paragraph3'];

        $conn->query("UPDATE pages SET name='$name', title='$title', subtitle='$subtitle', paragraph1='$paragraph1', paragraph2='$paragraph2', paragraph3='$paragraph3' WHERE page_id=$id");

        header("location: jazz-pages.php");
    }
    public function AddJazzPage(){
        $conn = $this->connect();
        $name = $_POST['name'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $paragraph1 = $_POST['paragraph1'];
        $paragraph2 = $_POST['paragraph2'];
        $paragraph3 = $_POST['paragraph3'];

        $conn->query("INSERT INTO pages (name, type, title, subtitle, paragraph1, paragraph2, paragraph3 ) 
                        VALUES ('$name', 'jazz', '$title', '$subtitle', '$paragraph1', '$paragraph2', '$paragraph3')");

        header("location: jazz-pages.php");
    }
    public function DeleteJazzPage(){
        $conn = $this->connect();
        $id = $_POST['id'];
        $conn->query("DELETE FROM pages WHERE page_id=$id");

        header("location: jazz-pages.php");
    }
}