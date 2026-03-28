<?php
session_start();
include 'config.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();

        if($password == $user['password']){
            $_SESSION['user'] = $user['name'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Incorrect Password!";
        }
    } else {
        $error = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<style>

/* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body */
body {
    height: 100vh;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

/* Login Card */
.login-container {
    width: 350px;
    background: #ffffff;
    padding: 35px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    text-align: center;
}

/* Heading */
.login-container h2 {
    margin-bottom: 20px;
    color: #333;
}

/* Input fields */
input {
    width: 100%;
    padding: 12px;
    margin: 12px 0;
    border: 1px solid #ddd;
    border-radius: 8px;
    outline: none;
    transition: 0.3s;
}

input:focus {
    border-color: #4facfe;
}

/* Button */
button {
    width: 100%;
    padding: 12px;
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    border: none;
    color: white;
    border-radius: 25px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    opacity: 0.9;
}

/* Links */
a {
    text-decoration: none;
    color: #4facfe;
}

/* Message */
.msg {
    margin-bottom: 10px;
    font-size: 14px;
}

.error {
    color: red;
}

</style>

</head>
<body>

<div class="login-container">

    <h2>Login</h2>

    <?php
    if(isset($error)){
        echo "<p class='msg error'>$error</p>";
    }
    ?>

    <form method="post">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>

        <button name="login">Login</button>
    </form>

    <p style="margin-top:15px;">
        Don't have an account? <a href="register.php">Register</a>
    </p>

</div>

</body>
</html>