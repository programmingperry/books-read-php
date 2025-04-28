<?php 

function writeBook($title, $author, $dateStart, $dateFin, $edition, $aquired, $pages, $hours, $published, $genres, $notes, $rating, $image) {
    $datei = fopen("books.txt", "a");


    if (is_array($genres)) {
        $genres = implode(", ", $genres);
    }

    $zeile = $title . ";" .  $author . ";" .  $dateStart . ";" .  $dateFin . ";" .  $edition . ";" . $aquired . ";" . $pages . ";" .  $hours . ";" .  $published . ";" .  $genres . ";" .  $notes . ";" .  $rating . ";" .  $image . "\n";
    fwrite($datei, $zeile);
    fclose($datei);
}

function showBooks($filename) {
    if (file_exists($filename)) {
        $file = fopen($filename, "r");

        echo '<div class="book-grid">';
        while (!feof($file)) {
            $line = fgets($file);

            if (!empty(trim($line))) {
                list($title, $author, $dateStart, $dateFin, $edition, $aquired, $pages, $hours, $published, $genres, $notes, $rating, $image) = explode(";", $line);
                echo '<div class="book-card">';
                echo "<img src=\"$image\" alt=\"Cover of $title\">";
                echo "<h3>$title</h3>";
                echo "<h4>$author</h4>";
                echo "<p><span class=\"bookCardDescr\">Started: </span>$dateStart</p>";
                echo "<p><span class=\"bookCardDescr\">Finished: </span> $dateFin</p>";
                echo "<p><span class=\"bookCardDescr\">Format: </span> $edition</p>";
                echo "<p><span class=\"bookCardDescr\">Aquired: </span> $aquired</p>";
                echo "<p><span class=\"bookCardDescr\">Pages: </span> $pages</p>";
                echo "<p><span class=\"bookCardDescr\">Hours: </span> $hours</p>";
                echo "<p><span class=\"bookCardDescr\">Published: </span>$published</p>";
                echo "<p><span class=\"bookCardDescr\">Genres: </span>$genres</p>";
                echo "<p><span class=\"bookCardDescr\">Thoughts:<br></span>$notes</p>";
                echo "<p class='stars'>" . str_repeat("★", intval($rating)) . "</p>";
                echo '</div>';
            }
        }
        echo '</div>';

        fclose($file); 
    }

require_once 'class_Book.php'; 

function showBooksClass($filename) {
    if (file_exists($filename)) {
        $file = fopen($filename, "r");

        echo '<div class="book-grid">';

        while (!feof($file)) {
            $line = fgets($file);

            if (!empty(trim($line))) {
                list($title, $author, $dateStart, $dateFin, $edition, $aquired, $pages, $hours, $published, $genres, $notes, $rating, $image) = explode(";", $line);

                // ➔ Buch-Objekt erstellen
                $book = new Book($title, $author, $dateStart, $dateFin, $edition, $aquired, $pages, $hours, $published, $genres, $notes, $rating, $image);

                // ➔ Methode anzeigen() aufrufen
                $book->display();
            }
        }

        echo '</div>';

        fclose($file);
    }
}
