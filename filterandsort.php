<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <title>Filter and sort</title>
</head>
<body>

<form method="GET" id="filterForm" class="filterForm">
    <h2>Filter & Sort</h2>
    <input type="text" name="sort" placeholder="Sort: title, author, date" value="<?= $_GET['sort'] ?? '' ?>">

    <input type="text" name="genre" placeholder="Genre" value="<?= $_GET['genre'] ?? '' ?>">

    <input type="text" name="pages" placeholder="Pages (e.g. >300)" value="<?= $_GET['pages'] ?? '' ?>">

    <input type="month" name="readMonth" value="<?= $_GET['readMonth'] ?? '' ?>">

    <input type="submit" value="Filter">
</form> 



</body>
</html>