<?php

class Book {
  private $title;
  private $author;
  private $publicationYear;
  private $genre;

  public function __construct($title, $author, $publicationYear, $genre) {
    $this->title = $title;
    $this->author = $author;
    $this->publicationYear = $publicationYear;
    $this->genre = $genre;
  }

  public function get_age() {
    $currentYear = date('Y');
    return $currentYear - $this->publicationYear;
  }

  public function get_summary() {
    return "The title of the book: {$this->title}, Author: {$this->author}, Genre: {$this->genre}, Year of publication: {$this->publicationYear}";
  }
}

$book1 = new Book("Fahrenheit 451", "Ray Douglas Bradbury", 1953, "Fantasy");
$book2 = new Book("Breakfast at Tiffany's", "Truman Garcia Capote", 1958, "Novel, Fiction");

echo $book1->get_summary() . "</br>";
echo "Age of the book 1: " . $book1->get_age() . " years </br>";

echo $book2->get_summary() . "</br>";
echo "Age of the book 2: " . $book2->get_age() . " years </br>";

?>
