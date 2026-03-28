<?php
include 'config.php';

if(isset($_POST['book'])){
    $name = $_POST['name'];
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];

    $conn->query("INSERT INTO bookings(type,service,date,status)
    VALUES('Doctor','$doctor','$date','Booked')");
    
    $msg = "Appointment Booked!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Doctor Appointment</title>

<style>
body {
    background: linear-gradient(135deg,#43cea2,#185a9d);
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
    background: #185a9d;
    color: white;
    border: none;
    border-radius: 20px;
}
</style>

</head>
<body>

<div class="container">
<h2>Doctor Appointment</h2>

<?php if(isset($msg)) echo $msg; ?>

<form method="post">
<input type="text" name="name" placeholder="Your Name" required>

<select name="doctor">
<option>Dr. Sharma</option>
<option>Dr. Patel</option>
<option>Dr. Singh</option>
</select>

<input type="date" name="date" required>

<button name="book">Book Appointment</button>
</form>
</div>

</body>
</html>