<?php
require 'DAL/Db.php';

class Jazz extends Db
{
    function get_all_data_thursday($day)
    {
        $conn = $this->connect();
        $result = mysqli_query($conn, "SELECT * FROM jazz_agenda WHERE Day = '$day'");
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                echo '
            <section id="overlay">
                <section class="main">
                    <p class="sign" align="center">Change performance</p>
                    <form class="form1">
                        <input name="Band" class="un" type="text" align="center" value="'.$row['Band'].'">
                        <input name="Location" class="un" type="text" align="center" value="'.$row['Location'].'">
                        <input name="Hall" class="un" type="text" align="center" value="'.$row['Hall'].'">
                        <input name="Time" class="un" type="text" align="center" value="'.$row['Time'].'">
                        <input name="Date" class="un" type="text" align="center" value="'.$row['Date'].'">
                        <button class="submit" style="margin-left: 18%; margin-bottom: 5%" name="exit" onclick="overlayOff()">Exit</button>
                        <button class="submit" align="center" name="save">Save</button>
                    </form>
                </section>
            </section>
            <article class="info-wrapper">
                <h2>' . $row['Band'] . '</h2>
                <p>' . $row['Location'] . ', ' . $row['Hall'] . '</p>
                <p>' . $row['Time'] . ', ' . $row['Date'] . '</p>
                <img src="img/edit.png" class="edit-icon" name="'.$row['Band'].'" onclick="overlayOn()">
            </article>
            <script>
                function overlayOn(){
                    document.getElementById("overlay").style.display = "block";
                }
                function overlayOff(){
                    document.getElementById("overlay").style.display = "none";
                }
            </script>
            ';
            }

        } else {
            "<h3>Our database is not working</h3>";
        }
    }
}
