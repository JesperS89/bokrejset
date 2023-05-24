<?php

require "../classes/book.php";

$bookModel = new Book(require "../partials/connect.php");

if (isset($_POST["title"], $_POST["pages"])) {
  $title = filter_var($_POST["title"], FILTER_SANITIZE_SPECIAL_CHARS);
  $pages = filter_var($_POST["pages"], FILTER_SANITIZE_NUMBER_INT);
  $authorId = filter_var($_POST["author-id"], FILTER_SANITIZE_NUMBER_INT);

  $bookModel->addBook($title, $pages, $authorId);
}

header("Location: ../books.php");
