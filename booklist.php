<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Neles Bookshelf</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<h1>Neles Bookshelf</h1>

<form action="" method="POST">
    <h2>Add a book</h2>
    <p>Title</p><input type="text" name="title" value=""><br>
    <p>Author</p><input type="text" name="author" value=""><br>
    <p>Date</p><input type="date" name="date" value=""><br>
    <p>Notes</p><input type="text" name="notes" value=""><br>
    <label for="rating"><p>Rating</p></label>
        <select name="rating" id="rating">
            <option value=" "> </option>
            <option value="1">★</option>
            <option value="2">★★</option>
            <option value="3">★★★</option>
            <option value="4">★★★★</option>
            <option value="5">★★★★★</option>
        </select><br>
    <p>Image-URL:</p><input type="text" name="image" value=""><br>
    <input type="submit" value="Save book">
</form>

<h2>Read Books</h2>

<?php
include("bookfunctions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["title"]) && !empty($_POST["author"])) {
        writeBook($_POST["title"], $_POST["author"], $_POST["date"], $_POST["notes"], $_POST["rating"], $_POST["image"]);
        header("Location: " . $_SERVER['PHP_SELF']); // reload same page to clear form - PHP_SELF means samepage
        exit(); // end script, so data is not saved again
        }
        
    }

showBooks("books.txt");
?>


</body>
</html>