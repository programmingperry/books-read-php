<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Neles Bookshelf</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<?php 
include("header.php");
?>



<div class="book-list">
    <h2>Read Books</h2>

    <?php
    include("bookfunctions.php");
    showBooks("books.txt");
    ?>
</<div>

</body>
</html>