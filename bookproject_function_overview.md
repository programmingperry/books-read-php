# Funktionen in booklist.php
|                                     **Code / Funktion** |                                              **Erklärung** |
|:--------------------------------------------------------|:-----------------------------------------------------------|
|                         `include("bookfunctions.php");` |                 Fügt die Datei mit den Buchfunktionen ein. |
|                `$\_SERVER["REQUEST\_METHOD"] == "POST"` |                   Prüft, ob das Formular abgesendet wurde. |
| `!empty($\_POST["title"]) && !empty($\_POST["author"])` |       Nur speichern, wenn Titel und Autor ausgefüllt sind. |
|                                        `writeBook(...)` |          Schreibt ein neues Buch in die `books.txt` Datei. |
|        `header("Location: " . $\_SERVER['PHP\_SELF']);` |             Lädt die Seite neu, um das Formular zu leeren. |
|                                               `exit();` | Beendet das Script, damit nichts doppelt gespeichert wird. |

# Funktionen in bookfunctions.php
|                                                 **Funktion** |                                                     **Zweck / Beschreibung** |
|:-------------------------------------------------------------|:-----------------------------------------------------------------------------|
| `writeBook($title, $author, $date, $notes, $rating, $image)` |   Öffnet `books.txt`, schreibt eine Zeile mit Buchinfos, schließt die Datei. |
|                                    `fopen("books.txt", "a")` |                                 Öffnet Datei im Anfügemodus ( `a` = append). |
|                                                `fwrite(...)` |                                Schreibt die vorbereitete Zeile in die Datei. |
|                                                `fclose(...)` |                                                   Schließt die Datei wieder. |
|                                       `showBooks($filename)` |                   Liest alle Bücher aus der Datei und zeigt sie als HTML an. |
|                                       `while (!feof($file))` |                                             Liest die Datei Zeile für Zeile. |
|                            `list(...) = explode(";", $line)` |                     Zerlegt eine Buchzeile in Einzelteile (Titel, Autor, …). |
|                          `str\_repeat("★", intval($rating))` |                                    Zeigt die Bewertung als Stern-Symbole an. |

