<?php

session_start(); // session is a saving-space where data is kept between different page-loads 
$pdo = new PDO('mysql:host=localhost;dbname=nelesbooks', 'root', ''); // connects to database

 
if ($_SERVER["REQUEST_METHOD"] == "POST") { // only gets activated when form is being sent
    // Check if values exist in POST array
    if (isset($_POST['username']) && isset($_POST['profileName'] && isset($_POST['pw']) && isset($_POST['email']) {
        $username = $_POST['username']; // get username from form
        $pswd = $_POST['pw']; // get password from form
        
        $sqlRegisterRequest = $pdo->prepare("INSERT INTO user (username, profileName, pswd, email) VALUES (?,?,?,?)"); // prepare SQL Request with placeholders
        $sqlRegisterRequest->execute([$username, $profileName, $pswd, $email]); // execute prepared SQL Request with inputs from form via Post (defined in variables)
        $newUser = $sqlRegisterRequest->fetch(); // gets result of SQL request
        
        if ($newUser) { // check if user exists with the password
            $error = "Username already exists"
        } else {
            $_SESSION['username'] = $user['username']; // remember user
            $_SESSION['authenticated'] = true; // gett access to addbook.php
            header("Location: ./addbook.php"); // enter page 
            exit; // stops php script to avoid errors through further code
        }
    } else {
        $error = "Please try again.";
    }
}

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<form method="post" action="" id="registrationForm">
    <h2>Login</h2>
    <input type="text" name="username" placeholder="Username">
    <input type="text" name="profileName" placeholder="Name">
    <input type="password" name="pw" placeholder="Password">
    <!--<input type="password" name="pwRep" placeholder="Repeat Password">-->
    <input type="email" name="email" placeholder="E-Mail Adress">
    <input type="submit" value="Login">
</form>

<?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>

</body>
</html>
