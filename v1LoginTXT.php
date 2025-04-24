<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['pw'] === 'passwort123') {
        $_SESSION['authenticated'] = true;
        header("Location: addbook.php");
        exit();
    } else {
        $error = "Wrong Password!";
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
    <input type="text" name="pw" placeholder="Username">
    <input type="password" name="pw" placeholder="Password">
    <input type="submit" value="Login">
</form>

<?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>

</body>
</html>
