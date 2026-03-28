<?php
include 'config.php';

$result = $conn->query("SELECT * FROM bookings");

while($row = $result->fetch_assoc()){
    echo $row['service']." - ".$row['date']." - ".$row['status']."<br>";
}
?>