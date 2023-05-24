<?php
require "../classes/book.php";

$bookModel = new Book(require "../partials/connect.php");
$bookView = new BookView(require "../classes/book-view.php");

if (isset($_POST["booksearch"])) {
  $title = filter_var($_POST["booksearch"], FILTER_SANITIZE_SPECIAL_CHARS);

  $bookTitle = $bookModel->getBookByTitle($title);

  $bookView->renderBookByTitle($bookTitle);
}

header("Location: ../index.php");
