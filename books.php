<?php
require "classes/book-view.php";
require "classes/db.php";
require "classes/book.php";

$pdo = require "partials/connect.php";

include "partials/nav.php";

$db = new DB($pdo);
$bookModel = new Book($pdo);
$bookView = new BookView();
echo "<h1>Böcker</h1>";

$books = $bookModel->getAll("books");

$bookView->renderAllBooksAsList($books);

if (isset($_GET["bookid"])) {
  $id = (int) filter_var($_GET["bookid"], FILTER_SANITIZE_NUMBER_INT);
  $book = $bookModel->getBookById($id);

  $bookView->renderBook($book);
}
include "partials/book-form.php";
include "partials/footer.php";

?>
