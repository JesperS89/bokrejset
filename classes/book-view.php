<?php

class BookView
{
  public function renderAllBooksAsList(array $books): void
  {
    echo "<ul>";
    foreach ($books as $book) {
      echo "<li><a href='books.php?bookid={$book["id"]}'>{$book["title"]}</a></li>";
    }
    echo "</ul>";
  }
  public function renderBookByTitle(array $books): void
  {
    echo "<ul>";
    foreach ($books as $book) {
      echo "<li><a href='index.php?bookid={$book["id"]}'>{$book["title"]}</a></li>";
    }
    echo "</ul>";
  }
  public function renderBook(array $book): void
  {
    echo "<ul>";
    echo "<h2>{$book[0]["title"]}</h2>";
    echo "<p>Antal sidor: {$book[0]["pages"]}</p>";

    echo "<h3>Vilka har läst boken</h3>";
    foreach ($book as $user) {
      echo "<p>{$user["name"]}</p>";
    }
    echo "</ul>";
  }
}

?>
