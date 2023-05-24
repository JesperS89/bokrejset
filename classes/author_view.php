<?php

class AuthorView
{
  public function renderAllAuthors(array $authors): void
  {
    echo "<h2>Författare</h2>";
    foreach ($authors as $author) {
      echo "<p><a href='authors.php?authorid={$author["id"]}'>" .
        $author["firstname"] .
        " " .
        $author["lastname"] .
        "</a></p>";
    }
  }
  public function renderBooksByAuthor(array $books): void
  {
    if ($books) {
      echo "<h3>Böcker av {$books[0]["firstname"]} {$books[0]["lastname"]}</h3>";
      echo "<ul>";
      foreach ($books as $book) {
        echo "<li>{$book["title"]}</li>";
      }
      echo "</ul>";
    }
  }
}

?>
