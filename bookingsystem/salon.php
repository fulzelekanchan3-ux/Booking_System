<?php
include 'config.php';

if(isset($_POST['book'])){
    $name = $_POST['name'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $conn->query("INSERT INTO bookings(type,service,date,time,status)
    VALUES('Salon','$service','$date','$time','Booked')");
    
    $msg = "Salon Booking Successful!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Salon Booking</title>

<style>
body {
    background: linear-gradient(135deg,#ff9a9e,#fad0c4);
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
    text-align: center;
}
input, select {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
}
button {
    width: 100%;
    padding: 10px;
    background: #ff758c;
    border: none;
    color: white;
    border-radius: 20px;
}
</style>

</head>
<body>

<div class="container">
<h2>Salon Booking</h2>

<?php if(isset($msg)) echo $msg; ?>

<form method="post">
<input type="text" name="name" placeholder="Your Name" required>

<select name="service">
<option>Haircut</option>
<option>Facial</option>
<option>Hair Spa</option>
</select>

<input type="date" name="date" required>
<input type="time" name="time" required>

<button name="book">Book Now</button>
</form>
</div>

</body>
</html>