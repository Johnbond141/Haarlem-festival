<?php
require_once 'DAL/Db.php';
class Food extends Db
{
    public function GetDataFoodAgenda(){
        $conn = $this->connect();
        $result = $conn->query("SELECT * FROM food_agenda");
        return $result;
    }
    public function GetFoodEditData(){
        $conn = $this->connect();
        $id = $_GET['edit'];
        $result = $conn->query("SELECT * FROM food_agenda WHERE restaurant_Id=$id");
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    public function DeleteFoodAgenda(){
        $conn = $this->connect();
        $id = $_POST['id'];
        $conn->query("DELETE FROM food_agenda WHERE restaurant_Id=$id");


        header("location: food-agenda.php");
    }
    public function UpdateFoodAgenda(){
        $conn = $this->connect();
        $id = $_POST['id'];
        $restaurant = $_POST['restaurant'];
        $address = $_POST['address'];
        $sessions = $_POST['sessions'];
        $duration = $_POST['duration'];
        $firstSession = $_POST['firstSession'];
        $stars = $_POST['stars'];
        $seats = $_POST['seats'];
        $price = $_POST['price'];
        $reducedPrice = $_POST['reducedPrice'];
        $type = $_POST['type'];

        $conn->query("UPDATE food_agenda SET Restaurant='$restaurant', Adres='$address', sessions='$sessions', Duration='$duration', first_session='$firstSession', Stars='$stars', Seats='$seats', Price='$price', ReducedPrice='$reducedPrice', Type='$type' WHERE restaurant_Id=$id");

        header("location: food-agenda.php");
    }
    public function AddFoodAgenda(){
        $conn = $this->connect();
        $restaurant = $_POST['restaurant'];
        $address = $_POST['address'];
        $sessions = $_POST['sessions'];
        $duration = $_POST['duration'];
        $firstSession = $_POST['firstSession'];
        $stars = $_POST['stars'];
        $seats = $_POST['seats'];
        $price = $_POST['price'];
        $reducedPrice = $_POST['reducedPrice'];
        $type = $_POST['type'];

        $conn->query("INSERT INTO food_agenda (Restaurant, Adres, sessions, Duration, first_session, Stars, Seats, Price, ReducedPrice, Type ) 
                        VALUES ('$restaurant', '$address', '$sessions', '$duration', '$firstSession', '$stars', '$seats', '$price', '$reducedPrice', '$type')");


        header("location: food-agenda.php");
    }
}