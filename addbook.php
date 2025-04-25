<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header("Location: ./login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        <label for="date">Date started:</label>
        <input type="date" name="dateStart" id="dateStart"><br>

        <label for="date">Date finished:</label>
        <input type="date" name="dateFin" id="dateFin"><br>

        <label for="edition">Edition:</label>
        <select name="edition" id="edition">
            <option value="eBook">E-Book</option>
            <option value="audio">Audio-Book</option>
            <option value="physicalBook">Physical</option>
        </select><br>

        <label for="aquired">Aquired:</label>
        <select name="aquired" id="aquired">
            <option value="owned">owned</option>
            <option value="library">Library</option>
        </select><br>

        <label for="pages">Length Pages:</label>
        <input type="number" id="pages" name="pages" min="1"><br>

        <label for="hours">Length Hours:</label>
        <input type="time" id="hours" name="hours" min="00:00"><br>

        <label for="published">Year published:</label>
        <input type="number" id="published" name="published" min="1500"><br>

        <label for="genres">Genre/s:</label>
        <select name="genres[]" id="genres" multiple>
        <option value="Fantasy">Fantasy</option>
        <option value="Sci-Fi">Sci-Fi</option>
        <option value="Drama">Drama</option>
        <option value="Non-Fiction">Non-Fiction</option>
        </select><br>

        <label for="customGenre">Add genre:</label>
        <input type="text" name="customGenre" id="customGenre" placeholder="Add Genre..."><br>
            <?php 
            $genres = isset($_POST['genres']) ? $_POST['genres'] : [];
            $customGenre = isset($_POST['customGenre']) ? trim($_POST['customGenre']) : '';
            
            if (!empty($customGenre)) {
                $genres[] = $customGenre; 
            }        
            ?>

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

        <label for="image">Cover Image-URL:</label>
        <input type="text" name="image" id="image"><br>

        <input type="submit" value="Save book">
    </form>
</div>

<?php 
include("bookfunctions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // mandatory
    if (!empty($_POST["title"]) && !empty($_POST["author"])) {


            // add Genre
            $genres = isset($_POST["genres"]) ? $_POST["genres"] : [];
            $customGenre = trim($_POST["customGenre"] ?? "");
            if (!empty($customGenre)) {
                $genres[] = $customGenre;
            }

            // Jetzt alle Werte sauber vorbereiten
            $title = $_POST["title"];
            $author = $_POST["author"];
            $dateStart = $_POST["dateStart"];
            $dateFin = $_POST["dateFin"];
            $edition = $_POST["edition"];
            $aquired = $_POST["aquired"];
            $pages = $_POST["pages"];
            $hours = $_POST["hours"];
            $published = $_POST["published"];
            $notes = $_POST["notes"];
            $rating = $_POST["rating"];
            $image = $_POST["image"];

            // Speichern
            writeBook($title, $author, $dateStart, $dateFin, $edition, $aquired, $pages, $hours, $published, $genres, $notes, $rating, $image);

            // Redirect zur gleichen Seite, um POST zu "vergessen"
            header("Location: " . $_SERVER["PHP_SELF"]);
            exit();
    }
}

?>
</body>
</html>