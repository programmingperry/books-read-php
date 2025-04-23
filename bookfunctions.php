<?php 

function writeBook($title, $author, $date, $notes, $rating, $image) {
    $datei = fopen("books.txt", "a");
    $zeile = $title . ";" . $author . ";" . $date . ";" . $notes . ";" . $rating . ";" . $image . "\n";
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
                list($title, $author, $date, $notes, $rating, $image) = explode(";", $line);
                echo '<div class="book-card">';
                echo "<img src=\"$image\" alt=\"Cover of $title\">";
                echo "<h3>$title</h3>";
                echo "<h4>$author</h4>";
                echo "<p>$date</p>";
                echo "<p>$notes</p>";
                echo "<p class='stars'>" . str_repeat("★", intval($rating)) . "</p>";
                echo '</div>';
            }
        }
        echo '</div>';

        fclose($file); 
    }
}
