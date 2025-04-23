<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <title>Add Book</title>
</head>
<body>

<?php 
include("header.php");
?>

<div class="formContainer">
    <form action="" method="POST">
        <h2>Add a book</h2>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>

        <label for="author">Author:</label>
        <input type="text" name="author" id="author" required><br>

        <label for="date">Date:</label>
        <input type="date" name="date" id="date"><br>

        <label for="notes">Notes:</label>
        <textarea name="notes" id="notes" rows="4" cols="50"></textarea><br>

        <label for="rating">Rating:</label>
        <select name="rating" id="rating">
            <option value=" "> </option>
            <option value="1">★</option>
            <option value="2">★★</option>
            <option value="3">★★★</option>
            <option value="4">★★★★</option>
            <option value="5">★★★★★</option>
        </select><br>

        <label for="image">Image-URL:</label>
        <input type="text" name="image" id="image"><br>

        <input type="submit" value="Save book">
    </form>
</div>

<?php 
include("bookfunctions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["title"]) && !empty($_POST["author"])) {
        writeBook($_POST["title"], $_POST["author"], $_POST["date"], $_POST["notes"], $_POST["rating"], $_POST["image"]);
        header("Location: " . $_SERVER['PHP_SELF']); // reload same page to clear form - PHP_SELF means samepage
        exit(); // end script, so data is not saved again
        }
        
    }
?>
</body>
</html>