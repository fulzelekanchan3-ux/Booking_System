<?php
include 'config.php';

if(isset($_POST['book'])){
    $name = $_POST['name'];
    $event = $_POST['event'];
    $date = $_POST['date'];

    $conn->query("INSERT INTO bookings(type,service,date,status)
    VALUES('Event','$event','$date','Booked')");
    
    $msg = "Event Reserved!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Event Booking</title>

<style>
body {
    background: linear-gradient(135deg,#f7971e,#ffd200);
    font-family: Poppins;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.container {
    background: white;
    padding: 30px;
    border-radius: 15px;
    width: 350px;
}
input, select {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
}
button {
    width: 100%;
    padding: 10px;
    background: #f7971e;
    color: white;
    border: none;
    border-radius: 20px;
}
</style>

</head>
<body>

<div class="container">
<h2>Event Reservation</h2>

<?php if(isset($msg)) echo $msg; ?>

<form method="post">
<input type="text" name="name" placeholder="Your Name" required>

<select name="event">
<option>Wedding</option>
<option>Birthday Party</option>
<option>Conference</option>
</select>

<input type="date" name="date" required>

<button name="book">Reserve Now</button>
</form>
</div>

</body>
</html>