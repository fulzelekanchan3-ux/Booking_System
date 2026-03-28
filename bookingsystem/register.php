<?php
include 'config.php';

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($name) && !empty($email) && !empty($password)){

        $check = $conn->query("SELECT * FROM users WHERE email='$email'");
        
        if($check->num_rows > 0){
            $error = "Email already registered!";
        } else {
            $conn->query("INSERT INTO users(name,email,password)
            VALUES('$name','$email','$password')");
            
            $success = "Registration Successful!";
        }
    } else {
        $error = "All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="style.css">

<style>

body {
    height: 100vh;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Center container */
.table-container {
    width: 420px;
    margin: 80px auto;
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

/* Table styling */
table {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

td {
    padding: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Inputs */
input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 6px;
}

/* Button */
button {
    width: 100%;
    padding: 12px;
    border: none;
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    color: white;
    border-radius: 25px;
    cursor: pointer;
}

/* Messages */
.msg {
    text-align: center;
    margin-bottom: 10px;
}

.success { color: green; }
.error { color: red; }

/* Title */
h2 {
    text-align: center;
    margin-bottom: 15px;
    color: #5a67ff;
}

</style>

</head>
<body>

<div class="table-container">

<h2>Register</h2>

<?php
if(isset($error)) echo "<p class='msg error'>$error</p>";
if(isset($success)) echo "<p class='msg success'>$success</p>";
?>

<form method="post">
<table>

<tr>
    <td>Full Name</td>
    <td><input type="text" name="name" required></td>
</tr>

<tr>
    <td>Email</td>
    <td><input type="email" name="email" required></td>
</tr>

<tr>
    <td>Password</td>
    <td><input type="password" name="password" required></td>
</tr>

<tr>
    <td colspan="2">
        <button name="register">Register</button>
    </td>
</tr>

<tr>
    <td colspan="2" style="text-align:center;">
        Already have an account? <a href="login.php">Login</a>
    </td>
</tr>

</table>
</form>

</div>

</body>
</html>