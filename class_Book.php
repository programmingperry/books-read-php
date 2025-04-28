<?php 
class Book {
    // Properties
    private $title;
    private $author;
    private $pages;
    private $startDate;
    private $finishDate;
    private $format;
    private $aquired;
    private $notes;
    private $rating;
    private $image;

    // Constructor 
    public function __construct($title, $author, $pages, $startDate, $finishDate, $format, $aquired, $notes, $rating, $image) {
        $this->title = $title;
        $this->author = $author;
        $this->pages = $pages;
        $this->startDate = $startDate;
        $this->finishDate = $finishDate;
        $this->format = $format;
        $this->aquired = $aquired;
        $this->notes = $notes;
        $this->rating = $rating;
        $this->image = $image;
    }

    // Funktionen
    public function display() {
        echo '<div class="book-card">';
        echo "<img src=\"$this->image\" alt=\"Cover of $this->titel\">";
        echo "<h3>$this->titel</h3>";
        echo "<h4>$this->autor</h4>";
        echo "<p><span class=\"bookCardDescr\">Started: </span>$this->dateStart</p>";
        echo "<p><span class=\"bookCardDescr\">Finished: </span> $this->dateFin</p>";
        echo "<p><span class=\"bookCardDescr\">Format: </span> $this->edition</p>";
        echo "<p><span class=\"bookCardDescr\">Aquired: </span> $this->aquired</p>";
        echo "<p><span class=\"bookCardDescr\">Pages: </span> $this->pages</p>";
        echo "<p><span class=\"bookCardDescr\">Hours: </span> $this->hours</p>";
        echo "<p><span class=\"bookCardDescr\">Published: </span>$this->published</p>";
        echo "<p><span class=\"bookCardDescr\">Genres: </span>$this->genres</p>";
        echo "<p><span class=\"bookCardDescr\">Thoughts:<br></span>$this->notes</p>";
        echo "<p class='stars'>" . str_repeat("★", intval($this->rating)) . "</p>";
        echo '</div>';
    }

    //Getter
    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPages() {
        return $this->pages;
    }

    public function getStartDate() {
        return $this->startDate;
    }

    public function getFinishDate() {
        return $this->finishDate;
    }

    public function getFormat() {
        return $this->format;
    }

    public function getAquired() {
        return $this->aquired;
    }

    public function getNotes() {
        return $this->notes;
    }

    public function getRating() {
        return $this->rating;
    }

    public function getImage() {
        return $this->image;
    }

    //Setter 
    public function setTitle() {
        $this->title = $title;
    }

    public function setAuthor() {
        $this->author = $author;
    }

    public function setPages() {
        $this->pages = $pages;
    }

    public function setStartDate() {
        $this->startDate = $startDate;
    }

    public function setFinishDate() {
        $this->finishDate = $finishDate;
    }

    public function setFormat() {
        $this->format = $format;
    }

    public function setAquired() {
        $this->aquired = $aquired;
    }

    public function setNotes() {
        $this->notes = $notes;
    }

    public function setRating() {
        $this->rating = $rating;
    }

    public function setImage() {
        $this->image = $Image;
    }
}