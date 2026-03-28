<?php
include 'config.php';

if(isset($_POST['book'])){
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $conn->query("INSERT INTO bookings(service, date, time, status)
    VALUES('$service','$date','$time','Pending')");
}
?>

<form method="post">
<select name="service">
<option>Salon</option>
<option>Doctor</option>
<option>Event</option>
</select>

<input type="date" name="date" required>
<input type="time" name="time" required>

<button name="book">Book Now</button>
</form>