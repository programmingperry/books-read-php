<?php

session_start(); // session is a saving-space where data is kept between different page-loads 
$pdo = new PDO('mysql:host=localhost;dbname=nelesbooks', 'root', ''); // connects to database

 
if ($_SERVER["REQUEST_METHOD"] == "POST") { // only gets activated when form is being sent
    // Überprüfen, ob die Werte im POST-Array existieren
    if (isset($_POST['username']) && isset($_POST['pw'])) {
        $username = $_POST['username']; // get username from form
        $pswd = $_POST['pw']; // get password from form
        
        $sqlUserRequest = $pdo->prepare("SELECT username, pswd FROM user WHERE username = ? AND pswd = ?"); // prepare SQL Request with placeholders
        $sqlUserRequest->execute([$username, $pswd]); // execute prepared SQL Request with inputs from form via Post (defined in variables)
        $user = $sqlUserRequest->fetch(); // gets result of SQL request
        
        if ($user) { // check if user exists with the password
            $_SESSION['username'] = $user['username']; // remember user
            header("Location: ./addbook.php"); // enter page 
            exit; // stops php script to avoid errors through further code
        } else {
            $error = "Username or password are not correct.";
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

<?php include("header.php"); ?>

<form method="post" action="" id="passwordForm">
    <h2>Login</h2>
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="pw" placeholder="Password">
    <input type="submit" value="Login">
</form>

<?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>

</body>
</html>
