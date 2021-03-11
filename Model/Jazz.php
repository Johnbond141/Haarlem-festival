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
            <article class="info-wrapper">
                <h2>' . $row['Band'] . '</h2>
                <p>' . $row['Location'] . ', ' . $row['Hall'] . '</p>
                <p>' . $row['Time'] . ', ' . $row['Date'] . '</p>
            </article>
            ';
            }

        } else {
            "<h3>Our database is not working</h3>";
        }
    }
}
